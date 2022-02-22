<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\FetchTaskRequest;
use App\Http\Requests\Task\CreateTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Http\Requests\Task\DeleteTaskRequest;
use App\UseCases\Task\FetchTaskUseCase;
use App\UseCases\Task\CreateTaskUseCase;
use App\UseCases\Task\UpdateTaskUseCase;
use App\UseCases\Task\DeleteTaskUseCase;
use \Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    private FetchTaskUseCase $fetchTaskUseCase;
    private CreateTaskUseCase $createTaskUseCase;
    private UpdateTaskUseCase $updateTaskUseCase;
    private DeleteTaskUseCase $deleteTaskUseCase;

    public function __construct(
        FetchTaskUseCase $fetchTaskUseCase,
        CreateTaskUseCase $createTaskUseCase,
        UpdateTaskUseCase $updateTaskUseCase,
        DeleteTaskUseCase $deleteTaskUseCase,
    ) {
        $this->fetchTaskUseCase = $fetchTaskUseCase;
        $this->createTaskUseCase = $createTaskUseCase;
        $this->updateTaskUseCase = $updateTaskUseCase;
        $this->deleteTaskUseCase = $deleteTaskUseCase;
    }

    public function listTask(Request $request): View
    {
        // $keyword = $request->input('search');
        $result = $this->fetchTaskUseCase->execute([]);
        if ($result['is_fail']) {
            return response()->fail($result['messages']);
        }
        return response()->success('task.list', $result['data']);
    }

    /**
     * @param int $id ルートパラメータ
     */
    public function detailTask(int $id): View
    {
        $result = $this->fetchTaskUseCase->execute(['id' => $id]);

        if ($result['is_fail']) {
            return response()->fail($result['messages']);
        }
        return response()->success('task.detail', $result['data']);
    }

    public function createTask(CreateTaskRequest $request): Response
    {
        $result = $this->createTaskUseCase->execute($request->all());
        if ($result['is_fail']) {
            return response()->fail($result['messages']);
        }
        return to_route('list.detail', $result['data']['task_id']);
    }

    public function updateTask(UpdateTaskRequest $request): Response
    {
        $result = $this->updateTaskUseCase->execute($request->all());
        if ($result['is_fail']) {
            return response()->fail($result['messages']);
        }
        return back();
    }

    public function deleteTask(DeleteTaskRequest $request): Response
    {
        $result = $this->deleteTaskUseCase->execute($request->all());
        if ($result['is_fail']) {
            return response()->fail($result['messages']);
        }
        return to_route('task.list');
    }
}
