<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class S3Controller extends Controller
{
   public function upload(Request $request)
    {
        if( $request->isMethod('post') )
        {
            # get file from request object
            $image = $request->file('image');

            # get s3 object make sure your key matches with
            # config/filesystem.php file configuration
            $s3 = \Storage::disk('s3');

            # rename file name to random name
            $file_name = uniqid() .'.'. $image->getClientOriginalExtension();

            # define s3 target directory to upload file to
            $s3filePath = '/assets/' . $file_name;

            # finally upload your file to s3 bucket
            $s3->put($s3filePath, file_get_contents($image), 'public');
        }
       
        return view('upload');
    }
}
