<?php

namespace App\Http\Controllers;

use App\Items;
use Illuminate\Validation\Validator;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages/add_item');
    }

   
    public function store()
    {

       $data = request()->validate([
         'name'       =>['required','string','max:255'],
        'slug'        =>['required','string','max:255'],
        'content'     =>['required','string','max:255'],
        'price'       =>['required','string','max:255'],
        'published'   =>['boolean']
        ]);

        auth()->user()->items()->create([
            'name'        =>$data['name'],
            'slug'        =>$data['slug'],
            'content'     =>$data['content'],
            'price'       =>$data['price'],
            'published'   =>$data['published']
            

        ]);
        return redirect()->route('/list_items',['user'=>auth()->user() ]);
      
        
    
         
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $items=Items::all();//Items c' est le nom du model
       
        return view('pages/list_items',compact('items'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        $item = Items::findOrFail($id);
        /*$this->validate([
            'name'        =>['require','string','max:255,name'.items()->id()],
            'slug'        =>['require','string','max:255'],
            'content'     =>['require','text'],
            'price'       =>['require','string','max:200'],
            'published'   =>['require','boolean'],
            'user_id'     =>['require','integer','max:11'],
            'category_id' =>['require','integer','max:11'],
            'created_at'  =>['require','string','max:20'],
            'updated_at'  =>['require','string','max:20'],
            ]);*/
            $this->validate($request,[
                'name'        =>'require',
                'slug'        =>'require',
                'content'     =>'require',
                'price'       =>'require',
                'published'   =>'require',
                'user_id'     =>'require',
                'category_id' =>'require',
                'created_at'  =>'require',
                'updated_at'  =>'required'
                ]);

           
            $input = $request->all();
            $item->fill($input)->save();
            Session::flash('flash_message', 'profile and password updated successfully');

            return redirect()->view('pages/update_items')->with('success','Data Added');
       
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)   
    {
        $item = Items::findOrFail($id);
        $item->delete();
        Session::flash('flash_message', 'item successfully deleted');

            return redirect()->route('/list_items');
       
    }
}
