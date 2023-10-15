<?php

namespace App\Http\Controllers;
use App\Http\Resources\ProductResource;
use App\Jobs\AddProductJob;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\Product\StoreRequest;

use App\Models\Product;
use App\Notifications\AddProducNotification;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        //$products= ProductResource::collection($products)->resolve();
        return inertia('Product/index',compact('products'));

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


        $product = Product::create([
            'article'=>$data['data']['article'],
            'name'=>$data['data']['name'],
            'status'=>$data['data']['status'],
            'DATA'=>(json_encode($data['attributes']))
        ]);

       // Mail::to(config('products.email'))->send(new AddProduct());

        AddProductJob::dispatchAfterResponse();


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
