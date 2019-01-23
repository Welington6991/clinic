<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedules;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Schedules $schedules)
    {
        $this->schedules = $schedules;
        $this->data['title'] = 'Home';
        $this->data['active'] = 'home';
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['data'] = $this->schedules->scheduleDay();
        return view('home/index', $this->data);
    }
}
