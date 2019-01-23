<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use Alert;

class UsersController extends Controller
{
    public function __construct(Request $request, Users $users)
    {
        $this->data['title'] = 'Users';
        $this->data['active'] = 'users';
        $this->request = $request;
        $this->users = $users;
        $this->middleware('auth');
    }

    public function index()
    {
        $this->data['data'] = $this->users->get();
        return view('users/index', $this->data);
    }

    public function formAdd()
    {
        $this->data['type'] = 'new';
        return view('users/add', $this->data);
    }

    public function insert()
    {
        $this->users->name = $this->request->input('name');
        $this->users->email = $this->request->input('email');
        $this->users->password = bcrypt($this->request->input('password'));

        $insert = $this->users->save();

        if($insert){
            Alert::success('Congratulations!', 'Data successfully inserted.');
            return redirect('users');
        }
        else{
            Alert::error('Ops!', 'Data error inserted.');
            return redirect('userInsert/'.$id);
        }
        return redirect('users');
    }

    public function formEdit($id)
    {
        $this->data['type'] = 'edit';
        $this->data['data'] = $this->users->find($id);
        return view('users/add', $this->data);
    }

    public function update($id)
    {
        $this->users['name'] = $this->request->input('name');
        $this->users['email'] = $this->request->input('email');

        if($this->request->input('password'))
            $this->users['password'] = bcrypt($this->request->input('password'));

        $update = $this->users->where('id', $id)->update($this->users);

        if($update){
            Alert::success('Congratulations!', 'Data successfully updated.');
            return redirect('users');
        }
        else{
            Alert::error('Ops!', 'Data error updated.');
            return redirect('userFormEdit/'.$id);
        }
    }

    public function delete($id)
    {
        $users = $this->users->find($id);
        if(!empty($users)){
            $delete = $users->delete();
            Alert::success('Congratulations!', 'Data successfully deleted.');
        }else
            Alert::error('Ops!', 'Data error deleted.');
        
        return redirect('users');
    }
}
