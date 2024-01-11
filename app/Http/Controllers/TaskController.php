<?php

namespace App\Http\Controllers;

use App\Models\project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function store(project $project)
    {
        $data = request()->validate([
            'body' => 'required'
        ]);

        $data['done'] = 0;

        $data['project_id'] = $project->id;



        Task::create($data);

        return back();
    }

    public function update(project $project, Task $task)
    {
        $task->update([
            'done' => request()->has('done')
        ]);

        return back();
    }

    public function destroy(project $project,Task $task)
    {

        $task->delete();

        return redirect('/projects/'. $project->id);
    
    }
}


