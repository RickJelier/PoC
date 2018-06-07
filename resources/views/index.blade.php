@extends('layouts.app')

@section('content')
<div class="container">
    @if (Auth::check())
    <h2>Appointment List</h2>
    
    @if (count($user->appointments) > 0)
    <table class="table">
        <thead><tr>
                <th colspan="2">Appointments</th>  
            </tr>
        </thead>
        <tbody>
            @foreach($user->appointments as $appointment)
            <tr>
                <td>
                    {{$appointment->title}}
                </td>
                <td>
                    <form action="/appointment/{{$appointment->id}}">
                        <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                        <button type="submit" name="delete" formmethod="POST" class="btn btn-danger">Delete</button>
                        {{ csrf_field() }}
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <br><br>
    <p>No appointments</p>
    @endif
    <a href="/appointment" class="btn btn-primary">Add new appointment</a>
    @else
    <h3>You need to log in. <a href="/login">Click here to login</a></h3>
    @endif
</div>
@endsection