<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Member;

class MemberController extends Controller
{
    public function ShowMember()    {
        $member = Member::all();
        return response()->json($member);
    }

    public function InfoMember($id) {
        $member = Member::find($id);

        return response()->json($member->tier);
    }

    public function EditMember($id,Request $request) {
        $member = Member::find($id);
        $member->tier = $request->get('memberTier');
        $member->save();
    }

    public function ApproveMember($id)  {
        $member = Member::find($id);
        $member->activate = (Boolean) True;
        $member->save();

        $memberList = Member::all();
        return response()->json($memberList);
    }

    public function CancleApproveMember($id) {
        $member = Member::find($id);
        $member->activate = (Boolean) False;
        $member->save();

        $memberList = Member::all();
        return response()->json($memberList);
    }

    public function AdminMember($id)    {
        $member = Member::find($id);
        $member->admin = (Boolean) True;
        $member->save();

        $memberList = Member::all();
        return response()->json($memberList);
    }

    public function CancleAdminMember($id)  {
        $member = Member::find($id);
        $member->admin = (Boolean) False;
        $member->save();

        $memberList = Member::all();
        return response()->json($memberList);
    }

    public function BanMember($id)  {
        $member = Member::find($id);
        $member->ban = (Boolean) True;
        $member->save();

        $memberList = Member::all();
        return response()->json($memberList);
    }

    public function CancleBanMember($id) {
        $member = Member::find($id);
        $member->ban = (Boolean) False;
        $member->save();

        $memberList = Member::all();
        return response()->json($memberList);
    }
}
