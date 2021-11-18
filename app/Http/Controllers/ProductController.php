<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('shop', ['products' => Product::with('image')->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'heading' => 'string|required|max:100',
            'price' => 'numeric|required',
            'image' => 'required|mimes:png,jpg,jpeg,webp',
            'description' => 'string|required|max:65535',
        ]);

        if ($validator->fails()) {
            return redirect(route('shop.index'))
                ->withErrors($validator)
                ->withInput();
        } // validation is OK

        $productData = $validator->validated();
        unset($productData['image']);

        // creating product
        $product = Product::create($productData);

        $file = $request->file('image');
        //dd($file);
        //return $file;

        $ext = strtolower($file->getClientOriginalExtension());

        $fileData = [
            'product_id' => $product->id,
            'og_name' => $file->getClientOriginalName(),
            'file_name' => $this->generateRandomString(20) . '.' . $ext,
            'folder' => 'product_image/' . $this->generateRandomString() . '/',
            'extension' => $ext
        ];

        $file->storeAs($fileData['folder'], $fileData['file_name']);
        File::create($fileData);

        return redirect(route('shop.index'));
    }

    private function generateRandomString($length = 10)
    {
        $characters = '123456789abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $uniqueid = str_replace(".", "", uniqid('', true));
        return str_shuffle(strtolower($uniqueid) . $randomString);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('shop-edit', compact('product'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validator = Validator::make($request->all(), [
            'heading' => 'string|required|max:100',
            'price' => 'numeric|required',
            'description' => 'string|required|max:65535',
        ]);

        if ($validator->fails()) {
            return redirect(route('shop.index'))
                ->withErrors($validator)
                ->withInput();
        } // validation is OK

        $product->heading = $validator->validated()['heading'];
        $product->price = $validator->validated()['price'];
        $product->description = $validator->validated()['description'];

        $product->save();
        return redirect(route('shop.edit', $product->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //$product->delete();
        $product = $product->load('image');
        $file = $product->image;
        // delete file
        unlink(Storage::path($file->folder . $file->file_name));
        // remove dir
        rmdir(Storage::path($file->folder));

        //delete image from db
        $file->delete();

        //delete product from db
        $product->delete();

        return redirect(route('shop.index'));
    }
}
