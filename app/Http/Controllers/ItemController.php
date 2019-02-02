<?php

namespace App\Http\Controllers;

use App\Item;
use App\Place;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd(request()->get('place'));

        $items = Item::with('place')->orderBy('id', 'desc')->get();

        $places = Place::all();

        return view('items.index', compact('items', 'places'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Item::create($request->validate([
            'body' => ['required', 'min:3'],
            'place_id' => 'required',
        ]));

        return redirect('/items');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Item $item
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Item                $item
     *
     * @return Item|null
     */
    public function update(Request $request, Item $item)
    {
        $item->toggle($request->input('completed'));

        return $item->fresh();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Item $item
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Exception
     */
    public function destroy(Item $item)
    {
        $deleted = $item->delete();

        return compact('deleted');
    }
}
