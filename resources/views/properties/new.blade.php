@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <fieldset class="border p-2" style="text-align: right">
            <legend class="w-auto"><h5 class="font-weight-bold">Houses</h5></legend>
            <h5 class="h5 mt-0 text-center">New House</h5>
            <hr>
            <div class="d-flex justify-content-center">
                <div class="col-md-6 col-sm-6">
                    <fieldset class="border p-2" style="text-align: right">
                        <legend class="w-auto"><small class="font-weight-bold">Create a new house record</small> </legend>
                        {!! Form::open(['action' => 'PropertyController@store', 'method' => 'POST',
                        'enctype' => 'multipart/form-data']) !!}
                        <div class="row form-group">
                            {!! Form::label('name', ('House Name'),['class' => 'col-md-3 col-sm-3 text-right']) !!}
                            {!! Form::text('name','',['class' => 'col-md-8 col-sm-8 form-control text-capitalize',
                            'placeholder' => 'name of house (optional)']) !!}
                        </div>
                            <div class="row form-group">
                                {!! Form::label('type', ('House type'),['class' => 'col-md-3 col-sm-3 text-right']) !!}
                                {!! Form::select('type',['Servant quarter' => 'Servant quarter', 'Single' => 'Single',
                                'Bedsitter' => 'Bedsitter', 'Hostel' => 'Hostel', '1 bedroom' => '1 bedroom',
                                '2 bedroom' => '2 bedroom', 'Apartment' => 'Apartment', 'Other' => 'Other'],'',
                                ['class' => 'col-md-8 col-sm-8 form-control text-capitalize',
                                'placeholder' => 'select house type']) !!}
                            </div>
                        <div class="row form-group">
                            {!! Form::label('availability', ('Availability'),['class' => 'col-md-3 col-sm-3 text-right']) !!}
                            {!! Form::select('availability',['Bookable' => 'Bookable', 'Un-bookable' => 'Un-bookable'],'',
                            ['class' => 'col-md-8 col-sm-8 form-control text-capitalize','placeholder' => 'booking status']) !!}
                        </div>
                        <div class="row form-group">
                            {!! Form::label('location',('Location'),['class' => 'col-md-3 col-sm-3 text-right']) !!}
                            {!! Form::text('location','',['class' => 'col-md-8 col-sm-8 form-control',
                            'placeholder' => 'eg. Mombasa-Tudor']) !!}
                        </div>
                        <div class="row form-group">
                            {!! Form::label('rent', ('Monthly Rent'),['class' => 'col-md-3 col-sm-3 text-right']) !!}
                            {!! Form::text('rent','',['class' => 'col-md-8 col-sm-8 form-control',
                            'placeholder' => 'Monthly Rent']) !!}
                        </div>
                        <div class="row form-group">
                            {!! Form::label('desc', ('Description'),['class' => 'col-md-3 col-sm-3 text-right']) !!}
                            {!! Form::textarea('desc','',['class' => 'col-md-8 col-sm-8 form-control', 'rows' => '3',
                            'placeholder' => 'Description about the house for rent']) !!}
                        </div>
                        <div class="row form-group">
                            {!! Form::label('images', ('Images'),['class' => 'col-md-3 col-sm-3 text-right']) !!}
                            {!! Form::file('cover_image',['class' => 'col-md-8 col-sm-8 form-control send-btn',
                            'placeholder' => 'select']) !!}
                        </div>
                        {!! Form::hidden('status','Vacant') !!}
                        <div class="row mb-0 form-group">
                            <button type="submit" class="btn btn-sm btn-success offset-md-3" title="add this record">
                                @fas('save') submit</button>
                        </div>
                        {!! Form::close() !!}
                    </fieldset>
                </div>
            </div>
        </fieldset>
    </div>
    @endsection
