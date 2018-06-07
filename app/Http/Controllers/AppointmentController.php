<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use Auth;

class AppointmentController extends Controller 
{

    public function index() {
        $user = Auth::user();
        return view('index', compact('user'));
    }

    public function add() {
        return view('add');
    }

    public function create(Request $request) {
        $appointment = new Appointment();
        $appointment->title = $request->title;
        $appointment->postal = $request->postal;
        $appointment->address = $request->address;
        $appointment->city = $request->city;
        $appointment->start_date = $request->start_date;
        $appointment->start_time = $request->start_time;
        $appointment->end_date = $request->end_date;
        $appointment->end_time = $request->end_time;
        $appointment->kilometers = $request->kilometers;
        $appointment->description = $request->description;
        $appointment->user_id = Auth::id();
        $appointment->save();

        return redirect('/');
    }

    public function edit(Appointment $appointment) {

        if (Auth::check() && Auth::user()->id == $appointment->user_id) {
            return view('edit', compact('appointment'));
        } else {
            return redirect('/');
        }
    }

    public function update(Request $request, Appointment $appointment) {
        if (null !== filter_input(INPUT_POST, 'delete')) {
            $appointment->delete();
            return redirect('/');
        } else {
            $appointment->title = $request->title;
            $appointment->postal = $request->postal;
            $appointment->address = $request->address;
            $appointment->city = $request->city;
            $appointment->start_date = $request->start_date;
            $appointment->start_time = $request->start_time;
            $appointment->end_date = $request->end_date;
            $appointment->end_time = $request->end_time;
            $appointment->kilometers = $request->kilometers;
            $appointment->description = $request->description;
            $appointment->save();
            return redirect('/');
        }
    }
}