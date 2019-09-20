<?php

namespace App\Models;

use App\Observers\OrderDeleted;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;

/**
 *  Class Order
 *  =====================================
 *  @package    App\Models
 *  @author     Arslan Ali
 *  @email      marslan.ali@gmail.com
 *  =====================================
 */
class Order extends Model
{
    use SoftDeletes;

    protected $table        =   'orders';
    protected $primaryKey   =   'id';
    public    $incrementing =   true;
    protected $keyType      =   'string';

    protected $fillable     =   ['customer_id', 'store_id', 'shipped_date'];
    protected $guarded      =   ['order_status'];
    protected $dateFormat   =   'U';

    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'last_update';

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'order_status' => 'pending',
    ];

    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'deleted' => OrderDeleted::class,
    ];


    /**
     * Get the order's customer.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer(){
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }

    /**
     *  Get the Order's Items
     *
     *  @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items(){
        return $this->hasMany(OrderItems::class);
    }


    /**
     * Apply a query scope to get only those Orders which are shipped.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeShipped($query)
    {
        return $query->where('order_status', 'shipped');
    }

    /**
     * Get all the orders including soft-deleted orders
     *
     * @return Order[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Builder[]|\Illuminate\Support\Collection
     */
    public function archived()
    {
        return $this::trashed()->get();
    }


    /**
     *  Get the order's shipping date
     *
     *  @function getShippedDateAttribute
     *  @return string
     */
    public function getShippedDateAttribute(){
        return Carbon::parse($this->shipped_date)->format('m d, Y');
    }

    /**
     *  Set the order's shipping date.
     *
     *  @function setShippedDateAttribute
     *  @param $value
     */
    public function setShippedDateAttribute($value){
        $this->attributes['shipped_date'] = Carbon::parse($value)->format('Y-m-d');
    }

}
