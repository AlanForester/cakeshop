<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use \Cart as Cart;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('shop')->with('products', $products);
    }


    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $interested = Product::where('slug', '!=', $slug)->get()->random(4);

        return view('product')->with(['product' => $product, 'interested' => $interested]);
    }

    public function click(Request $request)
    {
        Cart::destroy();
        Cart::add($request->id, $request->name, 1, $request->price)->associate('App\Product');
        return redirect('guestCheckout');
    }

    public function search(Request $request)
    {
//        $request->validate([
//            'query' => 'required|min:3',
//        ]);

        $query = $request->input('query');

         $products = Product::where('name', 'like', "%$query%")
                            ->orWhere('description', 'like', "%$query%")
                            ->paginate(10);

//        $products = Product::search($query)->paginate(10);

        return view('search-results')->with('products', $products);
    }

}
