<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
    public function index() {
        $tasks = Task::all();
        return response()->json($tasks, 200);
    }

    public function store(Request $request){
        $task = Task::create([
            'title' => $request->input('title'),
            'is_completed' => $request->input('is_completed', false),
        ]);

        return response()->json([
            'message' => 'Task berhasil dibuat',
            'data' => $task,
        ], 201);
    }

    public function show($id){
        $task = Task::find($id);

        if(! $task ) {
            return response()->json([
                'message'=> 'Task tidak ditemukan'
            ], 404);
        }

        return response()->json($task);
    }
}
