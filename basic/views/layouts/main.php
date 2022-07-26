<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use app\models\User;
// use loutrux\argon\widgets\Nav;
// use loutrux\argon\widgets\NavBar;
// use loutrux\argon\widgets\Dropdown;
// use loutrux\argon\widgets\Modal;
// use loutrux\argon\widgets\Card;
// use loutrux\argon\widgets\StatCard;
// use loutrux\argon\widgets\Tabs;


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<link href="/css/nucleo.css" rel="stylesheet">
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <?php
    NavBar::begin([
        'brandLabel' => '<img src="/img/logo/logo.png" style="display:inline; vertical-align: top; height:60px;">',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            ['label' => 'О нас', 'url' => ['/site/about']],
            ['label' => 'Посты', 'url' => ['/post']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Авторизация', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                . Html::submitButton(
                    'Выйти (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-sm btn-danger btn-tooltip', 'style' =>'margin-top:13px;']
                )
                . Html::endForm()
                . '</li>'
                ),
                Yii::$app->user->isGuest ? (
                    ['label' => 'Регистрация', 'url' => ['/user/create']]
                ) : (
                    ['label' => 'Админ панель', 'url' => ['/admin'],'visible' => !Yii::$app->user->isGuest&&Yii::$app->user->identity->isAdmin()]
                    )
        ],
    ]);
    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-left">&copy; Форум ТТИТ <?= date('Y') ?></p>
        
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
