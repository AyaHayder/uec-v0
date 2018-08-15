<?php

namespace App\Http\Controllers;

use App\About;
use App\Branch;
use App\Job;
use App\Slider;
use Auth;
use Session;
use Validator;
use Response;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobController extends Controller
{
    use softDeletes;
    public function getAddJob()
    {
        $branches = Branch::all();
        $about =About::first();
        $photos =Slider::all();
        return view('Dashboard.add_job',compact('branches','about','photos'));
    }

    public function getManageJob()
    {
        $branches = Branch::all();
        $about =About::first();
        $photos =Slider::all();
        $jobs =Job::paginate(10);
        return view('Dashboard.manage_jobs',compact('jobs','branches','about','photos'));
    }

    public function addJob(Request $request)
    {
        $job = new Job;
        $validator = Validator::make($request->all(),[
            'title' =>'required',
            'description' =>'required',
            'date'=>'required',
            'branch_id' => 'required',
            'image' => 'max:2000'
        ]);
        if ($validator->fails()){
            return back()->withErrors($validator->errors())->withInput();
        }
        $job->title = $request->title;
        $job->description = $request->description;
        $job->image = $request->image;
        $job->user_id = Auth::user()->id;
        $job->branch_id =$request->branch_id;
        $job->date =$request->date;
        $job->save();
        Session::flash('updated','Job was added successfully!');
        return redirect('/admin/dashboard/job/manage');
        }

    public function deleteJob(Job $id)
    {
        $id->delete();
        Session::flash('updated','Job was deleted successfully!');
        return redirect('/admin/dashboard/job/manage');
    }

    public function updateJob(Request $request)
    {
        $id = $request->job_id;
        $job =Job::find($id) ;
        $validator = Validator::make($request->all(),[
            'title' =>'required',
            'description'=>'required',
            'date'=>'required',
            'branch_id'=>'required',
            'image' => 'max:2000'

        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        }
        $job->title = $request->title;
        $job->description=$request->description;
        $job->date = $request->date;
        $job->image = $request->image;
        $job->branch_id = $request->branch_id;
        $job->user_id = Auth::user()->id;
        $job->save();
        Session::flash('updated','Job was updated successfully');
        return redirect('/admin/dashboard/job/manage');
    }
}


