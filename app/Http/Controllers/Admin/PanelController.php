<?php

namespace App\Http\Controllers\Admin;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Hash;
use App\User;
use App\Role;

class PanelController extends Controller
{
    public function index(){
        auth()->loginUsingId(1);
        return view('Admin.sections.dash1');
    }
    public function uploadImageSubject(){
        //  return request()->all();
        $this->validate(request(),[
            'upload'=>'required|mimes:jpeg,png,jpg,jfif,bmp'
        ]);
        $file=request()->file('upload');
        $filename = $file->getClientOriginalName();

        $year = Carbon::now()->year;
        $month = Carbon::now()->month;
        $day = Carbon::now()->day;
        $imagePath = "/upload/images/{$year}/{$month}/{$day}";
if(file_exists(public_path($imagePath),$filename)) {
$url=$imagePath.$filename;
return "<script>window.parent.CKEDITOR.tools.callFunction(1,'{$url}','فایل با موفقیت بارگذاری شد')</script>";
}
    }
}

