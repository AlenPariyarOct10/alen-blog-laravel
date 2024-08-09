<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Gallery::all();
        return view('backend.gallery.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'rank' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10000',

        ]);

        if($request->hasFile('image_upload')){
            $file = $request->file('image_upload');
            $filename = time().'.'.$file->getClientOriginalName();
            $file->move('assets/uploads/gallery/', $filename);
            $request->request->add(['image' => $filename]);
        }

        if(Gallery::create($request->all())){
            return redirect()->route('backend.gallery.index')->with('success', 'Image Added Successfully');
        }else{
            return redirect()->route('backend.gallery.index')->with('error', 'Something Went Wrong');
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
        $galleryItem = Gallery::findOrFail($id);
        return view("backend.gallery.edit", compact("galleryItem"));
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
        $request->validate([
            'rank' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10000',

        ]);

        if($request->hasFile('image_upload')){
            $file = $request->file('image_upload');
            $filename = time().'.'.$file->getClientOriginalName();
            $file->move('assets/uploads/gallery/', $filename);
            $request->request->add(['image' => $filename]);
        }

        $imgObj = Gallery::findOrFail($id);

        if($imgObj->update($request->all())){
            session()->flash('success', 'Image Updated Successfully');
        }else{
            session()->flash('error', 'Something Went Wrong');
        }

        return redirect()->route('backend.gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Gallery::findOrFail($id);

        if($image->delete())
        {
            session()->flash('success', 'Image Deleted Successfully');
        }else{
            session()->flash('error', 'Something Went Wrong');
        }

        return redirect()->route('backend.gallery.index');
    }
}
