<?php

namespace App\Http\Controllers;
use App\Models\Item;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function purchaseGet(Item $item_id) {
        return view('purchase',compact('item_id'));
    }

    public function address(Item $item_id)
    {
        return view('address', compact('item_id'));
    }

    public function addressUpdate(Request $request) {
        dd($request->id);
    }
}
