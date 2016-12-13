<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

//include model products
use App\Model\Products;

//call Session + Input + Validator
use Session;

use Input;

use Validator;

//call DB
use DB;


//eloquent
use App\Model\Cate;
use App\Model\Product;


//validate form submit
use Illuminate\Foundation\Http\FormRequest;


class productCurd extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //process of index function

        /*get cate of product id
        // $cate = Product::find(2)->cate;*/

        //get products of cate id
        $products = Cate::find(2)->products; 
        return view('catalog/product_category', ['products' => $products]);
    }

    public function create()
    {
      return view('catalog.product',['cates' => $this->getCates()]);
    }

    public function getCates()
    {
        $cates = Cate::where('id', '>', 0)->select(array('id','title'))->get();
        //$tmp = array('' => '-- category --');
        $tmp = array();
        foreach ( $cates as $cate )
        {
            $tmp[$cate->id] = $cate->title;
        }
        return $tmp;
    }
    /**
     * Add new product from form post value.
     *
     * @param  input  $product_name, $product_price, $product_description
     * @return Response
     */
    public function saveProduct(Request $request)
    {
        $product = new Products();
        $product->product_name = $request->input('product_name');
        $product->product_price = $request->input('product_price');
        $product->product_description = $request->input('product_description');
        $product->cate_id = $request->input('cate_id');

        //upload product_image
        $file = array('product_image' => Input::file('product_image')); 
        $rules_image = array('product_image'=>'required');
        $validator = Validator::make($file, $rules_image);
        $url_file = "";
        if ($validator->fails()) {
            //error
        } else {
        if (Input::file('product_image')->isValid()) {
            $destinationPath = 'uploads';
            $extension = Input::file('product_image')->getClientOriginalExtension(); 
            $fileName = time() .'.'. $extension; 
            Input::file('product_image')->move($destinationPath, $fileName); 
            $url_file  = $destinationPath . '/' . $fileName;
            // sending back with message
        } else {
              // sending back with error message.
            }
        }
        $product->product_image = $url_file;
        //validation form
        $rules = array(
            'product_name'  => 'required',//required
            'product_price'  => 'required|numeric',// required + number only
            'cate_id' => 'required' // required
        );
        
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            $messages = $validator->messages();
            return redirect('/new-product')->withErrors($validator);
        } else {
            //save product into database
            $product->save();
            Session::flash('message', 'Product was created!');
            return redirect('/products');
        }
    }

    /**
     * Display get all products
     *
     * @return Response
     */
    public function products() 
    {
        $function = new \ReflectionClass('DB');
        $products = DB::table('products')
            ->orderBy('id', 'desc')
            ->paginate(config('products.products_per_page')); // use pagination
        $products->setPath(url('/products'));        
        return view('catalog/products', ['products' => $products]);

    }

    public function productsCate($id)
    {
      //get all products of category
        $products = Cate::find($id)->products; 
        return view('catalog/product_category', ['products' => $products]);
    }

    public function saveCategory(Request $request)
    {
        $cate = new Cate();
        $cate->title = $request->input('title');
        $rules = array(
            'title'  => 'required',//required
        );
        
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            $messages = $validator->messages();
            return redirect('/new-category')->withErrors($validator);
        } else {
            //save product into database
            $cate->save();
            Session::flash('message', 'Category was created!');
            return redirect('/categories');
        }
    }

    public function categories()
    {
        $function = new \ReflectionClass('DB');
        $cates = Cate::all();
        return view('catalog/categories', ['cates' => $cates]);
    }

    /**
     * Delete product int $id
     *
     * @return Response
     */
    public function delete($id)
    {
        Products::find($id)->delete();
        Session::flash('message', "Product id $id was deleted!");
        return redirect('/products');
    }

    public function delete_cate($id)
    {
        Cate::find($id)->delete();
        Session::flash('message', "Category id $id was deleted!");
        return redirect('/categories');
    }

    /**
     * Edit product int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $product = Products::whereId($id)->firstOrFail();        
        return view('catalog.edit', ['product' => $product]);
    }

    /**
     * Update product int $id
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $product = Products::findOrFail($id);
        $product->product_name = $request->input('product_name');
        $product->product_price = $request->input('product_price');
        $product->product_description = $request->input('product_description');

        //upload product_image
        $file = array('product_image' => Input::file('product_image')); 
        $rules = array('product_image'=>'required');
        $validator = Validator::make($file, $rules);
        $url_file = "";
        if ($validator->fails()) {
            //error
        } else {
        if (Input::file('product_image')->isValid()) {
            $destinationPath = 'uploads'; 
            $extension = Input::file('product_image')->getClientOriginalExtension();
            $fileName = time() .'.'. $extension;
            Input::file('product_image')->move($destinationPath, $fileName); 
            $url_file  = $destinationPath . '/' . $fileName;
            // sending back with message
        } else {
              // sending back with error message.
            }
        }

        //get product current before update
        $product_before = DB::table('products')->where('id', '=', $id)->get();

        //check upload new image
        if(strlen($url_file) > 0 ) {
            //upload new file
            $product->product_image = $url_file;
        } else {
            $product->product_image = $product_before[0]->product_image;
        }        

        //validation form
        $rules = array(
            'product_name'             => 'required', 
            'product_price'            => 'required|numeric',
            'product_description' => 'required'
        );
        
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            $messages = $validator->messages();
            return redirect("/edit/$id")->withErrors($validator);
        } else {
            //save product into database
            $product->save();
            Session::flash('message', 'Product was updated!');
            return redirect()->back();
        }
    }

    /**
     * show product int id
     *
     * @return Response
     */
    public function showProduct($id)
    {
        $product = Products::whereId($id)->firstOrFail();
        return view('catalog/item', ['product' => $product]);
    }

    /**
     * search function
     *
     * @return Response
     */
    public function search(Request $request)
    {
        $value = $request->input('txtkeyword');
        $products = DB::table('products')->where('product_name', 'LIKE', '%' . $value . '%')->paginate(10); //config('products.products_per_page')
        Session::flash('message', "Have " .count($products). " value with keyword '" .$value. "' ");  
        return view('catalog/products', compact('products', 'products'));
    }
}
