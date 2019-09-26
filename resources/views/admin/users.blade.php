@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <fieldset style="text-align: right" class="border p-2">
            <legend class="w-auto"><h5 class="font-weight-bold">Users</h5> </legend>
            <ul class="nav nav-fill" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true" style="color: black !important;">Clients</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false" style="color: black !important;">Agents</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="container-fluid">
                        <h5 class="h5 mt-0 text-center">Registered Clients</h5>
                        <hr>
                        <div class="table table-responsive-sm">
                            @if(count($client) > 0)
                                    <table class="table table-striped table-sm table-borderless">
                                        <thead>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Location</th>
                                        <th>Created at</th>
                                        <th>Status</th>
                                        <th class="text-center" colspan="3">Action</th>
                                        </thead>
                                        <tbody>
                                        @foreach($client as $user)
                                            <tr>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->contact }}</td>
                                                <td>{{ $user->location }}</td>
                                                <td>{{ $user->created_at }}</td>
                                                <td>
                                                    @if($user->status == '0')
                                                        <span class="text-info">Pending</span>
                                                    @else
                                                        <span class="text-success">Approved</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a class="btn btn-sm btn-info" href="{{ route('users.show', $user
                                                    ->id) }}" title="update user status">
                                                        @fas('edit')</a>
                                                </td>
                                                <td>
                                                    {!! Form::open(['method' => 'POST', 'action' =>
                                                    ['UserController@destroy', $user->id]]) !!}
                                                    <button type="submit" class="btn btn-sm btn-danger" title="remove this user">
                                                        @fas('trash-alt')</button>
                                                    {!! Form::close() !!}
                                                </td>
                                                <td>
                                                    <a class="btn btn-sm btn-warning" href="{{ url('users/user', $user
                                                    ->id) }}" title="update user status">
                                                        @fas('file-pdf')</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                            @else
                                <p class="text-muted text-center">there are no registered clients at the moment</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="container-fluid">
                        <h5 class="h5 mt-0 text-center">Registered Agents</h5>
                        <hr>
                        <div class="table">
                            @if(count($agent) > 0)
                                    <table class="table table-striped table-sm table-borderless">
                                        <thead>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Location</th>
                                        <th>Created at</th>
                                        <th>Status</th>
                                        <th class="text-center" colspan="3">Action</th>
                                        </thead>
                                        <tbody>
                                        @foreach($agent as $user)
                                            <tr>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->contact }}</td>
                                                <td>{{ $user->location }}</td>
                                                <td>{{ $user->created_at }}</td>
                                                <td>
                                                    @if($user->status == '0')
                                                        <span class="text-info">pending</span>
                                                        @else
                                                        <span class="text-success">Approved</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a class="btn btn-sm btn-info" href="{{ route('users.show', $user
                                                    ->id) }}" title="update user status">
                                                        @fas('edit')</a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-sm btn-danger" href="#" title="remove this user">
                                                        @fas('trash-alt')</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                            @else
                                <p class="text-muted text-center">there are no registered agents at the moment</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
    </div>
@endsection
