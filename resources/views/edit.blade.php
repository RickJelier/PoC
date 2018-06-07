@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Edit appointment') }}</div>
                
                <div class="card-body">
                    <form method="POST" action="/appointment/{{$appointment->id}}">

                        <div class="form-group">
                            <label for="title" class="col-sm-4 col-form-label">{{ __('Title') }}</label>

                            <div class="col-md-12">
                                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ $appointment->title }}" required autofocus>

                                @if ($errors->has('title'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="postal" class="col-sm-4 col-form-label">{{ __('Postal') }}</label>

                            <div class="col-md-12">
                                <input id="postal" type="text" class="form-control{{ $errors->has('postal') ? ' is-invalid' : '' }}" name="postal" value="{{ $appointment->postal }}" required autofocus>

                                @if ($errors->has('postal'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('postal') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="address">{{ __('Address') }}</label>


                                <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ $appointment->address }}" required autofocus>

                                @if ($errors->has('address'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-md-12">
                                <label for="city">{{ __('City') }}</label>
                                <input id="address" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ $appointment->city }}" required autofocus>

                                @if ($errors->has('city'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('city') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="start_date" class="col-sm-4 col-form-label">{{ __('Start date') }}</label>

                            <div class="col-md-12">
                                <input id="start_date" type="text" class="form-control{{ $errors->has('start_date') ? ' is-invalid' : '' }}" name="start_date" value="{{ $appointment->start_date }}" required autofocus>

                                @if ($errors->has('start_date'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('start_date') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="start_time" class="col-sm-4 col-form-label">{{ __('Start time') }}</label>

                            <div class="col-md-12">
                                <input id="start_time" type="text" class="form-control{{ $errors->has('start_date') ? ' is-invalid' : '' }}" name="start_time" value="{{ $appointment->start_time }}" autofocus>

                                @if ($errors->has('start_time'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('start_time') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="end_date" class="col-sm-4 col-form-label">{{ __('End date') }}</label>

                            <div class="col-md-12">
                                <input id="end_date" type="text" class="form-control{{ $errors->has('end_date') ? ' is-invalid' : '' }}" name="end_date" value="{{ $appointment->end_date }}" autofocus>

                                @if ($errors->has('end_date'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('end_date') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="end_time" class="col-sm-4 col-form-label">{{ __('End time') }}</label>

                            <div class="col-md-12">
                                <input id="end_time" type="text" class="form-control{{ $errors->has('end_time') ? ' is-invalid' : '' }}" name="end_time" value="{{ $appointment->end_time }}" autofocus>

                                @if ($errors->has('end_time'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('end_time') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="kilometers" class="col-sm-4 col-form-label">{{ __('Kilometers') }}</label>

                            <div class="col-md-12">
                                <input id="kilometers" type="text" class="form-control{{ $errors->has('kilometers') ? ' is-invalid' : '' }}" name="kilometers" value="{{ $appointment->kilometers }}" autofocus>

                                @if ($errors->has('kilometers'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('kilometers') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description" class="col-sm-4 col-form-label">{{ __('Description') }}</label>

                            <div class="col-md-12">
                                <input id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ $appointment->description }}" autofocus>

                                @if ($errors->has('description'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Edit appointment</button>
                        </div>
                        {{ csrf_field() }}
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@stop