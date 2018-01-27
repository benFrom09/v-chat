<?php
namespace App\Manager;

use App\User;
use Illuminate\Http\Request;


class UserManager 
{
    protected $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    private function save(User $user,Request $req) {
        $user->name = $req->name;
        $user->email = $req->email;
        $user->save();
    }

    public function store(Request $req,$id) {
        $user = new $this->user;
        $user->password = bcrypt($req->password);
        $this->save($user,$req);
    }

    public function update(Request $req,$id) {
        $this->save($this->getUserById($id),$req);
    }

    public function destroy($id) {
        $this->getUserById($id)->delete();
    }

    public function getUserById($id) {
        return $user->findorFail($id);
    }

}