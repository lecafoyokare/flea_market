<?php

namespace App\Http\Controllers;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyopageController extends Controller
{
    public function profile(){
        $user=Profile::where('user_id',Auth::id())->first();
        // dd($user);
        return view('profile',compact('user'));
    }

    public function add(Request $request) {
        $filePath = "";
        if ($request->icon_img!==null){
        $file = $request->file('icon_img');

        $fileName = $file->getClientOriginalName();
        $filePath = $file->storeAs('image', $fileName, 'public');
        }
        // dd("storage/".$filePath);
        $form = [
            'user_id' => Auth::id(),
            'icon_img' => "storage/" . $filePath,
            'name' => $request->name,
            'postal_code' => $request->postal_code,
            'address' => $request->address,
            'building_name' => $request->building_name,
        ];
        Profile::create($form);
        return redirect('/mypage/profile');
    }
}
