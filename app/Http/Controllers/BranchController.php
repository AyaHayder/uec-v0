<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\About;
use App\Slider;
use App\Branch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;
use Session;

class BranchController extends Controller
{
    use softDeletes;
    //1.
    public function getManageBranches()
    {
        $branches =Branch::paginate(10);
        $photos = Slider::all();
        $about = About::first();
        return view('Dashboard.manage_branches', compact('photos','about','branches'));
    }
    //2.
    public function addBranch(Request $request)
    {
        $branch = new Branch;
        $validator = Validator::make($request->all(),[
            "location" => "required",
            "address" => "required"
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        }
        $branch->location =$request->location ;
        $branch->address = $request->address;
        $branch->user_id = Auth::user()->id;
        $branch->save();
        Session::flash('updated','Branch was added successfully!');
        return redirect('/admin/dashboard/manage_branches');
    }
    //3.
    public function deleteBranch(Branch $id)
    {
        $id->delete();
        Session::flash('updated','Branch was deleted successfully!');
        return redirect('/admin/dashboard/manage_branches');
    }
    //4.
    public function updateBranch(Request $request)
    {
        $id =$request->branch_id;
        $branch = Branch::find($id);
        $validator = Validator::make($request->all(),[
            'location' =>'required',
            'address' => 'required'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        }
        $branch->location =$request->location ;
        $branch->address = $request->address;
        $branch->user_id = Auth::user()->id;
        $branch->save();
        Session::flash('updated','Branch was added successfully!');
        return redirect('/admin/dashboard/manage_branches');
    }
}
