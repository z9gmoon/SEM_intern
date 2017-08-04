<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Software_Engineer_Management;

class Project extends Model
{
	protected $table = "Project";
    public $timestamps = false;

    protected $dateFormat = 'U';
}