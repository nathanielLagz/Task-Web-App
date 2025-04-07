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
        // user_id is hardcoded
        return view('home', ['tasks' => Task::where('user_id', 1)->get()]);
    }

    public function createTask() {
        return view('tasks');
    }

    public function create(Request $request) {
        $task = $request->validate([
            'task_name' => 'required'
        ]);
        Task::create($task);
    }

    public function read(Request $request) {
        Task::get();
        return view('taskview');
    }

    public function update(Request $request) {
        Task::update();
    }
    
    public function destroy(Request $request) {
        Task::destroy(1);
        return redirect()->back()->with('status', 'Task has been deleted.');
    }
    
}
