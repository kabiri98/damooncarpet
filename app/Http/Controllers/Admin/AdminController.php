<?php

namespace App\Http\Controllers\Admin;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    protected function uploadImages($file)
    {
        $year = Carbon::now()->year;
        $month = Carbon::now()->month;
        $day = Carbon::now()->day;
        $imagePath = "/upload/images/{$year}/{$month}/{$day}";
        $filename = $file->getClientOriginalName();

        $file = $file->move(public_path($imagePath) , $filename);

        // $sizes = ["300" , "600" , "900"];
        // $url['images'] = $this->resize($file->getRealPath() , $sizes , $imagePath , $filename);
        // //bold picture//
        // $url['thumb'] = $url['images'][$sizes[0]];

        // return $url;
        // dd($url);
    }

}
