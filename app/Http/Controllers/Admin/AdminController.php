<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RefferBonus;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //dashboard
    public function dashboard(){
        return view('backend.home');
    }

    //refferal Amount Store
    public function refferAmountStore(Request $request){
           $reffer = RefferBonus::first();
           if (!$reffer) {
                RefferBonus::create($request->all());
                return redirect()->back()->with(['status'=> 'Successfully Added']);
           }

           return redirect()->back()->with(['status'=> 'Eror Not Inserted']);


    }

    //edit reffer amount
    public function refferAmountEdit(){
       $refferBonus = RefferBonus::firstOrFail();
       return view('backend.refferbonus-edit',compact('refferBonus'));
    }

    //update reffer amount
    public function refferAmountUpdate(Request $request){
        RefferBonus::firstOrFail()->update($request->all());
        return redirect()->route('admin.dashboard')->with(['status'=> 'Successfully Updated']);
    }

    //get all reffer Users
    public function refferUsers(){
        $users = User::where('is_admin',0)->get();
        $refferBonus = RefferBonus::where('status','active')->first();
        return view('backend.reffer-user',compact('users','refferBonus'));
    }
}
