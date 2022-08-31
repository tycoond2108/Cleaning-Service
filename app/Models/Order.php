<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'cleaner_id',
        'service_id',
        'house_access',
        'day',
        'from',
        'to',
        'preferred_language',
        'status',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function cleaner(){
        return $this->belongsTo('App\Models\User', 'cleaner_id');
    }

    public function service(){
        return $this->belongsTo('App\Models\Service');
    }
}
