<?php

namespace App\Services;

use App\Models\Tasks;

class TaskService{
    public function createTask(array $data)
    {
        return Tasks::create($data);
    }
    public function updateTask($id, array $data)
{
    $task = Tasks::findOrFail($id);
    $task->update($data);
    return $task;
}


public function deleteTask($id)
{
    $task = Tasks::findOrFail($id);
    $task->delete();
}


}