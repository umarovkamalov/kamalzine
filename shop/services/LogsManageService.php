<?php

namespace shop\services;

use shop\forms\LogsForm;
use shop\repositories\LogsRepository;
use shop\entities\Logs;

class LogsManageService
{
    private $logs;
    private $transaction;

    public function __construct(
        LogsRepository $logs,
        TransactionManager $transaction
    )
    {
        $this->logs = $logs;
        $this->transaction = $transaction;
    }

    public function create(LogsForm $form): Logs
    {
        $logs = Logs::create($form->post_id, $form->cat_id, $form->token);
        $this->logs->save($logs);
        return $logs;
    }

    public function edit(LogsForm $form)
    {
        $log  = Logs::find()->where(['cat_id' => $form->cat_id, 'post_id' => $form->post_id, 'token' => $form->token])->one();
        $logs = $this->logs->get($log->id);
        $logs->edit($logs->count);
        $this->logs->save($logs);
    }

}