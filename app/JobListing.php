<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobListing extends Model
{
    public $table = 'job_listing';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'images', 'attachments', 'company_name', 'hr_name', 'job_title', 'job_description', 'skill_set', 'salary', 
        'office_address', 'contact_number', 'spin'
	];

}
