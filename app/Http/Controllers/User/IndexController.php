<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Friend;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class IndexController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function show_profile(){
        return view('user.profile')->with('allFriends', auth()->user()->friends);
    }

    public function getAddFriend($id){
        $user = User::find($id);
        Auth::user()->addFriend($user);
        return redirect()->back();
    }
    public function getRemoveFriend($id){
        $user = User::find($id);
        Auth::user()->removeFriend($user);
        return redirect()->back();
    }
    public function getBlockFriend($id){
        $user = auth()->user()->friends->where('id', $id)->first()->id;
        Friend::where('id', $user)
        ->update([
            'blocked' => 1
        ]);
        return redirect()->back();
    }
    
    public function accepteFriendRequest(Request $request, $id){
        $friendAccept = Friend::where('user_id_sender', $id)->whereApproved(0)->whereBlocked(0)->first();
        $friendAccept->update(['approved' => 1]);
        return redirect()->back();
    }
    public function removeFriendRequest(Request $request){

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
        $showFriendRelat = Friend::whereUserIdSender(auth()->id())->whereUserIdReceiver($user->id)->whereBlocked(0)->first();
        return view('user.frindProfile', compact('user', 'showFriendRelat'));
    }

    public function store_backgroud(Request $request){
        $validator = Validator::make($request->all(), [
            'cover_image' => 'nullable|image|max:20000,mimes:jpeg,jpg,png',
            'photo_image' => 'nullable|image|max:20000,mimes:jpeg,jpg,png'
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if($image = $request->file('cover_image')){
            if(auth()->user()->cover_image != ''){
                if(File::exists('/userDashboard/assets/users/covers/' . auth()->user()->cover_image)){
                    unlink('/userDashboard/assets/users/covers/' . auth()->user()->cover_image);
                }
            }
            $filename = Str::slug(auth()->user()->username) . '.' . $image->getClientOriginalExtension();
            $path = public_path('userDashboard/assets/users/covers/'. $filename);
            Image::make($image->getRealPath())->save($path, 100);
            $data['cover_image'] = $filename;
            $update = auth()->user()->update($data);
            return redirect()->back();
        }elseif($image = $request->file('user_image')){
            if(auth()->user()->user_image != ''){
                if(File::exists('/userDashboard/assets/users/photos/' . auth()->user()->user_image)){
                    unlink('/userDashboard/assets/users/photos/' . auth()->user()->user_image);
                }
            }
            $filename = Str::slug(auth()->user()->username) . '.' . $image->getClientOriginalExtension();
            $path = public_path('userDashboard/assets/users/photos/'. $filename);
            Image::make($image->getRealPath())->save($path, 100);
            $data['user_image'] = $filename;
            $update = auth()->user()->update($data);
            return redirect()->back();
        }
    }
}
