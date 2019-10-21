<?php

namespace App\Http\Controllers;

use App\Cars;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cars = Cars::all();

        return view('/create_product/index')->with('cars', $cars);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('/create_product/create_product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        $cars = new Cars();
        $file = $request->file('image');
        $name = $file->getClientOriginalName();
        
        $file->move('images',$name);
        
        $cars->user_id = $request->user_id;
        $cars->make = $request->make;
        $cars->model = $request->model;
        $cars->price = $request->price;
        $cars->engine_size = $request->engine_size;
        $cars->image = $name;
        $cars->is_active = $request->is_active;
        $cars->save();
        
        return redirect('/admin/');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cars  $cars
     * @return \Illuminate\Http\Response
     */
    public function show(Cars $cars)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cars  $cars
     * @return \Illuminate\Http\Response
     */
    public function edit(Cars $cars , $id)
    {
        //
        $car = Cars::findOrFail($id);
        return view('create_product/edit_product')->with('car',$car);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cars  $cars
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cars $cars)
    {
        //
   

    $cars = Cars::findOrFail($request['car_id']);
    $file = $request->file('image');
    $name = $file->getClientOriginalName();
    
    $file->move('images',$name);
    
    $cars->user_id = $request->user_id;
    $cars->make = $request->make;
    $cars->model = $request->model;
    $cars->price = $request->price;
    $cars->engine_size = $request->engine_size;
    $cars->image = $name;
    $cars->is_active = $request->is_active;
    $cars->save();

    return redirect('/admin/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cars  $cars
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cars $cars)
    {
        //
    }

    public function showCarToShop(){
        $cars = DB::table('cars')->where('is_active','=',1)->get();
        return view('front_page/shop')->with('cars', $cars);
       // 
    }
}
