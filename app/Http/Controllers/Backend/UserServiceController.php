<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\UserService;
use Illuminate\Http\Request;

class UserServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userServices = UserService::orderBy('rank')->paginate(10);
        return view('backend.services.index', compact('userServices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'color_class' => 'required|string|max:255',
        ]);

        if (UserService::create($request->all())) {
            $request->session()->flash('success', 'User service created');
        } else {
            $request->session()->flash('failed', 'User service creation failed');
        }

        return redirect()->route('backend.services.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userService = UserService::findOrFail($id);
        return view('backend.services.show', compact('userService'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userService = UserService::findOrFail($id);
        return view('backend.services.edit', compact('userService'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'color_class' => 'required|string|max:255',
        ]);

        $userService = UserService::findOrFail($id);

        if ($userService->update($request->all())) {
            $request->session()->flash('success', 'User service updated');
        } else {
            $request->session()->flash('failed', 'User service update failed');
        }

        return redirect()->route('backend.services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userService = UserService::findOrFail($id);

        if ($userService->delete()) {
            session()->flash('success', 'User service deleted');
        } else {
            session()->flash('failed', 'User service deletion failed');
        }

        return redirect()->route('backend.services.index');
    }
}

?>
