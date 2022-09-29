<?php

namespace app\controllers;

class ApiController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $this->layout = false;
        return $this->render('index');
    }
    public function actionCategory()
    {
        $this->layout = false;
        return $this->render('category');
    }
    public function actionComment()
    {
        $this->layout = false;
        return $this->render('comment');
    }
}
