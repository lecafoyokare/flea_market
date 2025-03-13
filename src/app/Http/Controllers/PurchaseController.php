<?php

namespace App\Http\Controllers;
use App\Models\Item;
use App\Models\Profile;
use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Http\Requests\PurchaseRequest;
use App\Http\Requests\AddressRequest;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function purchaseGet(Item $item_id) {

        $profile = Profile::where('user_id',Auth::id())->first();
        
        $param = [
          'item' => $item_id,
          'postal_code' => $profile->postal_code,
          'address' => $profile->address,
          'building_name' => $profile->building_name
        ];
        
        return view('purchase',$param);
    }

    public function purchasePost(PurchaseRequest $request) {

        $item = Item::find($request->item_id);

        if ($item->sold == null) {
            
            $sold = [
            'sold' => 1
            ];

            Item::find($request->item_id)->update($sold);
            
            $form = [
                'item_id' => $request->item_id,
                'user_id' => Auth::id(),
                'payment' => $request->payment,
                'postal_code' => $request->postal_code,
                'address' => $request->address,
                'building_name' => $request->building_name,
            ];

            Purchase::create($form);

            $displayMessaeg = '購入完了しました。';

        } else {
            $displayMessaeg = '売り切れました。';
        }

        $param = [
            'displayMessage' => $displayMessaeg,
            'btnMessage' => 'ホームに戻る',
            'btnPath' => '/'
        ];

        return view('message', $param);

    }

    public function address(Item $item_id)
    {
        return view('address', compact('item_id'));
    }

    public function addressUpdate(AddressRequest $request) {

        $item = Item::find($request->id);

        $param = [
            'item' => $item,
            'postal_code' => $request->postal_code,
            'address' => $request->address,
            'building_name' => $request->building_name
        ];

        return view('purchase', $param);

    }
}
