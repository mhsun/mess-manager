<?php

namespace App\Http\Controllers;

use App\MonthlyBill;
use App\User;
use Illuminate\Http\Request;

class MonthlyBillController extends Controller
{
    public function showMonthlyBillForm() {
        $data['memberList'] = User::where('status',1)->get();
        return view('admin.monthly_bill.bill_form',$data);
    }

    public function insertMonthlyBill(Request $request) {
        $messages = [
            'user_id.required' => 'The Member field is required.'
        ];
        $request->validate([
            'month' => 'required',
            'house_rent' => 'required|integer|digits_between:1,100000',
            'utility_bill' => 'required|integer|digits_between:1,100000',
            'food_bill' => 'required|integer|digits_between:1,100000',
            'due_amount' => 'required|integer|digits_between:1,100000',
            'user_id' => 'required|integer|digits_between:1,100',
        ],$messages);

        $memberInfo = User::where('id',$request->user_id)->get();
        if (count($memberInfo) < 1) {
            return redirect()->back()->with('error','No such member found');
        }

        $hasPaid = MonthlyBill::where(['user_id' => $request->user_id, 'month' => ucfirst($request->month)])->get();
        if (count($hasPaid) > 0) {
            return redirect()->back()->with('error','Payment already done for the given month');
        }

        MonthlyBill::create($request->all());
        return redirect()->back()->with('message','Monthly Bill recorded for the given member');
    }

    public function manage() {
        $data['monthlyBillList'] = MonthlyBill::all();
        $memberInfo = [];
        foreach ($data['monthlyBillList'] as $bill) {
            $memberInfo[] = User::where('id',$bill->user_id)->get();
        }
        $data['memberInfo'] = $memberInfo;
        return view('admin.monthly_bill.bill_list',$data);
    }

    public function showEditForm($id) {
        $data['billDetails'] = MonthlyBill::where('id',$id);
        return view('admin.monthly_bill.edit_bill');
    }

    public function updateMonthlyBill(Request $request,$id) {
        $messages = [
            'user_id.required' => 'The Member field is required.'
        ];
        $request->validate([
            'month' => 'required',
            'house_rent' => 'required|integer|digits_between:1,100000',
            'utility_bill' => 'required|integer|digits_between:1,100000',
            'food_bill' => 'required|integer|digits_between:1,100000',
            'due_amount' => 'required|integer|digits_between:1,100000',
            'user_id' => 'required|integer|digits_between:1,100',
        ],$messages);

        $memberInfo = User::where('id',$request->user_id)->get();
        if (count($memberInfo) < 1) {
            return redirect()->back()->with('error','No such member found');
        }

        $hasPaid = MonthlyBill::where(['user_id' => $request->user_id, 'month' => ucfirst($request->month)])->get();
        if (count($hasPaid) > 0) {
            return redirect()->back()->with('error','Payment already done for the given month');
        }

        MonthlyBill::create($request->all());
        return redirect()->back()->with('message','Monthly Bill recorded for the given member');
    }

    public function deleteMonthlyBill($id) {

    }


}
