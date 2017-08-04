<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Software_Engineer_Management;

class Technical extends Model
{
	protected $table = "Technical";
    public $timestamps = false;

    protected $dateFormat = 'U';
}