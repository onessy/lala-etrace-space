@extends('layouts.app')
@section('content')
    <div class="container-fluid">
    <fieldset class="border p-2" style="text-align: right;">
        <legend class="w-auto"><h5 class="font-weight-bold">Houses</h5> </legend>
        <div class="d-flex justify-content-sm-end">
            <a class="btn btn-sm btn-info" href="{{ route('homes.create') }}">@fas('plus') house</a>
        </div>
        <div class="card-deck">
        @if(count($home) > 0)
            @foreach($home as $home)
                <div class="col-3 my-lg-1">
                    <div class="card h-100">
                            <div class="card-header"><small class="font-weight-bold">{{ $home->type }} @ Ksh.
                                    {{ $home->rent }}</small></div>
                        <img src="{{url('/storage/images/', $home->cover_image)}}" class="card-img-top" alt="..."
                                 style="min-height: 200px !important;max-height: 200px !important; width: 100% !important;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $home->name }}</h5>
                                <p class="card-text">{{ $home->availability }} | {{ $home->location }} |
                                    {{ $home->status }} | {{ $home->priority}}</p>
                                <p class="card-text"><small class="text-muted">
                                        posted: {{ $home->created_at->diffForHumans() }}  posted by {{ $home->by }}
                                    </small></p>
                                <div class="row d-flex justify-content-sm-end" style="margin-bottom: -15px !important;">
                                    <a class="btn btn-sm btn-warning" href="{{ route('homes.show',$home->id) }}" title="view details"
                                       style="margin-right: 5px !important;">@fas('eye')</a>
                                    <a class="btn btn-sm btn-info" href="{{ route('homes.edit',$home->id) }}"
                                       title="make changes to this house record" style="margin-right: 5px !important;">@fas('edit')</a>
                                    {!! Form::open(['action' => ['PropertyController@destroy',$home->id], 'method' => 'POST']) !!}
                                    {!! Form::hidden('_method', 'DELETE') !!}
                                    <button type="submit" class="btn btn-sm btn-danger" href="#" title="delete this house record">
                                        @fas('trash-alt')</button>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                </div>
            @endforeach
        @endif
        </div>
    </fieldset>
    </div>
    @endsection
