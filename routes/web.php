<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;

use App\Models\Task;

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/', function () {
    return redirect()->route('task.list');
});

// Full list of tasks

Route::get('/tasks', function () {
    return view('index', [
        'tasksFromBlade' => Task::latest()->paginate(5)
    ]);
})->name('task.list');

// Adding process

Route::post('/tasks', function (TaskRequest $request) {

    $task = Task::create($request->validated());

    return redirect()->route('task.show', ['task' => $task])->with('success', 'Task created successfully');
})->name('task.store');

// Adding form and process

Route::view('/tasks/form', 'form')->name('task.form');

// Show each task from list

Route::get('/tasks/{task}', function (Task $task) {
    return view('show', [
        'taskEach' => $task
    ]);
})->name('task.show');

// Editing form and process

Route::get('/tasks/{task}/edit', function (Task $task) {
    return view('edit', [
        'taskEdit' => $task
    ]);
})->name('task.edit');

Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {

    $task->update($request->validated());

    return redirect()->route('task.show', ['task' => $task])->with('success', 'Task update successfully');
})->name('task.update');

// Delete process

Route::delete('/tasks/{task}', function (Task $task) {
    $task->delete();

    return redirect()->route('task.list')->with('success', 'Task removed successfuly!');
})->name('task.remove');

Route::put('/task/{task}/toggle-complete', function (Task $task) {
    $task->toggleComplete();
    return redirect()->back()->with('success', 'Task updated successfuly');
})->name('task.toggle-complete');

// Error 404

Route::fallback(function () {
    return 'Somewhere!';
});
