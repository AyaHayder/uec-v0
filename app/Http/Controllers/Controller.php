<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Announcement;
use App\Branch;
use App\ContactInfo;
use App\Job;
use App\Partner;
use App\Service;
use App\Slider;
use App\User;
use Validator;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //1.
    public function getDashboard()
    {
        $photos =Slider::all();
        $about = About::first();
        $activities =Activity::all();
        $branches = Branch::all();
        $services = Service::all();
        $announcements =Announcement::all();
        $jobs = Job::all();
        $partners =Partner::all();
        $users =User::all();
        $contacts =ContactInfo::all();
        return view('Dashboard.main', compact(
            'photos',
            'about',
            'activities',
            'branches',
            'services',
            'announcements',
            'jobs',
            'partners',
            'users',
            'contacts'
                ));
    }

    //2.
    public function getIndex()
    {
        $photos =Slider::all();
        $services =Service::paginate(10);
       return view('Website.index', compact('photos','services'));
    }
    //3.
    public function getAbout()
    {
        $about = About::first();
        return view('Website.about',compact('about'));
    }
    //4.
    public function getContact()
    {
        $contacts = ContactInfo::paginate(10);
        return view('Website.contact_us',compact('contacts'));
    }

    //5.
    public function changeAbout(Request $request)
    {
        $rules = [
            "description" =>"required"
        ];
        $data = $this->validate($request,$rules);
        if(isset($_POST['add'])){
            About::create($data);
        }
        else{
                About::whereId(1)->update($data);
            }
        Session::flash('updated','Description was updated successfully');
        return back();

    }

    //6.
    public function search(Request $request)
    {
        $search = $request->search;

        $count = Activity::where('title', 'like' ,"%$search%")->count();
        if($count >0){
            $activities= Activity::where('title','like',"%$search%")->paginate(3);
        }

        $count = Announcement::where('title','like',"%$search%")->count();
        if($count >0){
            $announcements= Announcement::where('title','like',"%$search%")->paginate(3);
        }

        $count = Service::where('title','like',"%$search%")->count();
        if($count >0){
            $services = Service::where('title','like',"%$search%")->paginate(3);
        }

        if(empty($announcements) && empty($activities) && empty($services)){
          return view('Website.search_not_found');
        }

        return view('Website.search',compact('activities','announcements','services'));
    }
    //7.
    public function getContactInfo()
    {
        $photos =  Slider::all();
        $contacts = ContactInfo::all();
        return view('Dashboard.contact_info',compact('contacts','photos'));
    }

    //8.
    public function addContactInfo(Request $request)
    {
        $rules = ['email'=>'required|email','telephone'=>'required|max:15'];
        $data = $this->validate($request,$rules);
        ContactInfo::create($data);
        return back();
    }
    
    //9.
    public function manageContacts(Request $request)
    {
        if(isset($_POST['delete'])){
            $id =$request->contact_id;
            ContactInfo::whereId($id)->delete();
            Session::flash('updated','Contact info were deleted successfully!');
        }
        else{
            $id =$request->contact_id;
            $rules = ['email'=>'required|email', 'telephone' => 'required|max:15'];
            $data = $this->validate($request,$rules);
            ContactInfo::whereId($id)->update($data);
            Session::flash('updated','Contact info were updated successfully!');
        }
        return back();
    }
}
