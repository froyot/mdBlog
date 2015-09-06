<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\BlogAsset;

/* @var $this \yii\web\View */
/* @var $content string */

BlogAsset::register($this);

$this->registerCss("
.markdown img{
    max-width:100%;
}

.line{
    margin-top:0.5em;
    border-bottom:1px dashed;
    display:block;
    width:100%;
}

#cup_play{
  width: 128px;
  height: 128px;
  background: red;
  position: fixed;
  background: url('/web/css/img/cup_play.png');
  top: 0;
  right: 10%;
  cursor: move;
  display: none;
  z-index: 999;
}
")
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
<h1><?=Yii::$app->params['blog']['blogName'];?></h1>
<p>
<a href="<?=Url::to(['default/index']);?>">Home</a> |
<a href="<?=Url::to(['default/category']);?>">Categorys</a> |
<a href="<?=Url::to(['default/timeline']);?>">TimeLine</a> |
<a href="<?=Url::to(['default/about']);?>">About</a> |
</p>

<hr />
<br/>
<?= $content ?>
<?php $this->endBody() ?>
<div id="cup_play"></div>
<script type="text/javascript">

        (function() {
            var oDiv = document.getElementById('cup_play');
            var disX = 0,
                disY = 0,
                prevX = 0,
                prevY = 0;
            var iSpeedX = 0,
                iSpeedY = 0;
            var timer = null;
            var Du = 0;
            var rotate = 1;

            setTimeout(function() {
                oDiv.style.display = 'block';
                move();
            }, 500)

            oDiv.onmousedown = function(e) {
                var e = e || window.event;
                disX = e.clientX - oDiv.offsetLeft;
                disY = e.clientY - oDiv.offsetTop;

                prevX = e.clientX;
                prevY = e.clientY;

                if (oDiv.setCapture) oDiv.setCapture();

                clearInterval(timer);

                document.onmousemove = function(e) {
                    var e = e || window.event;
                    oDiv.style.left = e.clientX - disX + 'px';
                    oDiv.style.top = e.clientY - disY + 'px';

                    iSpeedX = e.clientX - prevX;
                    iSpeedY = e.clientY - prevY;

                    prevX = e.clientX;
                    prevY = e.clientY;
                }

                document.onmouseup = function() {
                    document.onmousemove = null;
                    document.onmouseup = null;

                    if (oDiv.releaseCapture) oDiv.releaseCapture();

                    move();
                }

                return false;
            }
            function getName(){ //获取浏览器名
                if(navigator.userAgent.indexOf("MSIE")>0) { return "-ms-";}
                if(isFirefox=navigator.userAgent.indexOf("Firefox")>0){return "-moz-";}
                if(isSafari=navigator.userAgent.indexOf("Safari")>0) { return "-webkit-";}
                if(isCamino=navigator.userAgent.indexOf("Camino")>0){return "-o-";}
                if(isMozilla=navigator.userAgent.indexOf("Gecko/")>0){return "-o-";}
            }
            function move() {
                clearInterval(timer);
                timer = setInterval(function() {
                    oDiv.style.webkitTransform = 'rotate('+ Du +'deg)';
                    oDiv.style.transformOrigin = '50% 50%';
                    oDiv.style.mozTransform = 'rotate('+ Du +'deg)';
                    oDiv.style.mozformOrigin = 'rotate('+ Du +'deg)';



                    iSpeedY += 3;

                    var T = oDiv.offsetTop + iSpeedY;
                    var L = oDiv.offsetLeft + iSpeedX;

                    if (T > document.documentElement.clientHeight - oDiv.offsetHeight) {
                        T = document.documentElement.clientHeight - oDiv.offsetHeight;

                        iSpeedY *= -1;
                        iSpeedY *= 0.8;
                        iSpeedX *= 0.8;
                    } else if (T < 0) {
                        T = 0;
                        iSpeedY *= -1;
                    }
                    else
                    {
                        Du = (Du+rotate*3)%360;
                    }

                    if (L > document.documentElement.clientWidth - oDiv.offsetWidth) {
                        L = document.documentElement.clientWidth - oDiv.offsetWight;
                        rotate = -1;
                        iSpeedX *= -1;
                        iSpeedX *= 0.8;
                    } else if(L < 0) {
                        rotate = 1;
                        L = 0;
                        iSpeedX *= -1;
                    }


                    oDiv.style.left = L + 'px';
                    oDiv.style.top = T + 'px';
                }, 30);
            }
        })();
    </script>

</body>
</html>
<?php $this->endPage() ?>
