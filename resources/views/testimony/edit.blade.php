@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <fieldset class="border p-2" style="text-align: right">
            <legend class="w-auto"><small class="font-weight-bold"> Edit a testimony</small> </legend>
            <div class="d-flex justify-content-center">
                <div class="col-md-6 col-sm-6">
                    <fieldset class="border p-2" style="text-align: right">
                        <legend class="w-auto"><small>update testimony</small></legend>
                        {!! Form::open(['method' => 'POST', 'action' => ['TestimonyController@update',$comment->id],
                        'enctype' => 'multipart/form-data']) !!}
                        <div class="row form-group">
                            {!! Form::label('name', ('Name'), ['class' => 'col-md-3 col-sm-3']) !!}
                            {!! Form::text('name',$comment->name,['class' => 'col-md-8 col-sm-8 form-control']) !!}
                        </div>
                        <div class="row form-group">
                            {!! Form::label('email', ('Email'), ['class' => 'col-md-3 col-sm-3']) !!}
                            {!! Form::text('email',$comment->email,['class' => 'col-md-8 col-sm-8 form-control']) !!}
                        </div>
                        <div class="row form-group">
                            {!! Form::label('title', ('Heading'), ['class' => 'col-md-3 col-sm-3']) !!}
                            {!! Form::text('title',$comment->title,['class' => 'col-md-8 col-sm-8 form-control']) !!}
                        </div>
                        <div class="row form-group">
                            {!! Form::label('comment', ('Comments'), ['class' => 'col-md-3 col-sm-3']) !!}
                            {!! Form::textarea('comment',$comment->body,['class' => 'col-md-8 col-sm-8 form-control',
                             'rows' => '3']) !!}
                        </div>
                        <div class="row form-group">
                            {!! Form::label('image', ('User Image'), ['class' => 'col-md-3 col-sm-3']) !!}
                            {!! Form::file('cover_image',['class' => 'col-md-8 col-sm-8 form-control']) !!}
                        </div>
                        <div class="row mb-0 form-group">
                            {!! Form::hidden('_method', 'PUT') !!}
                            <button class="btn btn-sm btn-success offset-md-3" type="submit" title="add this comment">
                                @fas('save') update
                            </button>
                        </div>
                        {!! Form::close() !!}
                    </fieldset>
                </div>
            </div>
        </fieldset>
    </div>
@endsection
