<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>

    <header class="header">
        <div class="header__top"></div>
        <div class="header__logo">
            <a href="/">
                <img src="../img/logo.png" alt="Logo">
            </a>
        </div>
        <div class="header__bg">
            <div class="header__text">
                <h1 class="header__title">Микрокредиты из любой точки Казахстана!</h1>
                <h2 class="header__subtitle">Оформите заявку онлайн</h2>
            </div>
        </div>
    </header>

    <?= $content ?>



<footer class="footer">
    <div class="footer__line"></div>
    <div class="footer__top">
        <div class="container">
            <div class="footer__social">Мы в социальных сетях
                <div class="footer__social-links">
                    <a href="https://vk.com/4slovo_kz" target="_blank">
                        <i class="icon icon_name_vkontakte">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><g transform="scale(.063)"><rect height="512" rx="64" ry="64" width="512" fill="#4c75a3"></rect><path d="M251.71 369.145h23.907s7.219-.798 10.91-4.769c3.397-3.65 3.288-10.502 3.288-10.502s-.472-32.081 14.421-36.803c14.68-4.654 33.526 31.004 53.503 44.714 15.107 10.375 26.588 8.104 26.588 8.104l53.418-.744s27.937-1.725 14.69-23.697c-1.084-1.793-7.721-16.25-39.717-45.949-33.503-31.094-29.012-26.061 11.338-79.838 24.57-32.75 34.397-52.739 31.323-61.305-2.925-8.158-20.997-6.006-20.997-6.006l-60.148.376s-4.456-.609-7.765 1.368c-3.23 1.937-5.305 6.454-5.305 6.454s-9.527 25.343-22.219 46.895c-26.778 45.474-37.488 47.881-41.866 45.052-10.184-6.582-7.637-26.434-7.637-40.544 0-44.072 6.684-62.45-13.021-67.205-6.539-1.579-11.353-2.626-28.075-2.794-21.458-.219-39.623.068-49.905 5.103-6.842 3.359-12.123 10.818-8.903 11.25 3.975.53 12.976 2.425 17.747 8.922 6.164 8.387 5.948 27.216 5.948 27.216s3.544 51.88-8.27 58.321c-8.109 4.422-19.229-4.602-43.109-45.861-12.231-21.131-21.468-44.497-21.468-44.497s-1.777-4.361-4.957-6.7c-3.854-2.833-9.242-3.729-9.242-3.729l-57.154.37s-8.58.244-11.726 3.975c-2.807 3.321-.224 10.182-.224 10.182s44.742 104.686 95.407 157.439c46.468 48.381 99.218 45.202 99.218 45.202z" fill="#fff" fill-rule="evenodd"></path></g></svg>
                        </i>
                    </a>
                    <a href="https://www.facebook.com/4slovo.kz/" target="_blank">
                        <i class="icon icon_name_facebook">
                            <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path d="M32 30c0 1.104-.896 2-2 2h-28c-1.104 0-2-.896-2-2v-28c0-1.104.896-2 2-2h28c1.104 0 2 .896 2 2v28z" fill="#3B5998"></path><path d="M22 32v-12h4l1-5h-5v-2c0-2 1.002-3 3-3h2v-5h-4c-3.675 0-6 2.881-6 7v3h-4v5h4v12h5z" fill="#fff"></path></svg>
                        </i>
                    </a>
                    <a href="https://www.instagram.com/4slovo_kz/?utm_source=4slovo_main" target="_blank">
                        <i class="icon icon_name_instagram">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><style type="text/css" id="style2">.__2OtNYvu__st0{fill:url(#SVGID_1_);} .__2OtNYvu__st1{fill:#FFFFFF;}</style><g id="g29" transform="scale(.063)"><radialGradient cx="225.474" cy="222.805" gradientTransform="matrix(14.217 0 0 14.217 -3055.704 -2615.996)" gradientUnits="userSpaceOnUse" id="SVGID_1_" r="47.721"><stop offset=".097" id="stop4" stop-color="#FFD87A"></stop><stop offset=".143" id="stop6" stop-color="#FCCE78"></stop><stop offset=".226" id="stop8" stop-color="#F5B471"></stop><stop offset=".338" id="stop10" stop-color="#EB8D65"></stop><stop offset=".449" id="stop12" stop-color="#E36058"></stop><stop offset=".679" id="stop14" stop-color="#CD3694"></stop><stop offset="1" id="stop16" stop-color="#6668B0"></stop></radialGradient><path class="__2OtNYvu__st0 " d="M512 395.1c0 64.6-52.3 116.9-116.9 116.9h-278.2c-64.6 0-116.9-52.3-116.9-116.9v-278.1c0-64.6 52.4-117 117-117h276.3c65.6 0 118.7 53.1 118.7 118.7z" id="path19" fill="url(#SVGID_1_)"></path><g id="g27" fill="#fff"><path class="__2OtNYvu__st1 " d="M327.2 70.6h-142.4c-63.1 0-114.3 51.2-114.3 114.3v142.3c0 63.1 51.1 114.2 114.3 114.2h142.3c63.1 0 114.2-51.1 114.2-114.2v-142.3c.1-63.2-51-114.3-114.1-114.3zm78.6 242.9c0 51-41.3 92.3-92.3 92.3h-115c-51 0-92.3-41.3-92.3-92.3v-115c0-51 41.3-92.3 92.3-92.3h115c51 0 92.3 41.4 92.3 92.3z" id="path21"></path><path class="__2OtNYvu__st1 " d="M261 159c-54 0-97.7 43.7-97.7 97.7 0 53.9 43.7 97.7 97.7 97.7 53.9 0 97.7-43.7 97.7-97.7-.1-54-43.8-97.7-97.7-97.7zm0 156.4c-32.5 0-58.8-26.3-58.8-58.8s26.3-58.8 58.8-58.8c32.4 0 58.8 26.3 58.8 58.8-.1 32.5-26.4 58.8-58.8 58.8z" id="path23"></path><path class="__2OtNYvu__st1 " d="M376.7 157.5c0 13.7-11.1 24.8-24.8 24.8-13.7 0-24.8-11.1-24.8-24.8 0-13.7 11.1-24.9 24.8-24.9 13.7 0 24.8 11.1 24.8 24.9z" id="path25"></path></g></g></svg>
                        </i>
                    </a>
                </div>
            </div>
            <div class="footer__copy">
                <div class="footer__copy-text">© 2020 4slovo.kz - ТОО «МФО Akshabar» с товарным знаком «Честное слово». Все права защищены.</div>
                <a href="mailto:mfo@4slovo.kz">mfo@4slovo.kz</a>
            </div>
        </div>
    </div>
    <div class="footer__bottom">
        <div class="container">
            <ul class="payment">
                <li>
                    <img src="../img/icon/shield.png">
                </li>
                <li>
                    <img src="../img/icon/visa.png">
                </li>
                <li>
                    <img src="../img/icon/visa2.png"
                    ></li>
                <li>
                    <img src="../img/icon/mastercard.png">
                </li>
                <li>
                    <img src="../img/icon/mastercard2.png">
                </li>
                <li>
                    <img src="../img/icon/kassa24.png">
                </li>
                <li>
                    <img src="../img/icon/kazfintech-logonew.png">
                </li>
            </ul>
        </div>
    </div>
</footer>

<div class="top active" title="Вверх">
    <img src="../img/arrow.png" alt="Top">
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
