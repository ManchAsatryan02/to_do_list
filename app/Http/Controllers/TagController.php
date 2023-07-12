<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'to_do_id' => 'required'
        ]);
        
        $tag = new Tag();
        $tag->name = $request->name;
        $tag->to_do_id = $request->to_do_id;
        $tag->user_id = Auth::user()->id;
        $tag->save();

        return response()->json([
            'success' => $tag
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
  
        return response()->json([
            'success' => 'Tag deleted successfully!'
        ]);
    }
}
