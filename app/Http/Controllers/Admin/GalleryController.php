<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use Image;
use File;
class GalleryController extends Controller
{
    public function galleryList(){
        $gallery = Gallery::get();
        return view('admin.gallery.gallery_list',compact('gallery'));
    }

    public function addImageForm(){
        return view('admin.gallery.add_image_form');

    }

    public function addImage(Request $request){
        $this->validate($request, [
            'caption'   => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        if ($request->hasFile('image')) {
                $path = base_path().'/public/images/gallery/';
                File::exists($path) or File::makeDirectory($path, 0777, true, true);
                $path_thumb = base_path().'/public/images/gallery/thumb/';
                File::exists($path_thumb) or File::makeDirectory($path_thumb, 0777, true, true);
                
                $gallery = new Gallery();
                $image = $request->file('image');
                $image_name = time() . date('Y-M-d') . '.' . $image->getClientOriginalExtension();
                // $destinationPath = base_path() . '/public/images/gallery/';
                $img = Image::make($image->getRealPath());
                $img->save($path . '/' . $image_name);
                
                // $destination = base_path() . '/public/images/gallery/thumb/';
                $img = Image::make($image->getRealPath());
                $img->resize(600, 600, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($path_thumb . '/' . $image_name);
                $gallery->caption = $request->input('caption');
                $gallery->image = $image_name;
                $gallery->save();
            
            return redirect()->back()->with('message','Gallery Image Added Successfully');
        } else {
            return redirect()->back()->with('error','Something Wrong Please Try again');
        }

    }

    public function deleteImage($id){
       
        $prev_image = Gallery::where('id',$id)->first();
        $prev_img_delete_path = base_path().'/public/images/gallery/'.$prev_image->image;
        $prev_img_delete_path_thumb = base_path().'/public/images/gallery/thumb/'.$prev_image->image;
        if ( File::exists($prev_img_delete_path)) {
            File::delete($prev_img_delete_path);
        }

        if ( File::exists($prev_img_delete_path_thumb)) {
            File::delete($prev_img_delete_path_thumb);
        }
        Gallery::where('id',$id)->delete();
        return redirect()->back();
    }

    public function imageEditForm($id){
        $gallery_data = Gallery::where('id',$id)->first();
        return view('admin.gallery.image_edit_form',compact('gallery_data'));

    }

    
}
