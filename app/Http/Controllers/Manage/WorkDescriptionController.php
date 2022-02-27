<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Models\WorkDescription;
use Illuminate\Http\Request;

class WorkDescriptionController extends Controller
{
    
    public function index() 
    {
        return view('manage.work.description.index');
    }

    public function update(Request $request, WorkDescription $work_description) 
    {
        $this->validate($request, [
            'description' => 'required'
        ]);

        $work_description->update($request->all());
        return redirect()->back()->with('success', 'Work description has been edited');
    }
}
