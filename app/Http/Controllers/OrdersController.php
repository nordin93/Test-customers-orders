<?php

namespace App\Http\Controllers;

use App\Contract;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Tag;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countOrder = Order::all()->count();
        $orders = Order::orderBy('created_at','asc')->where('delete',0)->Paginate(10);

        return view('orders.index', compact('orders','countOrder'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        $tags = Tag::all();
        return view('orders.create' , compact('customers' , 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = Order::create($request->all()); 

        
        foreach ($request->tag_id as $tag) {
            $order->tags()->attach($tag);
        }

        $contract = Contract::create([
            'order_id' => $order->id,
            'customer_id' => $order->customer_id,
        ]);

        
        return redirect()->route('edit', $order)->withMessage('Order created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $customers = Customer::all();

        return view('orders.edit', compact('order','customers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $orders)
    {
        $orders->update($request->all());

        return redirect()->route('order')->withMessage('Order updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order) 
    {
        $order->contract()->delete();
        $order->delete();
        return redirect()->back()->withMessage('Order and contract deleted');
    }

    public function orderTrash(){

        $countOrder = Order::where('delete',1)->count();

        $orders = Order::orderBy('created_at','asc')->where('delete',1)->Paginate(10);

        return view('trash_can.order' , compact('orders' , 'countOrder'));
    }

    public function delete(Order $delete){
        $delete->elimination();
        return redirect()->back()->withMessage('Operation succesfully complete');
    }

    public function contractView(){
        $contracts = Contract::orderBy('created_at','asc')->where('delete',0)->Paginate(10);
        return view('contract.index',compact('contracts'));
    }

    public function tagView(Order $order){
        
        $tags = Order::find($order->id)->tags()->get();
         return view('tags.index',compact('tags'));
    }
}
