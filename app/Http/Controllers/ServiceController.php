<?php

namespace App\Http\Controllers;

use App\About;
use App\Branch;
use App\Service;
use App\Slider;
use Validator;
use Illuminate\Http\Request;
use Auth;
use Session;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceController extends Controller
{
    use softDeletes;
    public function getManageServices()
    {
        $services =Service::paginate(10);
        $photos =Slider::all();
        $about = About::first();
        $branches =Branch::all();
        return view('Dashboard.manage_service',compact('services','photos','about','branches'));
    }

    public function getAddService()
    {
        $services =Service::all();
        $photos =Slider::all();
        $about = About::first();
        $branches =Branch::all();
        return view('Dashboard.add_service',compact('services','photos','about','branches'));
    }

    public function addService(Request $request)
    {
        $service = new Service;
        $validator =Validator::make($request->all(),[
            "title" => "required",
            "description" => "required",
            "icon" =>"required|max:2000",
            "branch_id" => "required"
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        }
        $service->title = $request->title;
        $service->description = $request->description;
        $service->icon = $request->icon;
        $service->user_id = Auth::user()->id;
        $service->branch_id =$request->branch_id;
        $service->save();
        Session::flash('updated','Service was added successfully!');
        return redirect('/admin/dashboard/service/manage');
    }

    public function updateService(Request $request)
    {
        $id = $request->service_id;
        $service =Service::find($id) ;
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'description' => 'required',
            'icon' => 'required|max:2000',
            'branch_id' => 'required'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        }
        $service->title = $request->title;
        $service->description=$request->description;
        $service->icon = $request->icon;
        $service->branch_id = $request->branch_id;
        $service->user_id = Auth::user()->id;
        $service->save();
        Session::flash('updated','Service was updated successfully');
        return redirect('/admin/dashboard/service/manage');
    }

    public function deleteService(Service $id)
    {
        $id->delete();
        Session::flash('updated','Service was deleted successfully!');
        return redirect('/admin/dashboard/service/manage');
    }
}
