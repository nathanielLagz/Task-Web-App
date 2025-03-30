<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;

/*
 * @tasks functionalities
 */
class TaskController extends Controller
{
    public function index() {
        $tasks = Task::all();
        // dd($tasks);
        return view('home', ['tasks' => Task::get('task_name')]);
    }

    public function create(Request $request) {

    }

    public function read(Request $request) {

    }

    public function update(Request $request) {

    }
    
    public function delete(Request $request) {

    }
    
}
