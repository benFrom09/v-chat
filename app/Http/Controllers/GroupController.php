<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
Use App\Group;
use  Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    public function index () {
      $groups = Group::all();
      
      return view('groups.groups',compact('groups'));

    }

    public function show ($id) {
        return view('groups.chat-room');
    }

    public function create () {
        return view('groups.create-group');
    }

    public function store(Request $req) {
      $name = $req->name;
      $group = Group::where('name', $name)->first();
      $has_groups = User::hasGroup(Auth::user());  
      $groups = Auth::user()->groups;
      if(!$group){
          $group = Group::create([
          "name" => $name,
          "is_creator" =>$req->is_creator,
          "description" => $req->description
          
          ]);       
           $group->users()->sync(Auth::user()->id);
      }
      
          return view('users.home',compact('groups','has_groups'));              
  }

    public function destroy () {
      
    }

    public function signIn (Request $req) {
      $this->addUserToGroup($req);
      return redirect()->back()->with('success','Vous avez été ajouté à la liste des utilisateurs');
    }

    public function signOut (Request $req) {
      $this->removeUserToGroup($req);
      return redirect()->back();
    }

    public function removeUserToGroup($req) {

      $group = Group::where('id',$req->group_id)->first();

     $group->users()->detach($req->user_id);
          
     //return redirect()->route('group',['id'=>$req->group_id]);

      //return redirect()->back();

  }


  public function addUserToGroup($req) {
    dd('la requete a été envoyée');
    $group = Group::where('id',$req->group_id)->first();

   $group->users()->attach($req->user_id);
        
   //return redirect()->route('group',['id'=>$req->group_id]);

   // return redirect()->back()->with('success','Vous avez été ajouté à la liste des utilisateurs');

}

public function search(Request $req) {
  $result = $req->search;
  $groups = Group::where('name','like','%'. $req->search .'%')->get(); 
  if($groups->count() > 0) {
    $content = view('groups.search',compact('groups'));
    return $content;
  } else {
    $content = '<div class="alert alert-warning" style="text-align:center; color:#000;width:50%;margin:auto;"> Aucun résultat ne correspond à votre recherche !</div>';
    return $content;
  }
  
    
  

}

    

    
      
    
    

    
}
