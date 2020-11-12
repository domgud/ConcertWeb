<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['user_id', 'concert_id', 'type_id'];

    public function concert ()
    {
        return $this -> belongsTo('App\Models\Concert');
    }
    public function type ()
    {
        return $this -> belongsTo('App\Models\Type');
    }
}
