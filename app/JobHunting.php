<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobHunting extends Model
{
    public $table = 'job_hunting';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'images', 'attachments', 'name', 'job_title', 'job_description', 'skill_set', 'salary_expected', 'job_location', 
        'contact_number', 'spin',  
    ];

}
