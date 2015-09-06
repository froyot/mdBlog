<?php

namespace app\utils\word;
use Yii;
use yii\base\Model;

/**
 * 分词api调用
 */
class Pullword extends Model
{
    public static $apiUrl = "http://api.pullword.com/get.php?";

    /**
     * 获取分词数组
     * @param  string $world 需要进行分词的内容
     * @return array   分词结果数组
     */
    public function get($world)
    {
        $data['source'] = $world;
        $data['param1'] = 0;
        $data['param2'] = 0;
        $output = Pullword::getApi($data);
        if($output)
        {
            return $output;
        }
        else
            return $world;
    }

    /**
     * 获取详细分词结果
     * @param  string $world 要分词数据
     * @return array  分词结果数组，包含分词概率
     */
    public function show($world)
    {
        $data['source'] = $world;
        $data['param1'] = 0;
        $data['param2'] = 1;
        $output = Pullword::getApi($data);
        if($output)
        {
            return $output;
        }
        else
            return $world;
    }

    /**
     * 调用api网络请求
     * @param  array $data 参数
     * @return string      api返回结果
     */
    private function getApi($data)
    {
        $ch = curl_init();
        $url = Pullword::$apiUrl.http_build_query($data);
        $output = Yii::$app->cache->get($url);
        if(!$output)
        {
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $output = curl_exec($ch);
        if(!$output)
        {
            Yii::error(curl_error($ch));
            curl_close($ch);
           return null;
        }
        curl_close($ch);
        Yii::$app->cache->set($url,$output);
        }
        $output = trim($output);
        //处理数据

        $output = explode("\n", $output);
        $data = [];
        return $output;
    }
}
