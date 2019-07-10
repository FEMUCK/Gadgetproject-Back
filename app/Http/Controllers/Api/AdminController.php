<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;
use App\Member;

class AdminController extends Controller
{
    public function Login(Request $request) {

        $validatedData = $request->validate([
            'loginEmail' => 'required|email',
            'loginPassword' => 'required',
        ]);

        if (Member::where('email',$request->get('loginEmail'))->count() == 1) {
            $thisMember = Member::where('email',$request->get('loginEmail'))->first();
            if(Hash::check($request->get('loginPassword'),$thisMember->password) & $thisMember->admin == true) {

                return response()->json([
                    'message' => 'ล๊อกอินสำเร็จ',
                    'firstname' => $thisMember->firstname,
                    'lastname' => $thisMember->lastname,
                    'email' => $thisMember->email,
                ],200);
            }
            else {
                return response()->json([
                    'status' => 401,
                    'message' => 'อีเมลล์ หรือ พาสเวิร์ด ผิด หรือ คุณไม่ได้เป็นแอดมิน'
                ],401);
            }
        }
        else {
            return response()->json([
                'status' => 401,
                'message' => 'อีเมลล์ หรือ พาสเวิร์ด ผิด หรือ คุณไม่ได้เป็นแอดมิน'
            ],401);
        }
    }
}
