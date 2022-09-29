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
    <style>
        .message__outer {
            display: flex;
        }

        .message__inner {
            flex: 1;
            display: flex;
            flex-direction: row-reverse;
        }

        .message__inner {
            flex: 1;
            display: flex;
            flex-direction: row-reverse;
        }

        .message__actions {
            width: 67px;
            padding-right: 5px;
            flex-shrink: 0;
            text-align: right;
        }

        .message__spacer {
            flex: 1;
        }

        .message__bubble {
            max-width: calc(100% - 67px);
            overflow-wrap: break-word;
            background-color: #FFF700;
            padding: 10px;
            padding-bottom: 0;
            padding-top: 0;
            padding-left: 10px;

            border-radius: 10px;
        }

        .left {

            background: rgb(36, 36, 36);
            background: linear-gradient(90deg, rgba(36, 36, 36, 1) 0%, rgba(116, 116, 116, 1) 51%);
        }

        .material-symbols-outlined {
            font-variation-settings:
                'FILL'0,
                'wght'400,
                'GRAD'0,
                'opsz'48
        }

        .btndelete {
            font-size: .875rem;
            position: relative;
            transition: all .15s ease;
            letter-spacing: .025em;
            text-transform: uppercase;
            will-change: transform;
            color: #fff;
            border-color: #f5365c;
            background-color: #f5365c;
            box-shadow: 0 4px 6px rgb(50 50 93 / 11%), 0 1px 3px rgb(0 0 0 / 8%);
            padding: 3px;
            border: 0;
            text-align: right;
            border-radius: 4px;
        }

        .message {
            margin: 10px;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.0/dist/vue.js"></script>
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
                Yii::$app->user->isGuest ? (['label' => 'Авторизация', 'url' => ['/site/login']]
                ) : ('<li>'
                    . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                    . Html::submitButton(
                        'Выйти (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'btn btn-sm btn-danger btn-tooltip', 'style' => 'margin-top:13px;']
                    )
                    . Html::endForm()
                    . '</li>'
                ),
                Yii::$app->user->isGuest ? (['label' => 'Регистрация', 'url' => ['/user/create']]
                ) : (['label' => 'Админ панель', 'url' => ['/admin'], 'visible' => !Yii::$app->user->isGuest && Yii::$app->user->identity->isAdmin()]
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