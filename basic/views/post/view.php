<?php

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\Post;
use app\models\Comment;
use yii\data\ActiveDataProvider;

/* @var $this yii\web\View */
/* @var $model app\models\Post */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
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
<div class="post-view">


    <p class='display-2'><?php print($model->name) ?></p>
    <img src="<?php print($model->img) ?>" style="display:block; margin:auto; height:800px;">
    <br>
    <hr>
    <p class='blockquote'><?php print($model->text) ?></p>
    <hr>
    <div>
        <p class='' style='   text-align: right;'>Запостил: <?php print($model->name_creator) ?></p>
        <p class='' style='   text-align: right;'> Дата поста: <?php print($model->date) ?></p>
    </div>

    <?= $this->render('_formcomment', [
        'Comment' => $Comment,
        'id' => $model->id,
    ]) ?>

    <?php foreach ($dataProvider->getModels() as $comment) { ?>
        <?php if ($comment->id_post == $model->id) { ?>
            <div style='display: block; '>
                <?php if ($comment->name_user == Yii::$app->user->identity->username) {
                ?>

                    <div class="message">
                        <div class="message__outer">
                            <div class="message__inner">
                                <div class="message__bubble">
                                    <p style="font-size: 12px;text-align:right;margin:4px; color: black;">
                                        <?php print($comment->name_user) ?>
                                    </p>
                                    <p style="padding:0;margin:0;color: black;">
                                        <?php print($comment->comment) ?>
                                    </p>
                                </div>
                                <div class="message__actions">
                                    <a href="/comment/delete?id=<?php print($comment->id) ?>" title="Удалить" aria-label="Удалить" data-pjax="0" data-confirm="Вы уверены, что хотите удалить этот элемент?" data-method="post">
                                        <svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                            <path fill="currentColor" d="M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z">

                                            </path>
                                        </svg>
                                    </a>
                                </div>
                                <div class="message__spacer"></div>
                            </div>
                            <div class="message__status"></div>
                        </div>
                    </div>


                <?php
                } else {
                ?>
                    <div class="message">
                        <div class="message__outer">
                            <div class="message__bubble left">
                                <p style="font-size: 12px;text-align:left;margin:4px;color:white!important;">
                                    <?php print($comment->name_user) ?>
                                </p>
                                <p style="padding:0;margin:0;color:white!important;">
                                    <?php print($comment->comment) ?>
                                </p>
                            </div>
                            <div class="message__status"></div>
                        </div>
                    </div>

                <?php
                }
                ?>
            </div>
    <?php }
    } ?>


</div>