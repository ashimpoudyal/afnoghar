<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CouponController extends Controller
{
   // Index
    public function index(){
        $coupons = Coupon::latest()->get();
        return view ('admin.coupon.index', compact('coupons'));
    }

    // Add Coupon
    public function add(){
        return view ('admin.coupon.add');
    }

    // Store Coupon
    public function store(Request $request){
        $data = $request->all();
        $validateData = $request->validate([
            'coupon_code' => 'required|max:255',
            'amount_type' => 'required',
            'amount' => 'required',
            'expiry_date' => 'required'
        ]);
        $coupon = new Coupon();
        $coupon->amount_type = $data['amount_type'];
        $coupon->coupon_code = $data['coupon_code'];
        $coupon->amount = $data['amount'];
        $coupon->expiry_date = $data['expiry_date'];
        $coupon->status = $data['status'];
        $coupon->save();
        Session::flash('success_message', 'Coupons Has Been Added Successfully');
        return redirect()->back();
    }

    // Edit Coupon
    public function edit($id){
        $coupon = Coupon::findOrFail($id);
        return view ('admin.coupon.edit', compact('coupon'));
    }

    // Update Coupon
    public function update(Request $request, $id){
        $data = $request->all();
        $validateData = $request->validate([
            'coupon_code' => 'required|max:255',
            'amount_type' => 'required',
            'amount' => 'required',
            'expiry_date' => 'required'
        ]);
        $coupon = Coupon::findOrFail($id);
        $coupon->amount_type = $data['amount_type'];
        $coupon->coupon_code = $data['coupon_code'];
        $coupon->amount = $data['amount'];
        $coupon->expiry_date = $data['expiry_date'];

        if(empty($data['status'])){
            $coupon->status = 0;
        } else {
            $coupon->status = 1;
        }

        $coupon->save();
        Session::flash('success_message', 'Coupons Has Been Updated Successfully');
        return redirect()->back();
    }

    // Delete Coupon
    public function delete($id){
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();
        Session::flash('success_message', 'Coupons Has Been Deleted Successfully');
        return redirect()->back();
    }

}