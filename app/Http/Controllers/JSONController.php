<?php

namespace App\Http\Controllers;

use App\Car2;
use Illuminate\Http\Request;

class JSONController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $query = Car2::query();



        if( !empty(request()->query('licence_plate')) ) {
            $query->where(function ($query){
                $query->orWhere('licence_plate','like','%'.request()->query('licence_plate').'%');
            });
        }

        if( !empty(request()->query('brand')) ) {
            $query->where(function ($query){
                $query->orWhere('brand','like','%'.request()->query('brand').'%');
            });
        }


        if( !empty(request()->query('user_id')) ) {
            $query->where(function ($query){
                $query->orWhere('user_id',request()->query('user_id'));
            });
        }
        $cars = $query->get();


        return response()->json($cars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
   //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
