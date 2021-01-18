<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Board;
use File;
use Image;
class BoardController extends Controller
{
    public function boardList(){
        $board = Board::get();
        return view('admin.board.board_list',compact('board'));
    }

    public function boardEditForm($id){
        $board_details = Board::where('id',$id)->first();
        return view('admin.board.board_edit_form',compact('board_details'));
    }

    public function updateBoard(Request $request,$id){
        $this->validate($request, [
            'sign'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $board = Board::where('id',$id)->first();
        if ($request->hasFile('sign')) {
            $cat_prev_image = $board->sign;

            $prev_img_delete_path = base_path().'/public/images/board/'.$cat_prev_image;
            $prev_img_delete_path_thumb = base_path().'/public/images/board/thumb/'.$cat_prev_image;
            if ( File::exists($prev_img_delete_path)) {
                File::delete($prev_img_delete_path);
            }

            if ( File::exists($prev_img_delete_path_thumb)) {
                File::delete($prev_img_delete_path_thumb);
            }


            $image = $request->file('sign');
            $image_name = time() . date('Y-M-d') . '.' . $image->getClientOriginalExtension();
            $destinationPath = base_path() . '/public/images/board/';
            $img = Image::make($image->getRealPath());
            $img->save($destinationPath . '/' . $image_name);
            $destination = base_path() . '/public/images/board/thumb';
            $img = Image::make($image->getRealPath());
            $img->resize(600, 600, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destination . '/' . $image_name);
            $board->sign = $image_name;
            $board->save();
        }

        if($board->save()){
            return redirect()->back()->with('message','Board Signature Updated Successfully');
        }
    }
}
