<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Payment;


class PaymentController extends Controller
{
    public function index()
    {
     
        $PaymentData  = Payment::orderBy('id','DESC')->get();
        return view('admin.payment.index', compact('PaymentData'));
       
    }
   
    public function delete($id){
        $PagesData= Payment::findOrFail($id)->delete();
        return redirect("admin/payment")->with('succmessage', 'Record Deleted Successfully.');   
    }
  
    public function deleteAll(Request $request){
		if($request->isMethod('Post')){
			$data = $request->all();
            Payment::whereIn('id', $data['payment_id'])->delete();
            return redirect("admin/payment")->with('succmessage', 'Selected Records Delete Successfully.');   
		}
    }
}
