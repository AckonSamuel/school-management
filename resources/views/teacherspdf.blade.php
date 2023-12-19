<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 7 PDF Example</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="container mt-5">
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-danger">
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">email</th>
                    <th scope="col">phone_number</th>
                </tr>
            </thead>
            <tbody>
    @foreach($teachers ?? [] as $data)
    <tr>
        <td>{{ $data['first_name'] }}</td>
        <td>{{ $data['last_name'] }}</td>
        <td>{{ $data['email'] }}</td>
        <td>{{ $data['phone_number'] }}</td>
    </tr>
    @endforeach
</tbody>

    </div>
    <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>