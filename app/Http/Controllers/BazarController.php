<?php

namespace App\Http\Controllers;

use App\Bazar;
use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Session;

//use DB;

class BazarController extends Controller
{
    public function assign() {
        $data['memberList'] = User::where('status',1)->get();
        $data['title'] = "assign";
        return view('admin.bazar.bazar_form',$data);
    }

    public function assignMember(Request $request) {
        $request->validate([
            'member_id' => 'required|integer|max:8',
            'date_from' => 'required|date|date-format:Y-m-d',
            'date_to' => 'required|date|date-format:Y-m-d'
        ]);
        $bazar = new Bazar();
        $bazar->assigned_user = $request->member_id;
        $bazar->assigned_by = \Illuminate\Support\Facades\Auth::user()->id;
        $bazar->date_from = $request->date_from;
        $bazar->date_to = $request->date_to;
        $bazar->save();
        return redirect()->back()->with('message','Member assigned successfully');
    }
}
