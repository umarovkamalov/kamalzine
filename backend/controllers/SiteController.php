<?php
namespace backend\controllers;

use yii\web\Controller;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public function beforeAction($action)
    {
        if ($action->id == 'error')
            $this->layout = 'main-access.php';

        return parent::beforeAction($action);
    }
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {

        return $this->render('index');
    }
}
