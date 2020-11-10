<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['user_id', 'concert_id', 'type'];

    public function concert ()
    {
        return $this -> belongsTo('App\Models\Concert');
    }
}
