<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\TranslationController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\QuestionController;

Route::get('/', [IndexController::class, 'index']);

Route::prefix('translation')->name('translation.')->group(function(){
    Route::get('/list', [TranslationController::class, 'list'])->name('list');
    Route::get('/{translation_id}/edit', [TranslationController::class, 'edit'])->name('edit');
});

Route::prefix('question')->name('question.')->group(function(){
    Route::get('/list', [QuestionController::class, 'list'])->name('list');
    Route::get('/{question_id}/edit', [QuestionController::class, 'edit'])->name('edit');
});
/**
    * Show Task Dashboard
    */
/*
Route::get('/', function () {
    error_log("INFO: get /");
    return view('tasks', [
        'tasks' => Task::orderBy('created_at', 'asc')->get()
    ]);
});
*/
/**
    * Add New Task
    */
/*
Route::post('/task', function (Request $request) {
    error_log("INFO: post /task");
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        error_log("ERROR: Add task failed.");
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    $task = new Task;
    $task->name = $request->name;
    $task->save();

    return redirect('/');
});
*/

/**
    * Delete Task
    */
/*
Route::delete('/task/{id}', function ($id) {
    error_log('INFO: delete /task/'.$id);
    Task::findOrFail($id)->delete();

    return redirect('/');
});
*/