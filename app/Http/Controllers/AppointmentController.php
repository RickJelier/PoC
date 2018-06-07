<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use Auth;
use Validator;

class AppointmentController extends Controller 
{

    /**
     * Get a validator for an incoming post request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return $validator = Validator::make($data, array(
            'title' => 'required|string|max:255',
            'postal' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'start_date' => 'required|date_format:d-m-Y|max:255',
            'start_time' => 'string|max:255',
            'end_date' => 'string|date_format:d-m-Y|max:255',
            'end_time' => 'string|date_format:G:i|max:255',
            'kilometers' => 'string|max:255',
            'description' => 'string|max:255',
        ));
    }
    
    public function index() {
        $user = Auth::user();
        return view('index', compact('user'));
    }

    public function add() {
        return view('add');
    }

    public function create(Request $request) {
        $request->validate(array(
            'title' => 'required|alpha_num|max:255',
            'postal' => 'required|regex:/^\d\d\d\d\s?[A-z][A-z]$/',
            'address' => 'required|alpha_num|max:255',
            'city' => 'required|alpha|max:255',
            'start_date' => 'required|date_format:j-n-Y|max:255',
            'start_time' => 'string|date_format:G:i|max:255',
            'end_date' => 'date_format:j-n-Y|max:255',
            'end_time' => 'date_format:G:i|max:255',
            'kilometers' => 'integer|max:255',
        ));
        
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
            $request->validate(array(
                'title' => 'required|alpha_num|max:255',
                'postal' => 'required|regex:/^\d\d\d\d\s?[A-z][A-z]$/',
                'address' => 'required|alpha_num|max:255',
                'city' => 'required|alpha|max:255',
                'start_date' => 'required|date_format:j-n-Y|max:255',
                'start_time' => 'string|date_format:G:i|max:255',
                'end_date' => 'date_format:j-n-Y|max:255',
                'end_time' => 'date_format:G:i|max:255',
                'kilometers' => 'integer|max:255',
            ));
            
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