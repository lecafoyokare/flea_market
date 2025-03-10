<?php

namespace App\Http\Controllers;
use App\Models\Item;
use App\Models\Profile;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function purchaseGet(Item $item_id) {

        $profile = Profile::where('user_id',Auth::id())->first();
        
        $param = [
          'item' => $item_id,
          'profile' => $profile  
        ];
        
        return view('purchase',$param);
    }

    public function address(Item $item_id)
    {
        return view('address', compact('item_id'));
    }

    public function addressUpdate(Request $request) {
        dd($request->id);
    }
}
