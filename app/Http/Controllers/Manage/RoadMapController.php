<?php

namespace App\Http\Controllers\Manage;

use App\Models\RoadMap;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoadMapController extends Controller
{
    public function index()
    {
        return view('manage.roadmap.index');
    }

    public function create()
    {
        return view('manage.roadmap.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        RoadMap::create($request->all());

        return redirect()->route('roadmaps.index')->with('success', 'Road map has been added');
    }

    public function edit(RoadMap $roadmap)
    {
        return view('manage.roadmap.edit', compact('roadmap'));
    }

    public function update(Request $request, RoadMap $roadmap)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        $roadmap->update($request->all());

        return redirect()->route('roadmaps.index')->with('success', 'Road map has been edited');
    }
    

    public function destroy(RoadMap $roadmap) 
    {
        $roadmap->delete();
        return redirect()->route('roadmaps.index')->with('success', 'Road map has been deleted');
    }
}
