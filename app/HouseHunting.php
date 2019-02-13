<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HouseHunting extends Model
{
    public $table = 'house_hunting';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'images', 'attachments', 'tenant_name', 'size', 'looking_for', 'no_of_people_to_stay', 'price_range', 'locality', 
        'house_description', 'contact_number', 'spin'
    ];

}
