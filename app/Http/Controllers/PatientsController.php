<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patients;
use Alert;

class PatientsController extends Controller
{
    public function __construct(Request $request, Patients $patients)
    {
        $this->data['title'] = 'Patients';
        $this->data['active'] = 'patients';
        $this->request = $request;
        $this->patients = $patients;
        $this->middleware('auth');
    }

    public function index()
    {
        $this->data['data'] = $this->patients->get();
        return view('patients/index', $this->data);
    }

    public function formAdd()
    {
        $this->data['type'] = 'new';
        return view('patients/add', $this->data);
    }

    public function insert()
    {
        $this->patients->name = $this->request->input('name');
        $this->patients->birthdate = $this->request->input('birthdate');
        $this->patients->cpf = $this->request->input('cpf');
        $this->patients->phone1 = $this->request->input('phone1');
        $this->patients->phone2 = $this->request->input('phone2');

        $insert = $this->patients->save();

        if($insert){
            Alert::success('Congratulations!', 'Data successfully inserted.');
            return redirect('patients');
        }
        else{
            Alert::error('Ops!', 'Data error inserted.');
            return redirect('patientInsert/'.$id);
        }
        return redirect('patients');
    }

    public function formEdit($id)
    {
        $this->data['type'] = 'edit';
        $this->data['data'] = $this->patients->find($id);
        return view('patients/add', $this->data);
    }

    public function update($id)
    {
        $this->patients['name'] = $this->request->input('name');
        $this->patients['birthdate'] = $this->request->input('birthdate');
        $this->patients['cpf'] = $this->request->input('cpf');
        $this->patients['phone1'] = $this->request->input('phone1');
        $this->patients['phone2'] = $this->request->input('phone2');

        $update = $this->patients->where('id', $id)->update($this->patients);

        if($update){
            Alert::success('Congratulations!', 'Data successfully updated.');
            return redirect('patients');
        }
        else{
            Alert::error('Ops!', 'Data error updated.');
            return redirect('patientFormEdit/'.$id);
        }
    }

    public function delete($id)
    {
        $patients = $this->patients->find($id);
        if(!empty($patients)){
            $delete = $patients->delete();
            Alert::success('Congratulations!', 'Data successfully deleted.');
        }else
            Alert::error('Ops!', 'Data error deleted.');
        
        return redirect('patients');
    }
}
