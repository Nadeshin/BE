<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // GET /api/tasks -> ambil semua task
    public function index()
    {
        $tasks = Task::all();

        return response()->json([
            'message' => 'Daftar task berhasil diambil',
            'data' => TaskResource::collection($tasks),
        ]);
    }

    // POST /api/tasks -> simpan task baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $task = Task::create($validated);

        return response()->json([
            'message' => 'Task berhasil dibuat',
            'data' => new TaskResource($task),
        ], 201);
    }

    // GET /api/tasks/{id} -> ambil satu task berdasarkan id
    public function show($id)
    {
        $task = Task::find($id);

        if (! $task) {
            return response()->json([
                'message' => 'Task tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'message' => 'Detail task berhasil diambil',
            'data' => new TaskResource($task),
        ]);
    }

    // PUT/PATCH /api/tasks/{id} -> ubah task
    public function update(Request $request, $id)
    {
        $task = Task::find($id);

        if (! $task) {
            return response()->json([
                'message' => 'Task tidak ditemukan',
            ], 404);
        }

        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'is_completed' => 'boolean',
        ]);

        $task->update($validated);

        return response()->json([
            'message' => 'Task berhasil diperbarui',
            'data' => new TaskResource($task),
        ]);
    }

    // DELETE /api/tasks/{id} -> hapus task
    public function destroy($id)
    {
        $task = Task::find($id);

        if (! $task) {
            return response()->json([
                'message' => 'Task tidak ditemukan',
            ], 404);
        }

        $task->delete();

        return response()->json([
            'message' => 'Task berhasil dihapus',
        ]);
    }
}
