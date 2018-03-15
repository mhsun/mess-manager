<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BazarController extends Controller
{
    public function add() {
        return view('admin.user.user_form');
    }

    public function addMember(Request $request) {
        $validate = $this->validate($request,[
            'name' => 'required|max:2',
            'email' => 'required|max:2'
        ]);
        return redirect('/member/add')->with('message','Done');
    }
}
