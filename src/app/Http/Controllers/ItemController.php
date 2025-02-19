<?php

namespace App\Http\Controllers;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function item_view(Item $item_id) {

        $data = [
            'item' =>$item_id,  
        ];

        return view('item',$data);
    }
}
