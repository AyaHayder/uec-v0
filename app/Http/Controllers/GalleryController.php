<?php

namespace App\Http\Controllers;

use App\Gallery;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\SoftDeletes;

class GalleryController extends Controller
{
    use softDeletes;
    public function getGallery()
    {
        $images = Gallery::paginate(18);
        return view('Dashboard.activities_gallery', compact('images'));
    }

    public function manageGallery(Request $request)
    {
        if(isset($_POST['add'])){
            $rules = ["image" =>"required|max:2000"];
            $data = $this->validate($request,$rules);
            Gallery::create($data);
            Session::flash('updated','Image was added successfully!');
        }
        elseif(isset($_POST['delete'])){
            if(!empty($_POST['check_list'])){
                foreach($_POST['check_list'] as $selected){
                    $photo =Gallery::find($selected);
                    $photo->delete();
                }
                Session::flash('updated','Photo(s) were deleted successfully!');
            }
        }
        elseif(isset($_POST['change'])){
            if(!empty($_POST['check_list'])){
                $rules = ["image" =>"required|max:2000"];
                $data = $this->validate($request,$rules);
                foreach ($_POST['check_list'] as $selected){
                    Gallery::whereId($selected)->update($data);
                }
                Session::flash('updated','Photo(s) were updated successfully!');
            }
        }
        return back();
    }
}
