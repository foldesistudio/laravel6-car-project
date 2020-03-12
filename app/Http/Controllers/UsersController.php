<?php

namespace App\Http\Controllers;

use App\Car2;
use App\Rules\PhoneNumber;
use App\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UsersController extends Controller
{
    use SoftDeletes;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // Render a list of a resource
        //$user = User::latest()->get();

        $users = User::paginate(6);;
        // return $profile;


        return view('user.index', compact('users'));

        // return response()->json($users->toArray());


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Új autó létrehozása és vagy user az autóhoz kötése
        $user = User::find(2);
        $car = App\Car::firstOrCreate(["name" => "Skoda"]);
        $user->assignCar($car);

    }

    /**
     * Display the specified resource.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        $response = Gate::inspect('edit_forum');


        if ($response->allowed()) {

            $cars = $user->cars2()->paginate(3);

        } else {
            $normal_user = \Auth::user()->id;
            $cars = \Auth::user()->cars2()->paginate(3);
            if ($user->id != $normal_user) {
                return abort(401);
            }

        }


//dd($cars);


        // Show a view to edit  an existing resource
        return view("user.edit", compact("user", "cars"));
    }

    /*
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // dd($request->toArray());
        request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255',],
            'phone' => ['required', "min:6", new PhoneNumber]
        ]);

        // ha nem admin, akkor  sajnos nem módosíthatja, hogy admin
        if (request("role") == 1) {

            /* $moderator = App\Role::firstOrCreate(["name" => "moderator"]);
             $editForum = App\Ability::firstOrCreate (["name" => "edit_forum"]);
             $moderator->allowTo($editForum);*/

            $moderator = "moderator";
            $user->assignRole($moderator);
        } else {

            \DB::table('role_user')->where('user_id', $user->id)->delete();


        }

        // adatbázis               honnan
        $user->name = request("name");
        $user->email = request("email");
        $user->phone = request("phone");
        $user->status = request("status");
        $user->save();

        return redirect(route("user.edit", $user->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index');
    }
}
