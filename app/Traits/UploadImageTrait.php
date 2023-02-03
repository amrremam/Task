<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait UploadImageTrait
{
    public function uploadImage(Request $request,$folderName)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $image = $request->file('photo')->getClientOriginalName();
        $path = $request->file('photo')->storeAs($folderName,$image,'noaf');
        if ($image) {
            return back()->with('success','image uploaded');
        }

        else {
            return back()->with("failed", "image not uploaded");
        }
        return redirect()->back();
    }
}