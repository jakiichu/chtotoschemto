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
    .filters {
        display: block;
        margin-left: 60px;
    }
</style>
<br>
<div class="index">
    <div class="filter" style='position: absolute;left: 10px;'>
        <p class='h3'>Фильтры</p>
        <hr>
        <div v-for="category in categorys">
            <a class='filters' @click="filter(category.id)"><strong> {{category.name}}</strong></a>
            <br>
        </div>
        <hr>
        <a class='btn btn-success' href="/post">Сбросить фильтры</a>
    </div>
    <div class="post-index">
        <h1>Посты</h1>
        <div class="row row-cols-3">

            <div class="col" v-for="post in posts" v-if="categoryfilter == true ||categoryfilter == post.category_id">

                <div class="card" style="width: 20rem;">
                    <img v-bind:src="post.img" class="card-img-top" v-bind:alt="post.img">
                    <div class="card-body">
                        <a class="card-title alert-link h5" v-bind:href="'/post/view?id=' + post.id">{{post.name}}</a>
                        <p class="card-text">Запостил: {{post.name_creator}} {{post.category_id}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var postIndex = new Vue({
        el: '.index',
        data: {
            posts: [],
            categorys: [],
            categoryfilter: true,
        },
        methods: {
            filter: function(categoryfilter) {
                this.categoryfilter = categoryfilter
            },
        },

        mounted: async function() {
            const t = this
            await fetch('http://localhost:8080/api/index', {
                method: 'GET',
            }).then(async response => {
                t.posts = await response.json()
            })
            await fetch('http://localhost:8080/api/category', {
                method: 'GET',
            }).then(async response => {
                t.categorys = await response.json()
            })
        }
    })
</script>