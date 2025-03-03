<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
            'items' => $items,
            'color' => $color = 0
        ];
        return view('index', $param);
    }
    
    public function sell() {
        return view('sell');
    }

    public function itemCreate(Request $request) {
        $filePath = "";
        if ($request->item_img !== null) {
            $file = $request->file('item_img');

            $fileName = $file->getClientOriginalName();
            $filePath = $file->storeAs('image', $fileName, 'public');
            
        }
        
        $itemData = [
            'seller_id' => Auth::id(),
            'item_img' => "storage/" . $filePath,
            'item_condition' => $request->item_condition,
            'item_name' => $request->item_name,
            'item_brand' => $request->item_brand,
            'item_description' => $request->item_description,
            'item_price' => $request->item_price
        ];
        $item = Item::create($itemData);

        $categories  = $request->category;

        foreach ($categories as $category) {
            if ($category != null) {
                $categoryData = [
                    'item_id' => $item->id,
                    'category' => $category
                ];
                Category::create($categoryData);
            }
        }

        return redirect('/sell');
    }

    // public function mylist(Request $request) {
    //     $items = Item::where('sold', null)->get();
    //     $soldItems = Item::where('sold', 1)->get();
    //     return view('index', compact('items', 'soldItems'));
    // }

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
