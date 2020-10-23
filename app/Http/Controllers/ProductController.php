<?php

namespace App\Http\Controllers;
use Session;
use App\Cart;
use App\Order;
use App\Product;
use Stripe\Charge;
use Stripe\Stripe;
use Illuminate\Http\Request;
use Auth;



class ProductController extends Controller
{   
    public function index()
    {
        $products['products']=Product::Orderby('id','asc')->paginate(3);
        return view('items/list_item',$products);
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
        if(request()->has('image')){
            $imageuploaded = request()->file('image');

            $imagename=time() . '.' . $imageuploaded->getClientOriginalExtension();
            $imagepath = public_path('/images/');
            $imageuploaded->move($imagepath, $imagename);
            $product= Product::create([
                'imagePath'=>'/images/' . $imagename,
                'title'=>$request->title,
                'description'=>$request->description,
                'price'=>$request->price,

               
            ]);
        }
        return redirect()->route('items.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        $product = array(
            'imagePath'=>$request->imagePath,
            'title'=>$request->title,
            'description'=>$request->description,
            'price'=>$request->price,

        );
     // echo"<pre>"; print_r($category); die;
        Product::findOrfail($request->product_id)->update($product);
        return redirect()->route('items.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $product)
    {
        $delete = $product->all();
        $deleteitem= Product::findOrfail($product->product_id);
        $deleteitem->delete();
        return redirect()->route('items.index');
    }
    
    public function getIndex(){
        $products = Product::all();
        return view('welcome', ['products' => $products]);
    }

    public function getAddToCart(Request $request, $id){
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        return redirect()->route('welcome');
    }
    public function getReduceByOne($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);

        if(count($cart->articles) > 0 ){
            Session::put('cart', $cart);
        }else{
            Session::forget('cart');
        }
        return redirect()->route('product.shoppingCart');
    }
    public function getRemoveArticle($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeArticle($id);
        if(count($cart->articles) > 0 ){
            Session::put('cart', $cart);
        }else{
            Session::forget('cart');
        }
        
        return redirect()->route('product.shoppingCart');
    }

    public function getCart(){
        if(!Session::has('cart')){
            return view('pages.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('pages.shopping-cart' ,['products'=>$cart->articles, 'totalPrice'=>$cart->totalPrice]);
    }

    public function getCheckout(){
        if(!Session::has('cart')){
            return view('pages.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('pages.checkout', ['total'=>$total]);
    }
    public function postCheckout(Request $request){
        if(!Session::has('cart')){
            return redirect()->route('pages.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        //Stripe::setApiKey('sk_test_51Hf8Z1CBbAN4AahFpk3eRcY0ipj9gxwUXVtNh4S0H3sTC4FyRDKFgmtv5KsQrFKYvoh2tXyncLgJ9xhgL4Na9pH8002oAHmibf');
        try{
            
           /*$charge = Charge::create(array(
            'amount' => $cart->totalPrice,
            'currency' => 'usd',
            'source' => $request->input('stripeToken'), // obtained with Stripe.js
            'description' => 'My First Test Charge '
            ));*/
           Stripe::setApiKey ('sk_test_51Hf8Z1CBbAN4AahFpk3eRcY0ipj9gxwUXVtNh4S0H3sTC4FyRDKFgmtv5KsQrFKYvoh2tXyncLgJ9xhgL4Na9pH8002oAHmibf');
              $charge= Charge::create([
                'amount' => $cart->totalPrice,
                'currency' => 'usd',
                'source' => 'tok_visa', // obtained with Stripe.js
                'description' => 'My First Test Charge '
              ]);
            $order = new Order();
            $order->cart = serialize($cart);
            $order->address = $request->input('address');
            $order->name = $request->input('name');
            $order->payment_id = $charge->id;

            Auth::user()->orders()->save($order);

       }catch(\Exception $e){
            return redirect()->route('checkout')->with('error', $e->getMessage());
       }


       Session::forget('cart');
       return redirect()->route('product.shoppingCart')->with('success', 'Successfully purposed poducts!');
    }

    public function getProfile(){
        $orders = Auth::user()->orders;
        $orders->transform(function($order, $key){
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view('pages.my-orders', ['orders' =>$orders]);
    }
} 
