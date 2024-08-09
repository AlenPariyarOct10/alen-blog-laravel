<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutInfo = About::orderBy('rank')->paginate(15);
        return view("backend.about.index", compact("aboutInfo"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.about.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(About::create($request->all()))
        {
            return view("backend.about.create")->with(["success"=>"About info added"]);
        }else{
            return view("backend.about.create")->with(["error"=>"Failed to add About info"]);

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
        $aboutInfo = About::findOrFail($id);
        return view("backend.about.edit", compact("aboutInfo"));
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
        $updateAbout = About::findOrFail($id);
        $aboutInfo = $updateAbout;
        if($updateAbout->update($request->all()))
        {
            return view("backend.about.edit", compact("aboutInfo"))->with(["success"=>"About info updated"]);
        }else{
            return view("backend.about.edit", compact("aboutInfo"))->with(["error"=>"Failed to update about"]);
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
        $aboutInfo = About::all();
        if(About::destroy($id))
        {
            return view("backend.about.index", compact("aboutInfo"))->with(["success"=>"About info deleted"]);
        }else{
            return view("backend.about.index", compact("aboutInfo"))->with(["error"=>"Failed to delete about"]);
        }
    }
}
