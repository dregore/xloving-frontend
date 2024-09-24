<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    // protected $primaryKey = 'unit_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'unit_id',
        'type',
        'attempts',
        'delay_min',
        'delay_max',
        'delete',
        'url',
        'minutes',
        'seconds',
        'like',
        'app_name',
        'app_bundle',
        'amount',
        'retention',
        'country',
        'fill_type',
        'open_time',
        'share',
        'deeplink_page',
    ];
}
