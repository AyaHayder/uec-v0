<?php

namespace App\Http\Controllers;

use App\Announcement;
use Validator;
use Illuminate\Http\Request;
use App\Slider;
use App\About;
use App\branch;
use Session;
use Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class AnnouncementController extends Controller
{
    use softDeletes;
    public function getAnnouncements()
    {
        $announcements=Announcement::paginate(10);
       return view('Website.announcements',compact('announcements')) ;
    }

    public function getMakeAnnouncement()
    {
        $photos =Slider::all();
        $about = About::first();
        $branches= Branch::all();
        return view('Dashboard.make_announcement',compact('photos','about','branches'));
    }

    public function makeAnnouncement(Request $request)
    {
        $announcement = new Announcement;
        $validator = Validator::make($request->all(),[
            "title" => "required",
            "contents" =>"required",
            "announcement_date" =>"required",
            "branch_id"=>"required",
            "image" => "max:2000"
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        }
        $announcement->title = $request->title;
        $announcement->contents=$request->contents;
        $announcement->announcement_date = $request->announcement_date;
        $announcement->image = $request->image;
        $announcement->user_id = Auth::user()->id;
        $announcement->branch_id = $request->branch_id;
        $announcement->save();
        Session::flash('updates','Announcement was created successfully!');
        return redirect('/admin/dashboard/announcement/manage');
    }

    public function getManageAnnouncement()
    {
        $announcements = Announcement::paginate(10);
        $photos =Slider::all();
        $about = About::first();
        $branches=Branch::all();
        return view('Dashboard.manage_announcement', compact('announcements','photos','about','branches'));

    }

    public function deleteAnnouncement(Announcement $id)
    {
        $id->delete();
        Session::flash('updated','Announcement was deleted successfully!');
        return redirect('/admin/dashboard/announcement/manage');
    }

    public function updateAnnouncement(Request $request)
    {
        $id = $request->announcement_id;
        $announcement =Announcement::find($id) ;
        $validator = Validator::make($request->all(),[
           'title' =>'required',
           'contents'=>'required',
           'announcement_date'=>'required',
            'branch_id'=>'required',
            "image" => "max:2000"
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        }
        $announcement->title = $request->title;
        $announcement->contents=$request->contents;
        $announcement->announcement_date = $request->announcement_date;
        $announcement->image = $request->image;
        $announcement->branch_id = $request->branch_id;
        $announcement->user_id = Auth::user()->id;
        $announcement->save();
        Session::flash('updated','Announcement was updated successfully');
        return redirect('/admin/dashboard/announcement/manage');
    }

}
