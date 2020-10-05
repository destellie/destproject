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
        $items['items']=Item::Orderby('id','asc')->paginate(3);
        return view('items/list_item',$items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.add_item');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = array(
            'name'=>$request->name,
            'slug'=>$request->slug,
            'content'=>$request->content,
            'price'=>$request->price,
            'published'=>$request->published,
            'user_id'=>$request->user_id,
            'category_id'=>$request->category_id

        );
        Item::create($item);
        return redirect()->route('items.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        $item = array(
            'name'=>$request->name,
            'slug'=>$request->slug,
            'content'=>$request->content,
            'price'=>$request->price,
            'published'=>$request->published,
            'user_id'=>$request->user_id,
            'category_id'=>$request->category_id

        );
     // echo"<pre>"; print_r($category); die;
        Item::findOrfail($request->item_id)->update($item);
        return redirect()->route('items.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $item)
    {
        $delete = $item->all();
        $deleteitem= Item::findOrfail($item->item_id);
        $deleteitem->delete();
        return redirect()->route('items.index');
    }
}
