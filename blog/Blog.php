<?php

namespace app\blog;
use Yii;

class Blog extends \yii\base\Module
{
    public $controllerNamespace = 'app\blog\controllers';
    private $isCrawler = false;
    public function init()
    {
        parent::init();
        if( $this->checkAgent() )
        {
            $this->setViewPath('@app/blog/crawler');
        }
    }


    private function checkAgent()
    {

        $userAgent = strtolower($_SERVER['HTTP_USER_AGENT']);
        $spiders   = array(
        'Googlebot', // Google 爬虫
        'Baiduspider', // 百度爬虫
        'Yahoo! Slurp', // 雅虎爬虫
        'YodaoBot', // 有道爬虫
        'msnbot' // Bing爬虫
        // 更多爬虫关键字
        );
        foreach($spiders as $spider)
        {
            $spider = strtolower($spider);
            if(!strpos($userAgent, $spider) !== false)
            {
                return true;
            }
        }
        return false;
    }
}
