<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::paginate(10);
        return view('backend.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.blogs.create');
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
            'title' => 'required',
            'content' => 'required',

            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'rank' => 'nullable|integer',
        ]);

        $slug = Str::slug($request->title);

        $request->merge(['slug' => $slug]);

        if($request->hasFile('thumbnail_upload')){
            $file = $request->file('thumbnail_upload');
            $filename = time().'.'.$file->getClientOriginalName();
            $file->move('assets/uploads/blog/', $filename);
            $request->request->add(['thumbnail' => $filename]);
        }

        if(Blog::create($request->all())){
            return redirect()->route('backend.blogs.index')->with('success', 'Blog Added Successfully');
        }else{
            return redirect()->route('backend.blogs.index')->with('error', 'Something Went Wrong');
        }
    }

    public function uploadimage(Request $request)
    {
        if($request->hasFile('upload')){
            $originalName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originalName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
            $request->file('upload')->move('assets/uploads/blog/', $fileName);

            $url = asset('assets/uploads/blog/'.$fileName);
            return response()->json(['fileName'=>$fileName, 'uploaded'=>1, 'url' => $url]);
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
        $blog = Blog::findOrFail($id);
        return view('backend.blogs.edit', compact('blog'));
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
            'title' => 'required',
            'content' => 'required',

            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'rank' => 'nullable|integer',
        ]);


        if($request->hasFile('thumbnail_upload')){
            $file = $request->file('thumbnail_upload');
            $filename = time().'.'.$file->getClientOriginalName();
            $file->move('assets/uploads/blog/', $filename);
            $request->request->add(['thumbnail' => $filename]);
        }

        $imgObj = Blog::findOrFail($id);

        if($imgObj->update($request->all())){
            session()->flash('success', 'Image Updated Successfully');
        }else{
            session()->flash('error', 'Something Went Wrong');
        }

        return redirect()->route('backend.blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteBlog = Blog::findOrFail($id);
        if($deleteBlog->delete()){
            return redirect()->route('backend.blogs.index')->with('success', 'Blog Deleted Successfully');
        }else{
            return redirect()->route('backend.blogs.index')->with('error', 'Something Went Wrong');
        }


    }

    public function checkTitle(Request $request)
    {
        // Check if a blog with the given title exists
        $exists = Blog::where('title', $request->query('title'))->exists();

        if (!$exists) {
            return response()->json(["available" => true]);
        } else {
            return response()->json(["available" => false]);
        }
    }
}
