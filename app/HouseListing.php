<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HouseListing extends Model
{
    public $table = 'house_listing';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'images', 'attachments', 'owner_name', 'size', 'available_for', 'no_of_people_allowed', 'price', 'house_description', 
        'house_address', 'contact_number', 'spin'
    ];

}
