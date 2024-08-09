<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('backend.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'sub_description' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'github_link' => 'nullable|url|max:255',
            'technologies' => 'nullable|array', // Assuming this is an array of technologies
            'technologies.*' => 'string', // Each item in the technologies array should be a string
        ]);
        if($request->hasFile('thumbnail_upload')){
            $file = $request->file('thumbnail_upload');
            $filename = time().'.'.$file->getClientOriginalName();
            $file->move('assets/uploads/project/', $filename);
            $request->request->add(['thumbnail' => $filename]);
        }

        if(Project::create($request->all())){
            return redirect()->route('backend.projects.index')->with('success', 'Project Added Successfully');
        }else{
            return redirect()->route('backend.projects.index')->with('error', 'Something Went Wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('backend.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'sub_description' => 'nullable|string',
            'github_link' => 'nullable|url|max:255',
            'technologies' => 'nullable|string',
            'thumbnail_upload' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);


        $project = Project::findOrFail($id);


        if ($request->hasFile('thumbnail_upload')) {
            $file = $request->file('thumbnail_upload');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/uploads/project/'), $filename);
            $validatedData['thumbnail'] = $filename; // Update the filename in validated data
        }


        if ($project->update($validatedData)) {
            return redirect()->route('backend.projects.index')->with('success', 'Project updated successfully.');
        } else {
            return redirect()->route('backend.projects.index')->with('error', 'Something went wrong.');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Project::destroy($id))
        {
            return redirect()->route('backend.projects.index')->with('success', 'Project Deleted Successfully');
        }else{
            return redirect()->route('backend.projects.index')->with('error', 'Failed to delete project');

        }
    }
}
