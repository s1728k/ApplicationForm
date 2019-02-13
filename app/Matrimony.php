<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matrimony extends Model
{
    public $table = 'matrimony';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'images', 'attachments', 'name', 'sex', 'date_time_of_birth', 'place_of_birth', 'religion', 'caste', 'gothram', 
        'education', 'profession', 'income', 'property', 'likes_and_dislikes', 'residential_address', 'permanent_address', 
        'contact_number', 'spin',
    ];

}
