@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <fieldset class="border p-2" style="text-align: right;">
            <legend class="w-auto"><small class="font-weight-bold">News & Updates</small></legend>
            <div class="d-flex justify-content-sm-end">
                <a class="btn btn-sm btn-info float-right" href="{{ route('news.create') }}" title="add news or update"
            >@fas('plus') news</a>
            </div>
            <div class="card-deck">
                <div class="card h-100">
                    @if(count($news)>0)
                        <div class="card-body">
                            @foreach($news->take(6) as $new)
                                <div class="row">
                                    <div class="col-md-7 col-sm-7">
                                        <a class="card-link" href="{{ route('news.show', $new->id) }}"
                                           title="click here to read this news"><div class="card-title font-weight-bold">{{ $new->headline }}
                                            </div></a>
                                    </div>
                                    <div class="col-md-5 col-sm-5">
                                        <small>{{ $new->created_at->diffForHumans() }}</small>
                                    </div>
                                </div>
                                <div class="card-text text-truncate">{{ $new->news }}</div>
                                <hr class="new">
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted text-center">no news yet</p>
                    @endif
                </div>
                <div class="card h-100">
                    @if(count($updates)>0)
                        <div class="card-body">
                            @foreach($updates->take(6) as $new)
                                <div class="row">
                                    <div class="col-md-7 col-sm-7">
                                        <a class="card-link" href="{{ route('news.show', $new->id) }}"
                                           title="click here to read this update"><div class="card-title font-weight-bold">
                                                {{ $new->headline }}</div></a>
                                    </div>
                                    <div class="col-md-5 col-sm-5">
                                        <small>{{ $new->created_at->diffForHumans() }}</small>
                                    </div>
                                </div>

                                <div class="card-text text-truncate">{{ $new->news }}</div>
                                <hr class="new">
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted text-center">no news yet</p>
                    @endif
                </div>
            </div>
            <div class="d-flex justify-content-sm-end">
                {{ $news->links() }}
            </div>
        </fieldset>
    </div>
    @endsection
