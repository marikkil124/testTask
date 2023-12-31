<?php

namespace App\Http\Controllers;
use App\Http\Requests\Product\UpdateRequest;
use App\Http\Resources\ProductResource;
use App\Jobs\AddProductJob;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\Product\StoreRequest;

use App\Models\Product;
use App\Notifications\AddProducNotification;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;
use mysql_xdevapi\Exception;
use function MongoDB\BSON\toJSON;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::Available()->get()->sort();
           $data = [
            'products'=>$products,
            'user' => Auth::user(),

        ];
       return inertia('Product/index',$data);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {

        $data = $request->validated();
         Product::create([
            'article'=>$data['article'],
            'name'=>$data['name'],
            'status'=>$data['status'],
            'DATA'=>(json_encode($data['attributes']))
        ]);



        AddProductJob::dispatchAfterResponse();


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $product = Product::where('id', $id)->get();


       return response($product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $data = $request->validated();

          Product::where('id',$id)->update([
                'article'=>$data['article'],
                'name'=>$data['name'],
                'status'=>$data['status'],
                'DATA'=>(json_encode($data['attributes']))
            ]);





    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         Product::where('id', $id)->delete();

    }
}
