<!doctype html>

<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $home->name }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
        .table
        {
            font-size: 12px !important;
            font-family: "Times New Roman", monospace;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <h5 class="h5 mt-0 text-center">{{ $home->name }}</h5>
    <hr>
    <div class="table table-responsive-sm">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Type</th>
                <td>{{ $home->type }}</td>
            </tr>
                <tr>
                <th>Availability</th>
                <td>{{ $home->availability }}</td>
                </tr>
            <tr>
                <th>Location</th>
                <td>{{ $home->location }}</td>
            </tr>
            <tr>
                <th>Rent</th>
                <td>{{ $home->rent }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>{{ $home->status }}</td>
            </tr>
            <tr>
                <th>Priority</th>
                <td>{{ $home->priority }}</td>
            </tr>
            <tr>
                <th class="text-justify ">Description</th>
                <td>{{ $home->desc }}</td>
            </tr>
            <tr>
                <th>Cover images</th>
                <td>

                </td>
            </tr>
            <tr>
                <th>Posted </th>
                <th>Posted by</th>
            </tr>
                        </thead>
            <tr>
                <td>{{ $home->created_at->diffForHumans() }}</td>
                <td>{{ $home->by }}</td>
            </tr>
        </table>
    </div>
</div>
</body>
</html>
