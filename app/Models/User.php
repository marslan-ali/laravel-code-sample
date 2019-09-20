<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 *  Class User
 *  =====================================
 *  @package    App\Models
 *  @author     Arslan Ali
 *  @email      marslan.ali@gmail.com
 *  =====================================
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    /**
     * @return bool $invited
     */
    protected function invite(){

        $invited = 0 ;

        // $invited = .. code of inviting another user to attend the event

        return $invited;
    }

    public function image()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    /**
     * The roles that belong to the user.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }


    /**
     * Get all of the orderItems for the user.
     */
    public function orderItems()
    {
        return $this->hasManyThrough(
            OrderItems::class,
            Order::class,
            'customer_id', // Foreign key on orders table...
            'order_id', // Foreign key on order_items table...
            'id', // Local key on countries table...
            'id' // Local key on users table...
        );
    }

}
