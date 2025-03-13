<?php

namespace App\Http\Controllers;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use App\Models\Item;
use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;

class MyopageController extends Controller
{
    public function mypage() {
        $profile = Profile::where('user_id', Auth::id())->first();
        return view('mypage',compact('profile'));
    }

    public function profile(){
        $user=Profile::where('user_id',Auth::id())->first();
        
        return view('profile',compact('user'));
    }

    public function pageSell() {
        $items = Item::where('user_id', Auth::id())->get();
        return view('mypage', compact('items'));
    }

    public function pageBuy()
    {
        $items = Purchase::where('user_id', Auth::id())->get();
        return view('mypage', compact('items'));
    }

    public function profileCreate(ProfileRequest $request) {
        $filePath = "";
        if ($request->icon_img!==null){
        $file = $request->file('icon_img');

        $fileName = $file->getClientOriginalName();
        $filePath = $file->storeAs('image', $fileName, 'public');
        }
        
        $form = [
            'user_id' => Auth::id(),
            'icon_img' => "storage/" . $filePath,
            'name' => $request->name,
            'postal_code' => $request->postal_code,
            'address' => $request->address,
            'building_name' => $request->building_name,
        ];

        $profile = Profile::where('user_id',Auth::id())->first();
        
        if ($profile==null) {
            Profile::create($form);
        } else {
            Profile::find($profile->id)->update($form);
        }
        
        return redirect('/mypage/profile');
    }
}
