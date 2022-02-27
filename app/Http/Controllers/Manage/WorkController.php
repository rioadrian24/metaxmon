<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Models\Work;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    
    public function index()
    {
        return view('manage.work.index');
    }

    public function create()
    {
        return view('manage.work.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        Work::create($request->all());

        return redirect()->route('works.index')->with('success', 'Work has been added');
    }

    public function edit(Work $work)
    {
        return view('manage.work.edit', compact('work'));
    }

    public function update(Request $request, Work $work)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        $work->update($request->all());

        return redirect()->route('works.index')->with('success', 'Work has been edited');
    }
    

    public function destroy(Work $work) 
    {
        $work->delete();
        return redirect()->route('works.index')->with('success', 'Work has been deleted');
    }
}
