@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <fieldset class="border p-2" style="text-align: right">
            <legend class="w-auto"><small class="font-weight-bold">Change house status</small> </legend>
            <div class="d-flex justify-content-center">
                <div class="col-md-5 col-sm-5">
                    <fieldset class="border p-2" style="text-align: right">
                        <legend class="w-auto"><h5>{{ $home->name }}</h5></legend>
                        {!! Form::open(['action' => ['PropertyController@propertyStatus',$home->id], 'method' => 'POST']) !!}
                        <div class="row form-group">
                            {!! Form::label('availability', ('Availability'), ['class' => 'col-md-4 col-sm-4']) !!}
                            {!! Form::select('availability', ['Bookable' => 'Bookable', 'Un-bookable' => 'Un-bookable'],
                            $home->availability, ['class' => 'form-control col-md-7 col-sm-7']) !!}
                        </div>
                        <div class="row form-group">
                            {!! Form::label('priority', ('Priority'), ['class' => 'col-md-4 col-sm-4']) !!}
                            {!! Form::select('priority', ['Priority 1' => 'Priority 1', 'Priority 2' => 'Priority 2',
                            'Priority 3' => 'Priority 3', 'Priority 4' => 'Priority 4', 'Priority 5' => 'Priority 5',
                            'Priority 6' => 'Priority 6', 'Priority 7' => 'Priority 7', 'Priority 8' => 'Priority 8', '
                            Priority 9' => 'Priority 9', 'Priority 10' => 'Priority 10'], $home->priority,
                            ['class' => 'form-control col-md-7 col-sm-7']) !!}
                        </div>
                        <div class="row form-group">
                            {!! Form::label('status', ('Status'), ['class' => 'col-md-4 col-sm-4']) !!}
                            {!! Form::select('status', ['Booked' => 'Booked', 'Vacant' => 'Vacant', 'Reserved' => 'Reserved',
                            'Under Repairs' => 'Under Repairs'],$home->status, ['class' => 'form-control col-md-7 col-sm-7']) !!}
                        </div>
                        <div class="form-group row mb-0">
                            <button type="submit" class="btn btn-sm btn-success offset-md-4">@fas('save') submit</button>
                        </div>
                        {!! Form::close() !!}
                    </fieldset>
                </div>
            </div>
        </fieldset>
    </div>
    @endsection
