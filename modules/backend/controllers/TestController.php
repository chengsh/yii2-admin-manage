<?php
namespace app\modules\backend\controllers;

/**
 * Class TestController
 * @package app\modules\backend\controllers
 */
class TestController extends Controller
{
    public function actionIndex()
    {
        $this->layout = false;
        return 'bb';
    }
}