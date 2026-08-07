<?php

namespace App\Http\Controllers;

use App\Models\User;

class MemberController extends Controller
{
    public function index()
    {
        $members = User::all();

        return view('members.index', compact('members'));
    }
}
