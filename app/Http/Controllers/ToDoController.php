<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ToDo;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use App\Models\Media;
use App\Models\Role;
use Intervention\Image\Facades\Image;

class ToDoController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'list_id' => 'required',
            'img' => 'required',
        ]);

        $to_do = new ToDo();
        $to_do->name = $request->name;
        $to_do->description = $request->description;
        $to_do->list_id = $request->list_id;
        $to_do->save();

        $images_arr = [];
        if ($request->hasFile('img')) {
            $images = $request->file('img');

            foreach ($images as $kry => $image) {
                // Resize the image
                $resizedImage = Image::make($image)->resize(150, 150);

                // Save the resized image to a specific path
                $filename = rand(1,1000).'_'. date('YmdHis') . '_' . time() . '.' . $image->getClientOriginalExtension();
                $resizedImagePath = 'images/' . $filename;
                $resizedImage->save($resizedImagePath);

                $new_img = new Media;
                $new_img->img = $filename;
                $new_img->to_do_id = $to_do->id;
                $new_img->save();

                array_push($images_arr, $new_img);
            }
        }

        return response()->json([
            'success' => $to_do,
            'img' => $images_arr,
            'imageAssetPath' => asset('images'),
            'list_id' => $request->list_id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store_img(Request $request)
    {
        $this->validate($request, [
            'to_do_id' => 'required',
            'img' => 'required',
        ]);

        $images_arr = [];
        if ($request->hasFile('img')) {
            $images = $request->file('img');

            foreach ($images as $image) {
                // Resize the image
                $resizedImage = Image::make($image)->resize(150, 150);

                // Save the resized image to a specific path
                $filename = rand(1,1000).'_'. date('YmdHis') . '_' . time() . '.' . $image->getClientOriginalExtension();
                $resizedImagePath = 'images/' . $filename;
                $resizedImage->save($resizedImagePath);

                $new_img = new Media;
                $new_img->img = $filename;
                $new_img->to_do_id = $request->to_do_id;
                $new_img->save();

                array_push($images_arr, $new_img);
            }
        }

        return response()->json([
            'img' => $images_arr,
            'imageAssetPath' => asset('images') 
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Get this to dos
        $list_item = ToDo::where('list_id', $id)->orderBy('id','desc')->get();

        // Get rolers
        $rolers = Role::with(['user','owner'])->where('list_id', $id)->get();

        if(!$rolers->isEmpty()){
            if($rolers->first()->owner_id == Auth::user()->id){
                $role_permission = 1;
            }else{
                $role_permission = $rolers->first()->role;
            }
        }else{
            $role_permission = 1;
        }

        return view('list.todos', compact(['list_item','rolers','role_permission']));

        return response()->json([
            'success' => 'success'
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $to_do = ToDo::find($id);
        $to_do->name = $request->name;
        $to_do->description = $request->description;
        $to_do->save();

        return response()->json([
            'success' => 'ToDo updated successfully!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $image = Media::where('to_do_id', $id)->get();
        if(count($image) > 0){
            foreach($image as $item){
                $imagePath = 'images/'.$item->img;
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
                $item->delete();
            }
        }

        ToDo::find($id)->delete($id);
  
        return response()->json([
            'success' => 'ToDo deleted successfully!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy_img(string $id)
    {
        $image = Media::find($id);

        $imagePath = 'images/'.$image->img;
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $image->delete();
  
        return response()->json([
            'success' => 'ToDo deleted successfully!'
        ]);
    }
}
