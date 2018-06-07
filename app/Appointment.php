<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model 
{
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    
    protected $fillable = array(
        'title',
        'postal',
        'address',
        'city',
        'start_date',
        'start_time',
        'end_date',
        'end_time',
        'kilometers',
        'description',
        'user_id',
        'updated_at',
        'created_at'
    );
}