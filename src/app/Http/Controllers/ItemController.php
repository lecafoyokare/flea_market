<?php

namespace App\Http\Controllers;
use App\Models\Item;
use App\Models\Mylist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function item_view(Item $item_id) {

        $data = [
            'item' =>$item_id,  
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
