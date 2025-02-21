<?php

namespace App\Http\Controllers;
use App\Models\Item;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('index',compact('items'));
    }

    public function search(Request $request)
    {
        $items = Item::where('item_name', 'LIKE',"%{$request->word}%")->get();
        $param = [
            'word' => $request->word,
            'items' => $items
        ];
        return view('index', $param);
    }
}
