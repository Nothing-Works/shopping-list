<?php

namespace App\Http\Controllers;

use App\Item;
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
        $items = Item::orderBy('id', 'desc')->get();

        return view('items.index', compact('items'));
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
        Item::create($request->validate(['body' => ['required', 'min:3']]));

        return back();
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        return  $item->toggle($request->input('completed'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Item $item
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
    }
}
