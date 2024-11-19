<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::latest()->paginate(5);

        return JsonResource::collection($tasks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskStoreRequest $request): RedirectResponse
    {
        return new JsonResource(Task::create($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return new JsonResource($task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskUpdateRequest $request, Task $task): RedirectResponse
    {
        $task->update($request->validated());

        return new JsonResource([
            'success'=> true,
            'message'=> 'Task Updated',
            'data'=> $task
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task): RedirectResponse
    {
        $task->delete();

        return new JsonResource([
            'success'=> true,
            'message'=> 'Task deleted successfully'
        ]);
    }
}
