<?php
namespace app\modules\backend\controllers;
use jinxing\admin\behaviors\Logging;
use jinxing\admin\controllers\Controller as BaseController;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
/**
 * Class Controller 后台的基础控制器
 * @author  liujx
 * @package backend\controllers
 */
class Controller extends BaseController
{
    /**
     * @var string 使用yii2-admin 的布局
     */
    public $layout = '@jinxing/admin/views/layouts/main';
    /**
     * 定义使用的行为
     *
     * @return array
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'user' => ArrayHelper::getValue($this->module, 'user'),
                'rules' => [
                    [
                        'allow'       => true,
                        'permissions' => [$this->action->getUniqueId()],
                    ]
                ],
            ],
            'logging' => [
                'class' => Logging::className(),
            ],
        ];
    }
}