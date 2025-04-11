<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
 * @tasks functionalities
 */
class TaskController extends Controller
{
    public function index() {
        // session not that secured
        // dd(session()->getId());
        return view('home', [
            'tasks' => Task::where('user_id', session()->get('id'))->get()
        ]);
    }

    public function createTask() {
        return view('tasks');
    }

    public function editTask(Task $task) {
        return view('tasks', [
            'task' => Task::find($task['id'])
        ]);
    }

    public function store(Request $request) {
        $task = $request->validate([
            'task_name' => 'required',
            'description' => 'nullable',
            'end_date_time' => 'nullable',
        ]);
        $newtask = Task::create([
            'task_name' => $task['task_name'],
            'description' => $task['description'],
            'end_date_time' => $task['end_date_time'],
            'user_id' => session()->get('id'),
        ]);
        return redirect()->intended('home')->with('status', 'Task created sucessfully.');
    }

    // public function read(Request $request) {
    //     Task::get();
    //     return view('taskview');
    // }

    public function update(Request $request, Task $task) {
        $id = $task['id'];
        $task = $request->validate([
            'task_name' => 'required',
            'description' => 'nullable',
            'end_date_time' => 'nullable',
        ]);
        // dd($task);
        Task::where('id', $id)->update([
            'task_name' => $task['task_name'],
            'description' => $task['description'],
            'end_date_time' => $task['end_date_time'],
            'user_id' => session()->get('id'),
        ]);
        return redirect()->intended('home')->with('status', 'Task updated sucessfully.');
    }
    
    public function destroy(Request $request, Task $task) {
        $task_name = $task['task_name'];
        Task::destroy($task['id']);
        return redirect()->back()->with('status', "Task $task_name has been deleted.");
    }
    
}
