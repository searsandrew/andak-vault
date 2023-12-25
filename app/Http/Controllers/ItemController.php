<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function verify(ItemRequest $request)
    {
        $item = Item::where('ulid', $request->search)->orWhere('card_number', $request->search)->get();
        if($item->count() > 0)
        {
            return redirect(route('item.show', $item));
        }

        return redirect(route('welcome'))->with('error', sprintf('%s not found.', $request->search));
    }
}
