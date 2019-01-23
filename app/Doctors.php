<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Doctors extends Model
{
    protected $table = 'doctors';
    use SoftDeletes;

    public function jsonDoctors()
    {
        return Doctors::select('name', 'birthdate', 'specialty', 'crm', 'phone1', 'phone2')->
                        get();
    }
}
