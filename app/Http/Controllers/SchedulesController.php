<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedules;
use App\Doctors;
use App\Patients;
use Alert;

class SchedulesController extends Controller
{
    public function __construct(Request $request, Schedules $schedules, Doctors $doctors, Patients $patients)
    {
        $this->data['active'] = 'schedules';
        $this->data['title'] = 'Schedules';
        $this->request = $request;
        $this->schedules = $schedules;
        $this->doctors = $doctors;
        $this->patients = $patients;
        $this->middleware('auth');
    }

    public function index()
    {
        $this->data['data'] = $this->doctors->get();
        return view('schedules/index', $this->data);
    }

    public function scheduleListing($id)
    {
        $this->data['doctor'] = $this->doctors->find($id);
        $this->data['data'] = $this->schedules->scheduleDoctor($id);
        return view('schedules/schedule', $this->data);
    }

    public function formAdd($id)
    {
        $this->data['type'] = 'new';
        $this->data['patients'] = $this->patients->get();
        $this->data['doctor'] = $this->doctors->find($id);
        return view('schedules/add', $this->data);
    }

    public function insert($id)
    {
        $this->schedules->idPatients = $this->request->input('patient');
        $this->schedules->idDoctors = $id;
        $this->schedules->date = $this->request->input('date');
        $this->schedules->hour = $this->request->input('hour');

        $availability = $this->schedules->schedulingAvailability($this->schedules);
        
        if(!count($availability)){
            $insert = $this->schedules->save();

            if($insert){
                Alert::success('Congratulations!', 'Data successfully inserted.');
                return redirect('scheduleListing/'.$id);
            }
            else{
                Alert::error('Ops!', 'Data error inserted.');
                return redirect('scheduleInsert/'.$id);
            }
        }else{
            if(!$availability[0])
                Alert::warning('Ops!', 'You already have a query marked on that date.');
            else
                Alert::warning('Ops!', 'This date is unavailable.');
            return redirect('scheduleFormAdd/'.$id);
        }
    }

    public function formEdit($id)
    {
        $this->data['type'] = 'edit';
        $this->data['data'] = $this->schedules->find($id);
        $this->data['doctor'] = $this->doctors->find($this->data['data']->idDoctors);
        $this->data['patients'] = $this->patients->get();
        $this->data['patient'] = $this->patients->find($this->data['data']->idPatients);
        return view('schedules/add', $this->data);
    }

    public function update($id, $idDoctor)
    {
        $this->dataSchedule['idPatients'] = $this->request->input('patient');
        $this->dataSchedule['idDoctors'] = $idDoctor;
        $this->dataSchedule['date'] = $this->request->input('date');
        $this->dataSchedule['hour'] = $this->request->input('hour');

        $availability = $this->schedules->schedulingAvailabilityUpdate((object) $this->dataSchedule);

        if(!$availability->count() || (isset($availability[0]->idPatients) ? $availability[0]->idPatients == intval($this->dataSchedule['idPatients']) ? true : false : false)){
            $update = $this->schedules->where('id', $id)->update($this->dataSchedule);

            if($update){
                Alert::success('Congratulations!', 'Data successfully updated.');
                return redirect('scheduleListing/'.$idDoctor);
            }
            else{
                Alert::error('Ops!', 'Data error updated.');
                return redirect('scheduleFormEdit/'.$id);
            }
        }else{
            Alert::warning('Ops!', 'This date is unavailable.');
            return redirect('scheduleFormEdit/'.$id);
        }
    }

    public function delete($id)
    {
        $schedules = $this->schedules->find($id);
        if(!empty($schedules)){
            $schedules->delete();
            Alert::success('Congratulations!', 'Data successfully deleted.');
        }else
            Alert::error('Ops!', 'Data error deleted.');
        
        return redirect('schedules');
    }
}
