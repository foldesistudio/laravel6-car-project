<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Car2
 * @package App
 *
 * @property int $id
 * @property string $brand
 * @property int $year
 * @property int $km
 * @property string $licence_plate
 * @property int $status
 * @property int $user_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 *
 */
class Car2 extends Model
{
    use SoftDeletes;

    protected $table = 'cars2';

    //protected $guarded = [];
    protected $fillable = ['brand','year','km','licence_plate','status','user_id'];

    //Eloquent relationships
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    protected function user()
    {
        // egy-több , mert Egy user-nek lehet több autója, de egy autó csak egy user-hez tartozik.
        return $this->belongsTo(User::class,'user_id');
    }
}
