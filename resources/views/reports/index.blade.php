@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <fieldset class="border p-2" style="text-align: right">
            <legend class="w-auto"><small>Reports</small></legend>
            <div class="d-flex justify-content-center">
                <div class="row">
                <div class="col-md-4 col-sm-4 my-2">
                    <fieldset class="border p-2" style="text-align: right">
                        <legend class="w-auto"><h5>Users Reports</h5></legend>
                        <div class="container">
                        <div class="table table-responsive">
                            <table class="table table-sm table-borderless table-striped">
                                <thead>
                                    <th class="text-left">Report</th>
                                    <th class="text-left">Download</th>
                                    <th class="text-left">View</th>
                                </thead>
                                <tbody>
                                <tr class="text-left">
                                    <td>All users</td>
                                    <td>
                                        <a class="btn btn-sm btn-info" title="download this report"
                                           href="{{ url('user/users') }}" >@fas('download')</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-warning" title="view this report"
                                           href="#" >@fas('eye')</a>
                                    </td>
                                </tr>
                                <tr class="text-left">
                                    <td>Approved users</td>
                                    <td>
                                        <a class="btn btn-sm btn-info" title="download this report"
                                           href="{{ url('/user/approved') }}">@fas('download')</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-warning" title="view this report"
                                           href="#" >@fas('eye')</a>
                                    </td>
                                </tr>
                                <tr class="text-left">
                                    <td>Pending approval</td>
                                    <td>
                                        <a class="btn btn-sm btn-info" title="download this report"
                                           href="{{ url('/user/pending') }}">@fas('download')</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-warning" title="view this report"
                                           href="#">@fas('eye')</a>
                                    </td>
                                </tr>

                                <tr class="text-left">
                                    <td>Custom report</td>
                                    <td>
                                        <input type="text" class="form-control-sm col-md-10 col-sm-10">
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-warning" title="view this report" href="#" >
                                            @fas('eye')</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </fieldset>
                </div>
                <div class="col-md-4 col-sm-4 my-2">
                    <fieldset class="border p-2" style="text-align: right">
                        <legend class="w-auto"><h5>Property reports</h5></legend>
                        <div class="container">
                        <div class="table table-responsive">
                            <table class="table table-sm table-borderless table-striped">
                                <thead>
                                    <th class="text-left">Report</th>
                                    <th class="text-left">Download</th>
                                    <th class="text-left">View</th>
                                </thead>
                                <tbody>
                                <tr class="text-left">
                                    <td>All properties</td>
                                    <td>
                                        <a class="btn btn-sm btn-info" title="download this report"
                                           href="{{ url('/home/houses') }}">@fas('download')</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-warning" title="view this report"
                                           href="#">@fas('eye')</a>
                                    </td>
                                </tr>
                                <tr class="text-left">
                                    <td>Vacant</td>
                                    <td>
                                        <a class="btn btn-sm btn-info" title="download this report"
                                           href="{{ url('/home/vacant') }}">@fas('download')</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-warning" title="view this report"
                                           href="#">@fas('eye')</a>
                                    </td>
                                </tr>
                                <tr class="text-left">
                                    <td>Booked</td>
                                    <td>
                                        <a class="btn btn-sm btn-info" title="download this report"
                                           href="{{ url('/home/booked') }}">@fas('download')</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-warning" title="view this report"
                                           href="#">@fas('eye')</a>
                                    </td>
                                </tr>
                                <tr class="text-left">
                                    <td>Reserved</td>
                                    <td>
                                        <a class="btn btn-sm btn-info" title="download this report"
                                           href="{{ url('/home/reserved') }}">@fas('download')</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-warning" title="view this report"
                                           href="#">@fas('eye')</a>
                                    </td>
                                </tr>
                                <tr class="text-left">
                                    <td>Under Repairs</td>
                                    <td>
                                        <a class="btn btn-sm btn-info" title="download this report"
                                           href="{{ url('/home/repairs') }}">@fas('download')</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-warning" title="view this report"
                                           href="#">@fas('eye')</a>
                                    </td>
                                </tr>
                                <tr class="text-left">
                                    <td>Bookable</td>
                                    <td>
                                        <a class="btn btn-sm btn-info" title="download this report"
                                           href="{{{ url('/home/bookable') }}}">@fas('download')</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-warning" title="view this report"
                                           href="#">@fas('eye')</a>
                                    </td>
                                </tr>
                                <tr class="text-left">
                                    <td>Un-bookable</td>
                                    <td>
                                        <a class="btn btn-sm btn-info" title="download this report"
                                           href="{{ url('/home/unbookable') }}">@fas('download')</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-warning" title="view this report"
                                           href="#">@fas('eye')</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </fieldset>
                </div>
                <div class="col-md-4 col-sm-4 my-2">
                    <fieldset class="border p-2" style="text-align: right">
                        <legend class="w-auto"><h5>Transaction reports</h5></legend>
                        <div class="container">
                        <div class="table table-responsive">
                            <table class="table table-sm table-borderless table-striped">
                                <thead>
                                    <th class="text-left">Report</th>
                                    <th class="text-left">Download</th>
                                    <th class="text-left">View</th>
                                </thead>
                                <tbody>
                                <tr class="text-left">
                                    <td>Sold</td>
                                    <td>
                                        <a class="btn btn-sm btn-info" title="download this report" href="{{ url('user/users') }}" >
                                            @fas('download')</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-warning" title="view this report" href="#" >
                                            @fas('eye')</a>
                                    </td>
                                </tr>
                                <tr class="text-left">
                                    <td>Leased</td>
                                    <td>
                                        <a class="btn btn-sm btn-info" title="download this report" href="{{ url('/home/houses') }}" >
                                            @fas('download')</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-warning" title="view this report" href="#" >
                                            @fas('download')</a>
                                    </td>
                                </tr>
                                <tr class="text-left">
                                    <td>Rented</td>
                                    <td>
                                        <a class="btn btn-sm btn-info" title="download this report" href="#" >
                                            @fas('download')</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-warning" title="view this report" href="#" >
                                            @fas('download')</a>
                                    </td>
                                </tr>
                                <tr class="text-left">
                                    <td>Others</td>
                                    <td>
                                        <a class="btn btn-sm btn-info" title="download this report" href="#" >
                                            @fas('download')</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-warning" title="view this report" href="#" >
                                            @fas('download')</a>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                        </div>
                    </fieldset>
                </div>
                <div class="col-md-4 col-sm-4 my-2">
                        <fieldset class="border p-2" style="text-align: right">
                            <legend class="w-auto"><h5>All reports</h5></legend>
                            <div class="container">
                                <div class="table table-responsive">
                                    <table class="table table-sm table-borderless table-striped">
                                        <thead>
                                        <th class="text-left">Report</th>
                                        <th class="text-left">Download</th>
                                        <th class="text-left">View</th>
                                        </thead>
                                        <tbody>
                                        <tr class="text-left">
                                            <td>Users</td>
                                            <td>
                                                <a class="btn btn-sm btn-info" title="download this report" href="{{ url('user/users') }}" >
                                                    @fas('download')</a>
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-warning" title="view this report" href="#" >
                                                    @fas('eye')</a>
                                            </td>
                                        </tr>
                                        <tr class="text-left">
                                            <td>All houses</td>
                                            <td>
                                                <a class="btn btn-sm btn-info" title="download this report" href="{{ url('/home/houses') }}" >
                                                    @fas('download')</a>
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-warning" title="view this report" href="#" >
                                                    @fas('download')</a>
                                            </td>
                                        </tr>
                                        <tr class="text-left">
                                            <td>Bookable</td>
                                            <td>
                                                <a class="btn btn-sm btn-info" title="download this report" href="#" >
                                                    @fas('download')</a>
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-warning" title="view this report" href="#" >
                                                    @fas('download')</a>
                                            </td>
                                        </tr>
                                        <tr class="text-left">
                                            <td>Un-bookable houses</td>
                                            <td>
                                                <a class="btn btn-sm btn-info" title="download this report" href="#" >
                                                    @fas('download')</a>
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-warning" title="view this report" href="#" >
                                                    @fas('download')</a>
                                            </td>
                                        </tr>
                                        <tr class="text-left">
                                            <td>Vacant houses</td>
                                            <td>
                                                <a class="btn btn-sm btn-info" title="download this report" href="#" >
                                                    @fas('download')</a>
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-warning" title="view this report" href="#" >
                                                    @fas('download')</a>
                                            </td>
                                        </tr>
                                        <tr class="text-left">
                                            <td>Booked houses</td>
                                            <td>
                                                <a class="btn btn-sm btn-info" title="download this report" href="#" >
                                                    @fas('download')</a>
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-warning" title="view this report" href="#" >
                                                    @fas('download')</a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
                </div>
        </fieldset>
    </div>
    @endsection
