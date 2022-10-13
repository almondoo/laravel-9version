<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\CreateTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\UseCases\Task\FetchTaskUseCase;
use App\UseCases\Task\CreateTaskUseCase;
use App\UseCases\Task\UpdateTaskUseCase;
use App\UseCases\Task\DeleteTaskUseCase;
use App\UseCases\Task\SearchTaskUseCase;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct(
        private FetchTaskUseCase $fetchTaskUseCase,
        private CreateTaskUseCase $createTaskUseCase,
        private UpdateTaskUseCase $updateTaskUseCase,
        private DeleteTaskUseCase $deleteTaskUseCase,
        private SearchTaskUseCase $searchTaskUseCase,
    ) {
    }

    /**
     * タスク一覧
     *
     * @param Request $request
     * @return View
     */
    public function listTask(Request $request): View
    {
        $keyword = $request->input('keyword');
        if ($keyword) {
            $result = $this->searchTaskUseCase->execute(['keyword' => $keyword]);
        } else {
            $result = $this->fetchTaskUseCase->execute([]);
        }
        if ($result['is_fail']) {
            return response()->fail($result['messages']);
        }
        if ($request->session()->has('status')) {
            $result['data']['status'] = $request->session()->get('status');
            $request->session()->remove('status');
        }
        return response()->success('task.list', $result['data']);
    }

    /**
     * タスク詳細
     *
     * @param Request $request
     * @param Task $task
     * @return View
     */
    public function detailTask(Request $request, Task $task): View
    {
        if ($this->existsModel($task)) {
            $result = $this->fetchTaskUseCase->execute(['id' => $task->id]);

            if ($result['is_fail']) {
                return response()->fail($result['messages']);
            }
        }
        if ($request->session()->has('status')) {
            $result['data']['status'] = $request->session()->get('status');
            $request->session()->remove('status');
        }

        return response()->success('task.detail', isset($result) ? $result['data'] : []);
    }

    /**
     * タスク作成
     *
     * @param CreateTaskRequest $request
     * @return RedirectResponse
     */
    public function createTask(CreateTaskRequest $request): RedirectResponse
    {
        $result = $this->createTaskUseCase->execute($request->all());
        if ($result['is_fail']) {
            return response()->fail($result['messages']);
        }
        $request->session()->put('status', self::CREATE_STATUS);
        return to_route('task.detail', [
            'task' => $result['data']['task']->id,
        ]);
    }

    /**
     * タスク更新
     *
     * @param UpdateTaskRequest $request
     * @param Task $task
     * @return RedirectResponse
     */
    public function updateTask(UpdateTaskRequest $request, Task $task): RedirectResponse
    {
        $result = $this->updateTaskUseCase->execute($request->only(['id', 'title', 'text']));
        if ($result['is_fail']) {
            return response()->fail($result['messages']);
        }
        $request->session()->put('status', self::UPDATE_STATUS);
        return to_route('task.detail', [
            'task' => $request->input('id'),
        ]);
    }

    /**
     * タスク削除
     *
     * @param Request $request
     * @param Task $task
     * @return RedirectResponse
     */
    public function deleteTask(Request $request, Task $task): RedirectResponse
    {
        $result = $this->deleteTaskUseCase->execute(['id' => $task->id]);
        if ($result['is_fail']) {
            return response()->fail($result['messages']);
        }
        $request->session()->put('status', self::DELETE_STATUS);
        return to_route('task.list');
    }
}
