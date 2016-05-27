<?php

namespace App\Http\Controllers;

use App\Http\Requests;

use App\Product;

use App\Http\Controllers\Controller;
use Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProductControl extends Controller
{

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'description' => 'required|email|max:255|unique:users',
            'price' => 'required|confirmed',
            'role' => 'required',

        ]);
    }



    public function index(){
    $products = Product::all();
    return view('admin.products',['products' => $products]);
    }

    public function destroy($id){
        Product::destroy($id);

        return redirect('/admin/products')->with('message', 'Message sent!');
    }

    public function newProduct(){
        return view('admin.new');
    }

    public function add() {

        // getting all of the post data
        $file = Request::file('file');
        // setting up rules

                $destinationPath = 'img/'; // upload path
                $extension = $file->getClientOriginalExtension(); // getting image extension
                $fileName = rand(11111, 99999) . '.' . $extension; // renameing image
                $file->move($destinationPath, $fileName); // uploading file to given path


                $entry = new \App\File();
                $entry->mime = $file->getClientMimeType();
                $entry->original_filename = $file->getClientOriginalName();
                $entry->filename = $file->getFilename() . '.' . $extension;

                $entry->save();

                $product = new Product();
                $product->file_id = $entry->id;
                $product->name = Request::input('name');
                $product->description = Request::input('description');
                $product->price = Request::input('price');
                $product->file_url = 'img/'.$fileName;

                $product->save();

                // sending back with message
                return redirect('/admin/products')->with('message', 'Message sent!');

    }
}
