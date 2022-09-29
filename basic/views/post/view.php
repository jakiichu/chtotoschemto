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

<div class="post-view">

    <p class='display-2'>{{post.name}}</p>
    <img v-bind:src="post.img" style="display:block; margin:auto; height:800px;">
    <br>
    <hr>
    <p class='blockquote' v-html='post.text'></p>
    <hr>
    <div>
        <p class='' style='text-align: right;'>Запостил: {{post.name_creator}}</p>
        <p class='' style=' text-align: right;'> Дата поста: {{post.date}}</p>
    </div>


    <?= $this->render('_formcomment', [
        'Comment' => $Comment,
        'id' => $model->id,
    ]) ?>
    
            <div style='display: block;' v-for="comment in comments" v-if="comment.id_post == idPost + 1">
                
                    <div class="message"  v-if="username == comment.name_user">
                        <div class="message__outer">
                            <div class="message__inner">
                                <div class="message__bubble">
                                    <p style="font-size: 12px;text-align:right;margin:4px; color: black;">
                                        {{comment.name_user}}
                                    </p>
                                    <p style="padding:0;margin:0;color: black;">
                                        {{comment.comment}}
                                    </p>
                                </div>
                                <div class="message__actions">
                                    <a v-bind:href="'/comment/delete?id=' + comment.id" title="Удалить" aria-label="Удалить" data-pjax="0" data-confirm="Вы уверены, что хотите удалить этот элемент?" data-method="post">
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

                    <div class="message" v-else-if='username != comment.name_user'>
                        <div class="message__outer">
                            <div class="message__bubble left">
                                <p style="font-size: 12px;text-align:left;margin:4px;color:white!important;">
                                    {{comment.name_user}}
                                </p>
                                <p style="padding:0;margin:0;color:white!important;">
                                {{comment.comment}}
                                </p>
                            </div>
                            <div class="message__status"></div>
                        </div>
                    </div>

            </div>


</div>
<script>
    var postView = new Vue({
        el: '.post-view',
        data: {
            posts: [],
            idPost: '',
            post: [],
            comments: [],
            username: '',
        },
        mounted: async function() {

            const t = this
            t.idPost = <?php print($id) ?> - 1
            t.username = '<?php print(Yii::$app->user->identity->username) ?>'
            
            await fetch('http://localhost:8080/api/index', {
                method: 'GET',
            }).then(async response => {
                t.posts = await response.json()
            })
            await fetch('http://localhost:8080/api/comment', {
                method: 'GET',
            }).then(async response => {
                t.comments = await response.json()
            })
            t.post = t.posts[t.idPost]

        }
    })
</script>