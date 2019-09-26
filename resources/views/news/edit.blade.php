@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <fieldset class="border p-2" style="text-align: right">
            <legend class="w-auto"><small class="font-weight-bold">Update news & updates</small> </legend>
            <div class="d-flex justify-content-center">
                <div class="col-md-6 col-sm-6">
                    <fieldset class="border p-2" style="text-align: right">
                        <legend class="w-auto"><small class="font-weight-bold">update news and updates</small> </legend>
                        {!! Form::open(['method' => 'POST', 'action' => ['NewsController@update',$news->id],
                        'enctype' => 'multipart/form-data']) !!}
                        <div class="row form-group">
                            {!! Form::label('headline',('Headline'),['class' => 'col-md-3 col-sm-3']) !!}
                            {!! Form::text('headline',$news->headline,['class' => 'form-control col-md-8 col-sm-8
                            text-capitalize']) !!}
                        </div>
                        <div class="row form-group">
                            {!! Form::label('type',('Category'),['class' => 'col-md-3 col-sm-3']) !!}
                            {!! Form::select('type',['News' => 'News', 'Updates' => 'Updates'],$news->type,
                            ['class' => 'form-control col-md-8 col-sm-8', 'placeholder' => '--select--']) !!}
                        </div>
                        <div class="row form-group">
                            {!! Form::label('news',('Information'),['class' => 'col-md-3 col-sm-3']) !!}
                            {!! Form::textarea('news',$news->news,['class' => 'form-control col-md-8 col-sm-8', 'rows' => '3']) !!}
                        </div>
                        <div class="row form-group">
                            {!! Form::label('image',('Cover image'),['class' => 'col-md-3 col-sm-3']) !!}
                            {!! Form::file('cover_image',['class' => 'form-control col-md-8 col-sm-8 text-capitalize']) !!}
                        </div>
                        <div class="row mb-0 form-group">
                            {!! Form::hidden('_method', 'PUT') !!}
                            <button type="submit" class="btn btn-sm btn-success offset-md-3">@fas('save') update</button>
                        </div>
                        {!! Form::close() !!}
                    </fieldset>
                </div>
            </div>
        </fieldset>
    </div>
@endsection
