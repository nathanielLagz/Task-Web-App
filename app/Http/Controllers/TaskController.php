<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;

/*
 * @tasks functionalities
 */
class TaskController extends Controller
{
    public function addtaskview() {
        return view(Task::all());
    }

    public function add(Request $request) {

    }
}
