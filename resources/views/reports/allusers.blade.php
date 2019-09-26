<!doctype html>

<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BigStore: Shopping Invoice</title>
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
    <h5 class="h5 mt-0 text-center">List of users</h5>
    <hr>
    <div class="table table-responsive-sm">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>User level</th>
                <th>Location</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->contact }}</td>
                <td>{{ $user->level }}</td>
                <td>{{ $user->location }}</td>
                <td>
                    @if($user->status == '0')
                        <span class="text-info">Pending</span>
                    @else
                        <span class="text-success">Approved</span>
                    @endif
                </td>
            </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
