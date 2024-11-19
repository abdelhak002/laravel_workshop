<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TaskController;

Route::prefix('/v1/tasks')->group(function () {
    Route::get('/', [TaskController::class, 'index'])->name('listTasks');
    Route::get('/{task}', [TaskController::class, 'show'])->name('showTask');
    Route::post('/', [TaskController::class, 'store'])->name('createTask');
    Route::patch('/{task}', [TaskController::class, 'update'])->name('updateTask');
    Route::delete('/{task}', [TaskController::class, 'destroy'])->name('deleteTask');
});
