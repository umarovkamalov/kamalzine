<?php

namespace shop\repositories;

use shop\entities\Logs;

class LogsRepository
{
    public function get($id): Logs
    {
        if (!$logs = Logs::findOne($id)) {
            throw new NotFoundException('Резултат не найден.');
        }
        return $logs;
    }


    public function save(Logs $logs)
    {
        if (!$logs->save()) {
            throw new \RuntimeException('Сохранние Резултат не выполнено.');
        }
    }


    public function remove(Logs $logs)
    {
        if (!$logs->delete()) {
            throw new \RuntimeException('Удаление Резултат не выполнено.');
        }
    }
}