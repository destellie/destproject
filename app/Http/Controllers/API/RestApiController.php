<?php

namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\API\ApiBaseController;
use App\ITEM;
use Validator;

class RestApiController extends ApiBaseController
{
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $items = Item::all();
        return $this->sendResponse($items->toArray(), 'Items retieved successfully.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $input = $request->all();
        $validator = Validator::make($input, [
            'name'=>'required',
            'slug'=>'required',
            'content'=>'required',
            'price'=>'required',
            'published'=>'required',
            'user_id'=>'required',
            'category_id'=>'required'
        ]);
        if($validator->fails()){
        return $this->sendError('Validation Error.', $validator->errors());
        }
        $item = Item::create($input);
        return $this->sendResponse($item->toArray(), 'Item created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $item = Item::find($id);
        if (is_null($item)) {
        return $this->sendError('Item not found.');
        }
        return $this->sendResponse($item->toArray(), 'item retrieved successfully.');
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
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name'=>'required',
            'slug'=>'required',
            'content'=>'required',
            'price'=>'required',
            'published'=>'required',
            'user_id'=>'required',
            'category_id'=>'required'
        ]);
        if($validator->fails()){
        return $this->sendError('Validation Error.', $validator->errors());
        }
        $item = Item::find($id);
        if (is_null($item)) {
        return $this->sendError('Item not found.');
        }
        $item->name = $input['name'];
        $item->slug= $input['slug'];
        $item->content= $input['content'];
        $item->price = $input['price'];
        $item->published = $input['published'];
        $item->user_id = $input['user_id'];
        $item->category_id = $input['category_id'];

        $item->save();
        return $this->sendResponse($item->toArray(), 'Item updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        if (is_null($item)) 
        {
        return $this->sendError('Item not found.');
        }
        Item::where('id', $item->id)->update(['is_delete'=>'0']);
        return $this->sendResponse($id, 'Tag deleted successfully.');
        

    }
}
