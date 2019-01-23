<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Patients extends Model
{
    protected $table = 'patients';
    use SoftDeletes;
}
