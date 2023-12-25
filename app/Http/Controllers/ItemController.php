<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function certify(ItemRequest $request)
    {
        return redirect(route('item.show', Item::where('card_number', $request->search)->first()));
    }
}
