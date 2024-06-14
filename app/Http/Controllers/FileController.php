<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function GetImage($userid, $image) {
        $file_path = public_path('assets/users/user-'. $userid .'/images/' . $image);

        if (file_exists($file_path) && is_file($file_path)) {
            return response()->file($file_path);
        }
    }

    public function GetFile($userid, $file) {
        $file_path = public_path('assets/users/user-'. $userid .'/files/' . $file);

        if (file_exists($file_path) && is_file($file_path)) {
            return response()->file($file_path);
        }
    }
}
