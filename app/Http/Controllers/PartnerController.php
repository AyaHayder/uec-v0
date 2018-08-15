<?php

namespace App\Http\Controllers;

use App\About;
use App\Slider;
use Validator;
use Illuminate\Http\Request;
use App\Partner;
use Session;
use Auth;
use Illuminate\Database\Eloquent\SoftDeletes;
class PartnerController extends Controller
{
    use softDeletes;
    public function getManagePartners()
    {
        $partners = Partner::paginate(10);
        $photos = Slider::all();
        $about = About::first();
        return view('Dashboard.manage_partners',compact('partners','photos','about'));
    }

    public function addPartner(Request $request)
    {
        $validator = Validator::make($request->all(),[
            "name" => "required",
            "logo" => "max:2000"
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        }
        $partner = new Partner;
        $partner->name = $request->name;
        $partner->logo = $request->logo;
        $partner->user_id = Auth::user()->id;
        $partner->save();
        Session::flash('updated','Partner was added successfully!');
        return redirect('admin/dashboard/partner/manage');
    }

    public function updatePartner(Request $request)
    {
        $id = $request->partner_id;
        $partner = Partner::find($id);
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            "logo" => "max:2000"
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        }
        $partner->name =$request->name;
        $partner->user_id =Auth::user()->id;
        $partner->logo =$request->logo;
        $partner->save();
        Session::flash('updated','Partner was updated successfully!');
        return redirect('admin/dashboard/partner/manage');
    }

    public function deletePartner(Partner $id)
    {
        $id->delete();
        Session::flash('updated','Partner was deleted successfully!');
        return redirect()->back();
    }
}
