<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concert extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['sitting', 'standing', 'name', 'date'];
    public function spotssit()
    {
        return $this->hasMany('\App\Models\Ticket')->where('type', 'sitting');
    }
    public function spotsstand()
    {
        return $this->hasMany('\App\Models\Ticket')->where('type', 'standing');
    }
    public function freesit(){
        return ($this->sitting-count($this->spotssit));
    }
    public function freestand(){
        return ($this->standing-count($this->spotsstand));

    }
}
