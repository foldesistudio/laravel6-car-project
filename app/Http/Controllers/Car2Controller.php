<?php

namespace App\Http\Controllers;

use App\Car;
use App\Car2;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;

class Car2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Gate::inspect('edit_forum');


        $query = Car2::query();


        if ($response->allowed()) {

            if( request()->has('user_id') && !empty(request('user_id')) ) {
                $query->where(function ($query){
                    $query->orWhere( 'user_id',request('user_id') );
                });
            }

        } else {
            $query->orWhere('user_id', \Auth::user()->id);

        }





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




        //dd($query->toSql(), $query->getBindings()); //get query's raw SQL && bindings

        //endif
        $cars = $query->paginate(6);

        //$cars = Car2::paginate(6);

        return view('cars2.index',compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::orderBy('name')->get();
        return view('cars2.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->toArray());
        //    protected $fillable = ['brand','year','km','licence_plate','status','user_id'];
        $request->validate([
            'brand' => 'required|max:255',
            'year' => 'required|integer|max:9999',
            'km' => 'required|integer',
            'licence_plate' => 'required|max:7|regex:([a-z]{3}-[0-9]{3})|unique:cars2,licence_plate',
            'status' => 'required',
            'user_id' => 'nullable|exists:users,id',
        ]);
            // ha nem admin, akkor csak sajnos magának adhatja meg a kocsi hozzárenedelését
        if (!array_key_exists('user_id', $request->toArray())) {
            $request->user_id = auth()->id(); //Auth::user->id
        }

        Car2::create([
            'brand' => $request->brand,
            'year' => $request->year,
            'km' => $request->km,
            'licence_plate' => $request->licence_plate,
            'status' => $request->status,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('cars2.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = Car2::findOrFail($id);
        return view('cars2.show',compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = Car2::findOrFail($id);
        $users = User::orderBy('name')->get();
        return view('cars2.edit',compact('car','users'));
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
        $request->validate([
            'brand' => 'required|max:255',
            'year' => 'required|integer|max:9999',
            'km' => 'required|integer',
            'licence_plate' => ['required','max:7','regex:([a-z]{3}-[0-9]{3})', Rule::unique('cars2','licence_plate')->ignore($id)],
            'status' => 'required',
            'user_id' => 'sometimes|nullable|exists:users,id',
        ]);

        if (!array_key_exists('user_id', $request->toArray())) {
            $request->user_id = auth()->id(); //Auth::user->id
        }

        $car = Car2::findOrFail($id);

        $car->update([
            'brand' => $request->brand,
            'year' => $request->year,
            'km' => $request->km,
            'licence_plate' => $request->licence_plate,
            'status' => $request->status,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('cars2.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Car2::findOrFail($id);

        $car->delete();

        return redirect()->route('cars2.index');
    }
}
