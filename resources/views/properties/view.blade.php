@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <fieldset class="border p-2" style="text-align: right;">
            <legend class="w-auto"><small class="font-weight-bold">View House</small> </legend>
            <a class="btn btn-sm btn-warning" href="{{ url('/homes/home', $home->id) }}" title="download pdf">
                @fas('file-pdf')</a>
                <div class="d-flex justify-content-center">
                    <div class="col-md-7 col-sm-7">
                        <div class="card">
                            <img src="{{ url('/storage/images', $home->cover_image) }}" alt="images"
                                 class="card-img-top img-fluid" style="max-height: 200px !important; min-height: 200px
                                 !important; min-width: 200px !important; max-width: 200px !important;">
                            <div class="card-body">
                                <div class="card-title text-left font-weight-bold">{{ $home-> name }}</div>
                                <div class="row">
                                    <div class="home col-md-4 col-sm-4 text-right font-weight-bold">
                                        House type :
                                    </div>
                                    <div class="info col-md-7 col-sm-7 text-left">
                                        {{ $home->type }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="home col-md-4 col-sm-4 text-right font-weight-bold">
                                        Location :
                                    </div>
                                    <div class="info col-md-7 col-sm-7 text-left text-capitalize">
                                        {{ $home->location }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="home col-md-4 col-sm-4 text-right font-weight-bold">
                                        Rent/Month :
                                    </div>
                                    <div class="info col-md-7 col-sm-7 text-left">
                                        {{ $home->rent }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="home col-md-4 col-sm-4 text-right font-weight-bold">
                                        Availability :
                                    </div>
                                    <div class="info col-md-7 col-sm-7 text-left">
                                        {{ $home->availability }} <a class="card-link float-right"
                                        href="{{ url('/property/status',$home->id) }}">@fas('pencil-alt') change</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="home col-md-4 col-sm-4 text-right font-weight-bold">
                                        Status :
                                    </div>
                                    <div class="info col-md-7 col-sm-7 text-left">
                                        {{ $home->status }} <a class="card-link float-right"
                                        href="{{ url('/property/status',$home->id) }}">@fas('pencil-alt') change</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="home col-md-4 col-sm-4 text-right font-weight-bold">
                                        Priority :
                                    </div>
                                    <div class="info col-md-7 col-sm-7 text-left">
                                        {{ $home->priority }} <a class="card-link float-right"
                                        href="{{ url('/property/status',$home->id) }}">@fas('pencil-alt') change</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="home col-md-4 col-sm-4 text-right font-weight-bold">
                                        Description :
                                    </div>
                                    <div class="info col-md-7 col-sm-7 text-left">
                                        <p>{{ $home->desc }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="home col-md-6 col-sm-6 offset-md-3 text-right font-weight-bold">
                                        <small class="text-muted">posted on : {{ $home->created_at->diffForHumans() }}</small> |
                                        <small class="text-muted">posted by : {{ $home->by }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </fieldset>
    </div>
    @endsection
