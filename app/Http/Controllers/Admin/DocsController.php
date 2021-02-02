<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Document;
use Image;
use File;
class DocsController extends Controller
{
    public function docList(){
        $docs = Document::latest()->get();
        return view('admin.docs.docs_list',compact('docs'));
    }

    public function addDocForm(){
        return view('admin.docs.add_doc');
    }

    

    public function addDoc(Request $request){
        $this->validate($request, [
            'title'   => 'required',
            'doc'=> 'required|mimes:doc,pdf,docx|max:10240',
        ]);
        $fileName = null;
        if ($request->hasFile('doc')) 
        {
          $file = $request->file('doc');
          $fileName = time().'.'.$request->file('doc')->extension();  
          $request->file('doc')->move(public_path('uploads'), $fileName);
        }
       

          $docs = new Document();
          $docs->name = $request->input('title');
          $docs->file = $fileName;
          if($docs->save()){
              return redirect()->back()->with('message','Docs Uploaded Successfully');
          }else{
            return redirect()->back()->with('error','Something went wrong');
          }   
    }

    public function deleteDoc($id){

        $doc_details =Document::where('id',$id)->first();
        File::delete(public_path('uploads/'.$doc_details->file));
    
        Document::where('id',$id)->delete();
        return redirect()->back();
    }

  
    
}