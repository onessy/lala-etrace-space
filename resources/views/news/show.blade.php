@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <fieldset class="border p-2" style="text-align: right">
            <legend class="w-auto"><small class="font-weight-bold">view testimony</small> </legend>
            <div class="d-flex justify-content-center">
                <div class="col-md-7 col-sm-7">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 col-sm-3">
                                    <img src="{{ url('/storage/images/', $news->cover_image) }}" class="card-img rounded-circle"
                                         style="min-width: 100px !important; max-width: 100px !important;
                                         min-height: 100px !important; max-height: 100px !important;">
                                </div>
                                <div class="col-md-8 col-sm-8">
                                    <small class="text-muted float-right">posted: {{ $news->created_at->diffForHumans() }}</small>
                                    <div class="card-title font-weight-bold text-left"> {{ $news->type }} </div>
                                    <div class="card-text text-left">
                                        <small class="font-weight-bold">{{ $news->headline }}</small>
                                    </div>
                                    <div class="card-title font-weight-bold font-italic text-left">
                                        {{ $news->title }}
                                    </div>
                                    <div class="card-text text-left">
                                        <p>
                                            {{ $news->news }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-sm-end">
                                <a class="btn btn-sm btn-info" title="edit this record" href="{{ route('news.edit', $news->id) }}"
                                style="margin-right: 5px;">@fas('edit')</a>
                                {!! Form::open(['method' => 'POST', 'action' => ['NewsController@destroy',$news->id]]) !!}
                                {!! Form::hidden('_method', 'DELETE') !!}
                                <button class="btn btn-sm btn-danger" title="delete this record" type="submit">@fas('trash-alt')
                                </button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
    </div>
@endsection
