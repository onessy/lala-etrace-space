@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <fieldset class="border p-2" style="text-align: right">
            <legend class="w-auto"><h5 class="font-weight-bold">Update User Status</h5> </legend>
            <div class="d-flex justify-content-center">
                <div class="col-md-6 col-sm-6">
                    <fieldset class="border p-2" style="text-align: right">
                        <legend class="w-auto"><small class="font-weight-bold">update this status</small> </legend>
                        {!! Form::open(['method' => 'POST', 'action' => ['UserController@userstatus',$user->id]]) !!}
                        <div class="row form-group">
                            {!! Form::label('name', ('Name :'), ['class' => 'col-md-3 col-sm-3']) !!}
                            {!! Form::text('name', $user->name, ['class' => 'col-md-6 col-sm-6 form-control', 'readonly']) !!}
                        </div>
                        <div class="row form-group">
                            {!! Form::label('name', ('Email :'), ['class' => 'col-md-3 col-sm-3']) !!}
                            {!! Form::text('name', $user->email, ['class' => 'col-md-6 col-sm-6 form-control', 'readonly']) !!}
                        </div>
                        <div class="row form-group">
                            {!! Form::label('name', ('Phone :'), ['class' => 'col-md-3 col-sm-3']) !!}
                            {!! Form::text('name', $user->contact, ['class' => 'col-md-6 col-sm-6 form-control', 'readonly']) !!}
                        </div>
                        <div class="row form-group">
                            {!! Form::label('name', ('Status :'), ['class' => 'col-md-3 col-sm-3']) !!}
                            {!! Form::select('status', ['0'=>'Pending','1'=>'Approved'], $user->status,
                             ['class' => 'col-md-6 col-sm-6 form-control']) !!}
                        </div>
                        <div class="form-group row mb-0">
                            <button type="submit" class="btn btn-sm btn-success offset-md-3">@fas('save') status</button>
                        </div>
                        {!! Form::close() !!}
                    </fieldset>
               </div>
            </div>
        </fieldset>
    </div>
    @endsection
