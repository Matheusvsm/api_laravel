<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;
use App\Services\TaskService;
use Illuminate\Console\View\Components\Task;

class TasksController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }
    public function index()
    {
        //lista todas as tasks
        $tasks = Tasks::get()->toJson(JSON_PRETTY_PRINT);
        return $tasks;
    }
    public function store(Request $request)
    {
        //cria as tasks 
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $this->taskService->createTask($request->all());
        return response()->json('criado com sucesso', 201);
    }
    public function show($id)
    {
        //Lista uma unica task 
        $task = Tasks::where('id', $id)->get();
        return $task;
    }
    public function update(Request $request, $id)
    {
        //Atualiza task
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $task = $this->taskService->updateTask($id, $request->all());
        return response()->json($task, 200);
    }
    public function destroy($id)
    {
        //deleta task
        $this->taskService->deleteTask($id);
        return response()->json(null, 204);
    }
}
