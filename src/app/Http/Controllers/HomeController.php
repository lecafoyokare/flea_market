<?php

namespace App\Http\Controllers;
use App\Models\Item;
use App\Models\Mylist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $items = Item::where('sold', null)->get();
        $soldItems = Item::where('sold', 1)->get();
        $color=0;
        return view('index',compact('items','soldItems','color'));
    }

    public function pageMylist()
    {
        $mylists = Mylist::where('user_id', Auth::id())->get();
        $color = 1;
        return view('index', compact('mylists', 'color'));
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

    public function mylist(Request $request) {
        // $items = Item::where('sold', null)->get();
        // $soldItems = Item::where('sold', 1)->get();
        // return view('index', compact('items', 'soldItems'));
    }

    public function your() {
        return view('test');
    }

    public function yourMethod(Request $request)
    {
        $name = $request->input('name');

        // あなたのロジックをここに追加
        $response = [
            'message' => 'Hello, ' . $name
        ];

        return response()->json($response);
    }
}
