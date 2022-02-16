<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    function upload (Request $req)
    {
        $imageName = time().'.'.$req->file->getClientOriginalName();
        $req->file->move(public_path('images'), $imageName);
        return ["result"=>$imageName];
    }
}