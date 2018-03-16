<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Session;

class MemberController extends Controller
{
    public function add() {
        return view('admin.user.user_form');
    }

    public function addMember(Request $request) {
        $request->validate([
            'name' => 'required|max:40',
            'email' => 'required|max:100|email|unique:users',
            'phone' => 'required|max:20|unique:users',
            'join_date' => 'required|date|date-format:Y-m-d',
            'user_type' => 'required|'
        ]);

        $member = new User();
        $member->name = $request->name;
        $member->email = $request->email;
        $member->password = bcrypt("123456");
        $member->phone = $request->phone;
        $member->join_date = $request->join_date;
        $member->leave_date = "2000-01-01";
        $member->status = 1;
        $member->user_type = $request->user_type;
        $member->save();
        return redirect('/member/add')->with('message','Member added successfully');
    }
}
