<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\TaskReminder;

class TaskController extends Controller
{
    public function store(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|in:pending,in_progress,completed',
        ]);

        $task = $project->tasks()->create($request->all());

        // Kirim notifikasi setelah tugas dibuat
        $users = User::all(); // Atau sesuaikan dengan logika pemilihan pengguna
        Notification::send($users, new TaskReminder());

        return redirect()->route('projects.show', $project->id);
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'status' => 'required|in:pending,in_progress,completed',
        ]);

        $task->update($request->all());

        // Kirim notifikasi setelah tugas diperbarui
        $users = User::all(); // Atau sesuaikan dengan logika pemilihan pengguna
        Notification::send($users, new TaskReminder());

        return redirect()->back();
    }

    public function destroy(Task $task)
    {
        $task->delete();

        // Kirim notifikasi setelah tugas dihapus
        $users = User::all(); // Atau sesuaikan dengan logika pemilihan pengguna
        Notification::send($users, new TaskReminder());

        return redirect()->back();
    }
}
