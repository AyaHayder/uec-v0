<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Validator;
use App\User;
use Auth;
use Session;
use Response;
use App\Slider;
use App\About;
use Illuminate\Database\Eloquent\SoftDeletes;
class UserController extends Controller
{
    use softDeletes;
    //1.
    public function getLogin(){
        return view('Website/login');
    }

    //2.
    public function attemptLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users',
            'password' => 'required'
        ]);
        if ($validator->fails())
            return back()->withErrors($validator->errors())->withInput();
        $credentials = $request->only('email', 'password');
        $rememberMe =$request->remember_me;

        if (Auth::guard('web')->attempt($credentials,$rememberMe)) {
            return redirect('/');
        }
        else {
            Session::flash('warningMessage','wrong email or password!');
            return redirect('/login');
        }

    }
    //3.
    public function getRegister()
    {
     $photos =Slider::all();
     $about = About::first();
     return view('Website.register',compact('photos','about'));
    }
    //4.
    public function Register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ]);
        if ($validator->fails())
            return back()->withErrors($validator->errors())->withInput();
        $count =User::all()->count();
        $flag =false;
        if($count === 0){
            $flag =true;
        }
        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        if($flag){
            $user->is_admin =true;
        }
        $user->save();
        if ($user->save()) {
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                Session::flash('updated',"$user->first_name have been registered successfully!");
                return redirect('/');
            } else {
                return back()->withError(['error' => 'wrong email or password']);
            }
        }
        return abort(500);
    }

    //5.
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }

    //6.
    public function viewProfile()
    {
        $user = Auth::user();
        return view('Website.view_profile', compact('user'));
    }

    //.7
    public function getManageUsers()
    {
        $users = User::paginate(10);
        $photos = Slider::all();
        $about = About::first();
        return view('Dashboard.manage_users',compact('users','photos','about'));
        
    }
    
    //8.
    public function manageUser(Request $request)
    {
        $validator = Validator::make($request->all(),[
            "select_users" => "required",

        ]);
        if ($validator->fails()){
            return back()->withErrors($validator->errors())->withInput();
        }
        if(isset($_POST['make_admin'])){
            $id=$request->select_users;
            $user = User::find($id);
            $user->is_admin = true;
            $user->save();
            Session::flash('updated','User\'s permissions were updated to admin');
        }
        elseif(isset($_POST['remove_admin'])){
            $id=$request->select_users;
            $user = User::find($id);
            $user->is_admin = false;
            $user->save();
            Session::flash('updated','Admin\'s permissions were updated to user');
        }
        else{
            $id =$request->select_users;
            $user = User::find($id);
            $user->delete();
            Session::flash('updated','User was deleted successfully!');

        }
        return back();
    }

    //9.
    public function changeProfilePic(Request $request)
    {
        $id =Auth::user()->id;
        $rules =["avatar" => "required"];
        $data =$this->validate($request,$rules);
        User::whereId($id)->update($data);
        Session::flash('updated','Your profile picture was updated successfully!');
        return back();
    }

    //10.
    public function deleteProfilePic()
    {
        $user=Auth::user();
        $user->avatar='/images/img_24787.png';
        $user->save();
        return back();

    }

    //11.
    public function changeUsername(Request $request)
    {
        $id=Auth::user()->id;
        $rules =["first_name" => "required", "last_name" => "required"];
        $data =$this->validate($request,$rules);
        User::whereId($id)->update($data);
        return back();
    }

    //12.
    public function changeEmail(Request $request)
    {
        $id = Auth::user()->id;
        $rules =["email" => "required"];
        $data =$this->validate($request,$rules);
        User::whereId($id)->update($data);
        return back();
    }
}
