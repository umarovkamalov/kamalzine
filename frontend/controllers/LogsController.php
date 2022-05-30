<?php

namespace frontend\controllers;

use shop\entities\Logs;
use shop\forms\LogsForm;
use shop\services\LogsManageService;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;
use yii\web\Controller;

/**
 *
 * Vote controller for the `vote` module
 * Used for response list and add vote
 */
class LogsController extends Controller
{

    private $service;
    public function __construct($id, $module, LogsManageService $service, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->service = $service;
    }

    /**
     * @param not
     * @type request get
     * @return json (question, question_id, answers list, status response)
     */
    public function actionAdd()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        if (Yii::$app->request->isAjax) {
            $form = new LogsForm();
            
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
                
            if ($form->validateDuplicate($form)) {
                try {
                    $this->service->create($form);
                    return ["status" => 1, "message" => Yii::t('app', 'Added!')];
                } catch (\DomainException $e) {
                    return ["ok" => false, "status" => 0, "message" => $e];
                }
            }else{
                try {
                    $this->service->edit($form);
                    return ["status" => 1, "message" => Yii::t('app', 'Count +!')];
                } catch (\DomainException $e) {
                    return ["ok" => false, "status" => 0, "message" => $e];
                }

            }
            }

                return ["ok" => false, "status" => 0, "message" => "No validate"];
        }
        return ['message' => "The format does not fit request", 'status' => 0, 'ok' => false];
    }
}