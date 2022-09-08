<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use App\Http\Controllers\File;
use Illuminate\Support\Facades\URL;
class functionalController extends Controller
{

    public static function checkBoxValue($value)
    {
        if ($value === null) {
            return 1;
        } else {
            return 0;
        }
    }


    public static function uploadEmailAttachment($value, $folder)
    {

        $imageName = Str::random(5) . time() . '.' . $value->extension();
        $value->move('images/' . $folder, $imageName);
        // 
        $url = URL::to('') . '/images/' . $folder . "/" .  $imageName;
        return $url;
    }

    public static function uploadImage($value, $folder)
    {


        if ($value) {
            $imageName = Str::random(5) . time() . '.' . $value->extension();
            $value->move('images/' . $folder, $imageName);
            return $imageName;
        } else {
            return null;
        }
    }

    public static function editUploadImage($value, $folder, $oldimage)
    {
        if ($value) {
            if ($oldimage != null) {
                $image_path = base_path() . '/public/images/' . $folder . "/" . $oldimage;  // prev image path
                if (\File::exists($image_path)) {
                    unlink($image_path);
                }
            }
            $imageName = Str::random(5) . time() . '.' . $value->extension();
            $value->move('images/' . $folder, $imageName);
            return $imageName;
        } else {
            return $oldimage;
        }
    }

    public static function deleteImage($folder, $oldimage)
    {
        $image_path = base_path() . '/public/images/' . $folder . "/" . $oldimage;  // prev image path
        if (\File::exists($image_path)) {
            unlink($image_path);
        }
    }

    function generateRandomNo($length, $table, $entity)
    {
        $number = '';

        do {
            for ($i = $length; $i--; $i > 0) {
                $number .= mt_rand(0, 9);
            }
        } while (!empty(DB::table($table)->where($entity, $number)->first()));

        return $number;
    }
}
