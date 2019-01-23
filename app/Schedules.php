<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Schedules extends Model
{
    protected $table = 'schedules';
    use SoftDeletes;

    public function scheduleDoctor($id)
    {
        return Schedules::where('schedules.idDoctors', $id)->
                        where('doctors.deleted_at', NULL)->
                        where('patients.deleted_at', NULL)->
                        join('doctors', 'schedules.idDoctors', '=', 'doctors.id')->
                        join('patients', 'schedules.idPatients', '=', 'patients.id')->
                        select('schedules.id', 'schedules.idPatients', 'schedules.idDoctors', 
                            'schedules.date', 'schedules.hour', 'schedules.created_at', 
                            'patients.name')->
                        get();
    }

    public function schedulingAvailability($data)
    {
        if($this->schedulingAvailabilityDay($data)->count() < 1){
            return Schedules::where('idDoctors', $data->idDoctors)-> 
                            where('deleted_at', NULL)->
                            where('date', $data->date)->
                            where('hour', $data->hour)->
                            limit(1)->
                            get();
        }else{
            return [false];
        }
    }

    public function schedulingAvailabilityDay($data)
    {
        return Schedules::where('idPatients', $data->idPatients)-> 
                        where('deleted_at', NULL)->
                        where('date', $data->date)->
                        limit(1)->
                        get();
    }

    public function schedulingAvailabilityUpdate($data)
    {
        return Schedules::where('idDoctors', $data->idDoctors)-> 
                        where('date', $data->date)->
                        where('hour', $data->hour)->
                        limit(1)->
                        get();
    }

    public function scheduleDay()
    {
        return Schedules::whereDate('date', '=', date('Y-m-d'))->
                        where('doctors.deleted_at', NULL)->
                        where('patients.deleted_at', NULL)->
                        join('doctors', 'schedules.idDoctors', '=', 'doctors.id')->
                        join('patients', 'schedules.idPatients', '=', 'patients.id')->
                        select('schedules.id', 'doctors.name AS nameDoctor', 'patients.name AS namePatient', 
                            'schedules.idDoctors', 'schedules.date', 'schedules.hour', 
                            'schedules.created_at')->
                        get();
    }
}
