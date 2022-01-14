<?php

namespace App\Http\Controllers;

use App\TemporaryFile;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function store(Request $request){
        if($request->hasFile('wishPicture')){
            $file = $request->file('wishPicture');
            $filename = $file->getClientOriginalName();
            $folder = uniqid() . '-' . now()->timestamp;
            $file->storeAs('uploads/tmp' . $folder, $filename);

            TemporaryFile::create([
               'folder'=> $folder,
                'filename' => $filename
            ]);

            return $folder;
        }
        return '';
    }
}
