@extends('layouts.app')
@section('content')
    <div class="container-fluid">
    <fieldset class="border p-2" style="text-align: right;">
        <legend class="w-auto"><small class="font-weight-bold">Testimonials</small></legend>
                    <a class="btn btn-sm btn-info float-right" href="{{ route('testimony.create') }}" style="margin-bottom: 5px !important;">
                        @fas('plus') add</a>
        <div class="table table-responsive-sm">
            @if(count($test) > 0)
                <div class="table table-responsive-sm">
                    <table class="table table-borderless table-striped table-sm">
                        <thead>
                        <th>Cover Image</th>
                        <th>Name</th>
                        <th>email</th>
                        <th>Title</th>
                        <th>Posted on</th>
                        <th colspan="3">Action</th>
                        </thead>
                        <tbody>
                @foreach($test->take(6) as $data)
                    <tr>
                        <td >
                            <img class="rounded-circle" src="{{ url('/storage/images/', $data->cover_image) }}" style="height: 50px !important; width: 50px !important;">
                        </td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->title }}</td>
                        <td>{{ $data->created_at }}</td>
                        <td>
                            <a class="btn btn-sm btn-warning" href="{{ route('testimony.show', $data->id) }}"
                               title="read this testimony">@fas('eye')</a>
                        </td>
                        <td>
                            <a class="btn btn-sm btn-info" href="{{ route('testimony.edit', $data->id) }}"
                            title="make changes to this testimony">@fas('edit')</a>
                        </td>
                        <td>
                            {!! Form::open(['method' => 'POST', 'action' => ['TestimonyController@destroy',$data->id]]) !!}
                            {!! Form::hidden('_method', 'DELETE') !!}
                            <button type="submit" class="btn btn-sm btn-danger" href="#"
                            title="delete this testimony">@fas('trash-alt')</button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <p class="text-muted text-center">no testimonials available yet</p>
                @endif
        </div>
    </fieldset>
    </div>
    @endsection
