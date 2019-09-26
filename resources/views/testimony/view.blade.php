@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <fieldset class="border p-2" style="text-align: right">
            <legend class="w-auto"><small class="font-weight-bold">view testimony</small> </legend>
            <div class="d-flex justify-content-center">
                <div class="col-md-7 col-sm-7">
                    <div class="card">
                        <div class="card-body" style="margin-bottom: -20px !important;">
                            <div class="row">
                                <div class="col-md-3 col-sm-3">
                                    <img src="{{ url('/storage/images/', $comment->cover_image) }}" class="card-img rounded-circle"
                                         style="min-width: 100px !important; max-width: 100px !important;
                                         min-height: 100px !important; max-height: 100px !important;">
                                </div>
                                <div class="col-md-8 col-sm-8">
                                    <small class="text-muted float-right">posted: {{ $comment->created_at->diffForHumans() }}</small>
                                    <div class="card-title font-weight-bold text-left"> {{ $comment->name }} </div>
                                    <div class="card-text text-left">
                                        <small class="font-weight-bold">{{ $comment->email }}</small>
                                    </div>
                                    <p class="lead text-left">
                                        says
                                    </p>
                                    <div class="card-title font-weight-bold font-italic text-left">
                                        {{ $comment->title }}
                                    </div>
                                    <div class="card-text text-left">
                                        <p>
                                            {{ $comment->body }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
    </div>
    @endsection
