<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ToDoList;
use App\Models\Role;
use App\Models\ToDo;
use App\Models\Media;

class ToDoListController extends Controller
{
    public function index(Request $request)
    {   
        // Get this user lists
        $list = ToDoList::where('user_id', Auth::user()->id)->orderBy('id','desc')->get();

        // Get all access
        $accesses = Role::with(['user', 'list'])->where('user_id', Auth::user()->id)->get();

        // Data send to blade
        return view('home', compact(['list', 'accesses']));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        
        $list = new ToDoList();
        $list->name = $request->name;
        $list->user_id = Auth::user()->id;
        $list->save();

        return response()->json([
            'success' => $list
        ]);
    }

     /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $todos = ToDo::where('list_id', $id)->get();

        $image = Media::whereIn('to_do_id', $todos->pluck('id')->toArray())->delete();

        ToDo::where('list_id', $id)->delete();

        ToDoList::find($id)->delete($id);

        return response()->json([
            'success' => 'ToDoList deleted successfully!'
        ]);
    }
}
