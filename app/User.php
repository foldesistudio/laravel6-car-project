<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // user have role and assign them

    /**
     * A user may be assigned many roles.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();

    }

    public function get()
    {

 }

    /**
     * Assign a new role to the user.
     *
     * $user->roles()->save($role)
     *
     * @param  mixed  $role
     */
    public function assignRole($role)
    {
        if (is_string($role)) {
            $role = Role::whereName($role)->firstOrFail();
        }

        // if there is a similar record it wont fail (sync and false)
        $this->roles()->sync($role, false);
    }

    /**
     * Fetch the user's abilities.
     *
     * @return array
     */
    public function abilities()
    {
        // Eloquent reletionship
        return $this->roles
            ->map->abilities
            ->flatten()->pluck('name')->unique();
    }

    /**
     * A user may be assigned many cars.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function cars() {
        return $this->belongsToMany(Car::class)->withTimestamps();

    }

    public function cars2()
    {
        return $this->hasMany(Car2::class);
    }

    /**
     * Assign a new role to the user.
     *
     * $user->cars()->save($car)
     *
     * @param  mixed  $car
     */
    public function assignCar( $car)
    {
        if (is_string( $car)) {
            $car = Car::whereName( $car)->firstOrFail();
        }

        // if there is a similar record, it wont fail (sync and false)
        $this->cars()->sync( $car, false);
    }



    /**
     * Fetch the user's cars brand.
     *
     * @return array
     */
    public function cars_list()
    {
        // Eloquent reletionship
        return $this->cars
            ->flatten()
            ->pluck("name")
            ->unique();

    }

    /**
     * Fetch the user's all cars.
     *
     * @return array
     */
    public function cars_list_all()
    {
        // Eloquent reletionship
        return $this->cars
            ->flatten();

    }
}
