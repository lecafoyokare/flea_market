<?php

namespace App\Http\Controllers;
use App\Models\Item;
use App\Models\Mylist;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function itemView(Item $item_id) {

        $categories=Category::where('item_id',$item_id->id)->get();
        
        $mylist = Mylist::where('user_id',Auth::id())
                    ->where('item_id',$item_id->id)
                        ->first();
        
        if ($mylist!=null) {
            $color = 1;
        } else {
            $color = 0;
        }

        $mylistCount = Mylist::where('item_id',$item_id->id)->count();
        
        $data = [
            'color' => $color,
            'item' => $item_id,
            'categories' => $categories,
            'mylistCount' => $mylistCount
        ];

        return view('item',$data);
    }

    public function mylist(Request $request) {
        
        $mylist = Mylist::where('user_id', Auth::id())
            ->Where('item_id', $request->item_id)
            ->first();
        
        if ($mylist==null) {
            $form = [
                'user_id' => Auth::id(),
                'item_id' => $request->item_id,
            ];
            Mylist::create($form);
        } else {
            Mylist::find($mylist->id)->delete();
        }

        return redirect('item/'.$request->item_id);
    }

}
