<?php
namespace app\modules\backend;
use jinxing\admin\Module;
use Yii;
/**
 * admin module definition class
 */
class Backend extends Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\backend\controllers';
    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        Yii::$app->errorHandler->errorAction = '/admin/default/error';
    }
}