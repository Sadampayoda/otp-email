<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class App_log extends Model
{
    use HasFactory;


    protected $guarded = ['id'];

    public function User()
    {
        return $this->belongsTo(App_log::class);
    }
}
