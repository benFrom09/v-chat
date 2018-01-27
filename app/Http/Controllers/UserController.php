<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Group;
use App\User;
use App\Profile;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $has_groups = User::hasGroup(Auth::user());

        
        $groups = Auth::user()->groups;
       
        
        return view('users.home',compact('has_groups','groups'));
    }

   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id) {
        $user = User::find(['id' => $user_id])->first();
        $data = $user->profile;
        
        if($user){
            
            return view('users.profile',compact('user','data'));
        } else {
            return view('errors.404', compact('user'));
        }       
    }

    public function updateProfile(Request $request,$user_id) {
        
        $profile = Profile::where(['user_id' => $user_id])->first();
        
        $user = Auth::user();
        $group = Group::where(['is_creator'=>$user->id]);
        $city = $request->city ? $request->city : $profile->city;
        $country = $request->country ? $request->country : $profile->country;
        $about = $request->about ? $request->about : $profile->about;
        $skill = $request->skill ? $request->skill : $profile->skill;
        $profile->update([
                        'city'=> $city,
                        'country'=> $country,
                         'about'=> $about,
                         'skill'=>$skill
        ]);

        $name = $request->name ? $request->name : $user->name;
        $firstname = $request->firstname ? $request->firstname : '';
        $email = $request->email ? $request->email : $user->email;
        $user->update([
            'name'=>$name,
            'firstname' =>$firstname,
            'email'=>$email
        ]);
        $group->update([
            'is_creator'=>$name
        ]);
        $response_profile = [
                'name' => $name,
                'firstname'=>$firstname,
                'email' => $email,
                'city' =>$city,
                'country' => $country,
                'skill' =>$skill,
                'about' =>$about,
                'avatar_url' => md5( strtolower( trim($email) ) )

        ];
        
            //return $response_profile;
        return redirect()->back();
           
    }


    public function account($id) {
        return view('users.account');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
