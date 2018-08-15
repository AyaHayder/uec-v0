<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\SoftDeletes;

class SliderController extends Controller
{
    use softDeletes;
    public function manageSlider(Request $request)
    {
        if(isset($_POST['add'])){
            $rules = ["photo_url" => "required|max:2000"];
            $data = $this->validate($request,$rules);
            Slider::create($data);
            Session::flash('updated','Photos were added successfully!');
        }
        elseif(isset($_POST['delete'])){
            if(!empty($_POST['check_list'])){
                foreach($_POST['check_list'] as $selected){
                    $photo =Slider::find($selected);
                    $photo->delete();
                }
                Session::flash('updated','Photo(s) were deleted successfully!');
            }
        }
        elseif(isset($_POST['change'])){
            if(!empty($_POST['check_list'])){
                $rules = ["photo_url" => "required|max:2000"];
                $data = $this->validate($request,$rules);
                foreach ($_POST['check_list'] as $selected){
                    Slider::whereId($selected)->update($data);
                }
                Session::flash('updated','Photo(s) were changed successfully!');
            }
        }
        return back();
    }
}
