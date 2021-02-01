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

    public function insertDoc(Request $request){
        $this->validate($request, [
            'name'=>'required',
            'file'=>'required|mime:pdf,doc,docx',
        ]);

    }

    public function deleteDoc($doc_id){
        $doc = Document::findorFail($doc_id);

    }
}