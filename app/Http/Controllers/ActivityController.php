<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Gallery;
use Validator;
use Illuminate\Http\Request;
use App\Slider;
use App\About;
use App\Branch;
use Auth;
use Session;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActivityController extends Controller
{
    use softDeletes;
    public function getActivities()
    {
        $activities =Activity::paginate(10);
        $gallery =Gallery::all();
        return view('Website.activities', compact('activities','gallery'));
    }

    public function getMakeActivity()
    {
        $photos =Slider::all();
        $about = About::first();
        $branches= Branch::all();
        return view('Dashboard.make_activity',compact('photos','about','branches'));
    }

    public function makeActivity(Request $request)
    {
         $activity = new Activity;
         $validator =Validator::make($request->all(),[
             "title" => "required",
            "contents" => "required",
            "activity_date" => "required",
            "header_photo" => "required",
            "branch_id" => "required",
         ]);
        if ($validator->fails()){
            return back()->withErrors($validator->errors())->withInput();
        }
        $activity->title = $request->title;
        $activity->contents=$request->contents;
        $activity->activity_date = $request->activity_date;
        $activity->header_photo = $request->header_photo;
        $activity->user_id = Auth::user()->id;
        $activity->branch_id = $request->branch_id;
        $activity->save();
        Session::flash('updated','Activity was created successfully');
        $about = About::first();
        $photos=Slider::all();
        return view('Dashboard.main', compact('photos','about'));
    }

    public function getManageActivity()
    {
        $activities = Activity::paginate(10);
        $photos =Slider::all();
        $about = About::first();
        $branches=Branch::all();
        return view('Dashboard.manage_activity', compact('activities','photos','about','branches'));
    }

    public function deleteActivity(Activity $id)
    {
        $id->delete();
        Session::flash('updated','Activity was deleted successfully!');
        return redirect('/admin/dashboard/activity/manage');
    }

    public function updateActivity(Request $request)
    {
        $id = $request->activity_id;
        $activity =Activity::find($id) ;
        $validator = Validator::make($request->all(),[
            'title' =>'required',
            'contents' =>'required',
            'activity_date' =>'required',
            'header_photo'=>'required|max:2000',
            'branch_id' => 'required'
        ]);
        if ($validator->fails()){
            return back()->withErrors($validator->errors())->withInput();
        }
        $activity->title = $request->title;
        $activity->contents=$request->contents;
        $activity->activity_date = $request->activity_date;
        $activity->header_photo = $request->header_photo;
        $activity->branch_id = $request->branch_id;
        $activity->user_id = Auth::user()->id;
        $activity->save();
        Session::flash('updated','Activity was updated successfully');
        return redirect('/admin/dashboard/activity/manage');
    }

}
