<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Progress;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $progress = Progress::all();
        $task = Task::all();
        $tasks = auth()->user()->statuses()->with('tasks')->get();
        // $tasksid = auth()->user()->tasks()->get();
        // $totalTasks = $tasksid->count(); // Total jumlah tugas yang sedang diproses
        // $totalBacklogTasks = $tasksid->where('status_id', 1)->count();
        // $totalNextTasks = $tasksid->where('status_id', 2)->count();
        // $totalInProgressTasks = $tasksid->where('status_id', 3)->count();
        // $totalDoneTasks = $tasksid->where('status_id', 4)->count();

        // // Menghitung persentase kemajuan relatif dari setiap status
        // $backlogProgressPercentage = ($totalBacklogTasks / $totalTasks) * 100;
        // $nextProgressPercentage = ($totalNextTasks / $totalTasks) * 100;
        // $inProgressProgressPercentage = ($totalInProgressTasks / $totalTasks) * 100;
        // $doneProgressPercentage = ($totalDoneTasks / $totalTasks) * 100;

        // dd([
        //     'backlogProgressPercentage' => $backlogProgressPercentage,
        //     'nextProgressPercentage' => $nextProgressPercentage,
        //     'inProgressProgressPercentage' => $inProgressProgressPercentage,
        //     'doneProgressPercentage' => $doneProgressPercentage
        // ]);
                return view('pages.progress.index', compact('progress', 'tasks', 'task'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        Progress::create([
            'title' => $request->title,
        ]);

        return back()->with('success', 'store');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Progress $progress)
    {
        $request->validate([
            'status' => 'required|in:todo,in_progress,done',
        ]);

        $progress->update([
            'status' => $request->status,
        ]);
        return back()->with('success', 'update');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Progress $progress)
    {
        $progress->delete();
        return back()->with('success', 'destroy');

    }
}
