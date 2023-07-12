<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ToDo;
use App\Models\User;
use App\Models\Role;

class RolesController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'role' => 'required',
            'list_id' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();
        if(isset($user) && $request->role != 1 && Auth::user()->email != $request->email){
            $role = new Role;
            $role->user_id = $user->id;
            $role->owner_id = Auth::user()->id;
            $role->role = $request->role;
            $role->list_id = $request->list_id;
            $role->save();
            
            return response()->json([
                'success' => true,
                'id' => $role->id
            ]);
        }else{
            return response()->json([
                'error' => 'User not found'
            ]);    
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $accesses = Role::where('user_id', Auth::user()->id)->get();

        return view('list.rolers', compact(['accesses']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Role::find($id)->delete($id);
  
        return response()->json([
            'success' => 'User deleted successfully!'
        ]);
    }
}
