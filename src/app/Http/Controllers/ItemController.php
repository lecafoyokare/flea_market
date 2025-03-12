<?php

namespace App\Http\Controllers;
use App\Models\Item;
use App\Models\Mylist;
use App\Models\Category;
use App\Models\Profile;
use App\Models\Comment;
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

        $commentCount = Comment::where('item_id',$item_id->id)->count();
        
        $comments = Comment::where('item_id', $item_id->id)->get();
        
        $data = [
            'color' => $color,
            'item' => $item_id,
            'categories' => $categories,
            'mylistCount' => $mylistCount,
            'commentCount' => $commentCount,
            'comments' => $comments
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

    public function comment(Request $request) {

        $porofile = Profile::where('user_id',Auth::id())->first();
        
        if ($porofile!=null) {
            $form = [
            'profile_id' => $porofile->id,
            'item_id' => $request->item_id,
            'comment' => $request->comment
            ];
            
            Comment::create($form);

            return redirect('item/' . $request->item_id);
        } else {

            $param = [
                'displayMessage' => 'プロフィールを作成してください。',
                'btnMessage' => '戻る',
                'btnPath' => '/'.'item/' . $request->item_id
            ];

            return view('message',$param);
        }

    }

}
