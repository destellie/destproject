<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
    public function index(Request $request)
    {
        $category['categories']=Category::Orderby('id','asc')->paginate(3);
        //$categories=Category::all();
        //$categories = Category::latest()->paginate(5);
        return view('categories/dashboad',$category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = array(
            'name'=>$request->name,
            'slug'=>$request->slug

        );
        Category::create($category);
        return redirect()->route('categories.index');
      
        
    }

    /**
     * Display the specified resource.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories= Category::findOrfail($id);
        return view('categories.show',compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   /* public function edit(Request $request,$id)
    {
        
        $categories= Category::findOrfail($id);
        return view('categories.edit',compact('categories'));       
    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $category = array(
            'name'=>$request->name,
            'slug'=>$request->slug

        );
     // echo"<pre>"; print_r($category); die;
        Category::findOrfail($request->category_id)->update($category);
        return redirect()->route('categories.index');
      
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $category)
    {
        $delete = $category->all();
        $deletecategory= Category::findOrfail($category->category_id);
        $deletecategory->delete();
        return redirect()->route('categories.index');

       
    }
}
