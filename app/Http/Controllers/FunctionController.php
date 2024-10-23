<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Vinkla\Hashids\Facades\Hashids;

class FunctionController extends Controller
{
    public function fileStore($file, $location)
    {
       
       
        $filename =  str_replace('-', '', Str::uuid()) . '.' . $file->getClientOriginalExtension();

        // File extension
        $extension = $file->getClientOriginalExtension();

        // File upload location
        $locate = $location;

        // Upload file
        $file->move($location, strtolower($filename));

        // File path
        $filepath = url($location . $filename);
        return $location . $filename;
    }
   

    public function fileDestroy($fileName)
    {
      

       
        $path=public_path().'/'.$fileName;
        if (file_exists($path)) {
            unlink($path);
            return true;
        }
        return false;  
    }

    public function decode($id)
    {
      
    }
}
