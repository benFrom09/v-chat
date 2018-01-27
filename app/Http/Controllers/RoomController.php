<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\User;
use App\Post;
use  Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    public function room(Request $req,$id) {
        $group = Group::find($id);
        $users = User::all();
        $top_20_posts = Post::orderBy('created_at','desc')->get();
        if($group) {
            if($this->authorizeAccess($group)){
                return view('rooms.room',compact('top_20_posts','group'));
            } else {
                dd("Vous n'avez pas accés a se groupe");
            }
        } else {
            return 'cette page est introuvable';
        }
     
    }

    private function authorizeAccess($group) {
       // $group = Group::find($room_id);
        if($group->users->contains(Auth::user()->id)) {
            return true;
        } else {
            return false;
        }
    }


}
