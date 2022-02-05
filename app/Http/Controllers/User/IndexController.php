<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Friend;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index(){
        
        return view('welcome');
    }

    public function show_profile(){
        $userNotifications = Friend::where('user_id_receiver', Auth()->id())->get();
        return view('user.profile', compact('userNotifications'));
    }
    

    public function friend_search(Request $request){
        $keyword = isset($request->keyword) && $request->keyword != '' ? $request->keyword : null;
        if($keyword != null){
            $users = User::search($keyword, null, true)->orderBy('id', 'desc')->paginate(5);
        }
        return view('user.search', compact('users'));
    }

    public function user_search(Request $request, $slug){
        $user = User::whereStatus(1)->whereUsername($slug)->first();
        return view('user.frindProfile', compact('user'));
    }
}
