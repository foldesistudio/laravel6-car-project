<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{

    protected $guarded = [];

    public function users()
    {
        return $this->belongstoMany(User::class);
    }

    /**
     * Grant the given car  to the user.
     *
     * If we have a user and we want to sign a new car
     *
     * @param  mixed  $owner
     */
    public function carTo($owner)
    {
        if (is_string($owner)) {
            $owner = User::whereName($owner)->firstOrFail();
        }

        $this->users()->sync($owner, false);
    }

}
