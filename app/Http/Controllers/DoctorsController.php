<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctors;
use Alert;

class DoctorsController extends Controller
{
    public function __construct(Request $request, Doctors $doctors)
    {
        $this->data['title'] = 'Doctors';
        $this->data['active'] = 'doctors';
        $this->request = $request;
        $this->doctors = $doctors;
        $this->middleware('auth');
    }

    public function index()
    {
        $this->data['data'] = $this->doctors->get();
        return view('doctors/index', $this->data);
    }

    public function formAdd()
    {
        $this->data['type'] = 'new';
        return view('doctors/add', $this->data);
    }

    public function insert()
    {
        $this->doctors->name = $this->request->input('name');
        $this->doctors->birthdate = $this->request->input('birthdate');
        $this->doctors->specialty = $this->request->input('specialty');
        $this->doctors->crm = $this->request->input('crm');
        $this->doctors->phone1 = $this->request->input('phone1');
        $this->doctors->phone2 = $this->request->input('phone2');

        $insert = $this->doctors->save();

        if($insert){
            Alert::success('Congratulations!', 'Data successfully inserted.');
            return redirect('doctors');
        }
        else{
            Alert::error('Ops!', 'Data error inserted.');
            return redirect('doctorInsert/'.$id);
        }
        return redirect('doctors');
    }

    public function formEdit($id)
    {
        $this->data['type'] = 'edit';
        $this->data['data'] = $this->doctors->find($id);
        return view('doctors/add', $this->data);
    }

    public function update($id)
    {
        $this->doctors['name'] = $this->request->input('name');
        $this->doctors['birthdate'] = $this->request->input('birthdate');
        $this->doctors['specialty'] = $this->request->input('specialty');
        $this->doctors['crm'] = $this->request->input('crm');
        $this->doctors['phone1'] = $this->request->input('phone1');
        $this->doctors['phone2'] = $this->request->input('phone2');

        $update = $this->doctors->where('id', $id)->update($this->doctors);

        if($update){
            Alert::success('Congratulations!', 'Data successfully updated.');
            return redirect('doctors');
        }
        else{
            Alert::error('Ops!', 'Data error updated.');
            return redirect('doctorFormEdit/'.$id);
        }
    }

    public function delete($id)
    {
        $doctors = $this->doctors->find($id);
        if(!empty($doctors)){
            $delete = $doctors->delete();
            Alert::success('Congratulations!', 'Data successfully deleted.');
        }else
            Alert::error('Ops!', 'Data error deleted.');
        
        return redirect('doctors');
    }

    public function jsonDoctors()
    {
        $this->doctors['doctors'] = $this->doctors->jsonDoctors();
        echo json_encode($this->doctors);
    }
}
