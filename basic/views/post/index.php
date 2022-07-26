<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\Post;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';
?>
<style>
.filters{
    display: block;
    margin-left:60px;
}
</style>
<br>
<div class=""style='position: absolute;left: 10px;'><p class='h3'>Фильтры</p><hr>
<a class='filters' href="/post?PostSearch%5Bid%5D=&PostSearch%5Bname%5D=&PostSearch%5Btext%5D=&PostSearch%5Bimg%5D=&PostSearch%5Bname_creator%5D=&PostSearch%5Bcategory_id%5D=2"><strong>Курсы</strong></a> 
<br>
<a class='filters' href="/post?PostSearch%5Bid%5D=&PostSearch%5Bname%5D=&PostSearch%5Btext%5D=&PostSearch%5Bimg%5D=&PostSearch%5Bname_creator%5D=&PostSearch%5Bcategory_id%5D=3"><strong>Конкурсы</strong></a>
<br>
<a class='filters' href="/post?PostSearch%5Bid%5D=&PostSearch%5Bname%5D=&PostSearch%5Btext%5D=&PostSearch%5Bimg%5D=&PostSearch%5Bname_creator%5D=&PostSearch%5Bcategory_id%5D=4"><strong>Новости</strong></a>
<hr>
<a class='btn btn-success' href="/post">Сбросить фильтры</a>
</div>
<div class="post-index">

    <h1>Посты</h1>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

 



<div class="row row-cols-3">
        <?php foreach ($dataProvider->getModels() as $model) { ?>

            <div class="col">

            <div class="card" style="width: 20rem;">
                    <img src="<?= $model->img ?>" class="card-img-top" alt="<?= $model->img ?>">
                    <div class="card-body">
                        <a  class="card-title alert-link h5" href="/post/view?id=<?= $model->id ?>"><?= $model->name ?></a>
                        <p class="card-text">Запостил: <?= $model->name_creator ?></p>
                    </div>
                </div>
            </div>

        <?php } ?>
        </div>

</div>
