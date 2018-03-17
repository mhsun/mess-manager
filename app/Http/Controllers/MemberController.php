<?php

namespace App\Http\Controllers;

use App\MonthlyBill;
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

    public function manageMember() {
        $data['member_list'] = User::all();
        $data['title'] = "manage";
        return view('admin.user.user_list',$data);
    }

    public function showEditForm($id) {
        $data['memberInfo'] = User::find($id);
        $data['title'] = "edit";
        return view('admin.user.edit_form',$data);
    }

    public function updateMemberInfo(Request $request,$id) {
        $request->validate([
            'name' => 'required|max:40',
            'phone' => 'required|max:20',
            'join_date' => 'required|date|date-format:Y-m-d',
            'user_type' => 'required|integer'
        ]);
        $memberInfo = User::find($id);
        if ($memberInfo->phone == $request->phone) {
            User::where('id',$id)->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'join_date' => $request->join_date,
                'user_type' => $request->user_type
            ]);
            return redirect('/member/manage')->with('message','Member updated successfully');
        } else {
            $result = User::where('phone',$request->phone)->get();
            if (count($result) > 0) {
                return redirect('/member/edit/'.$id)->with('error','Phone number already taken');
            } else {
                User::where('id',$id)->update([
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'join_date' => $request->join_date,
                    'user_type' => $request->user_type
                ]);
                return redirect('/member/manage')->with('message','Member updated successfully');
            }
        }
        //$member->save();
    }

    public function deleteMember($id) {
        User::where('id',$id)->delete();
        return redirect()->back()->with('message','Record deleted successfully');
    }

    public function showLeaveForm($id) {
        $data['memberInfo'] = User::find($id);
        $data['title'] = 'leave';
        return view('admin.user.leave_form',$data);
    }

    public function leaveMember(Request $request, $id) {
        $request->validate([
            'leave_date' => "required|date|date-format:Y-m-d"
        ]);
        $memberInfo = User::find($id);
        if ($request->leave_date < $memberInfo->join_date) {
            return redirect()->back()->with('error','Leave date can\'t be less than join date');
        }

        User::where('id',$id)->update([
            'leave_date' => $request->leave_date,
            'status' => 0
        ]);
        return redirect('/member/manage')->with('message','Member leave made successfully');
    }

    public function showMemberBill($id) {
        $data['memberBill'] = MonthlyBill::where('user_id',$id)->get();
        return view('admin.user.bill_list',$data);
    }


}
