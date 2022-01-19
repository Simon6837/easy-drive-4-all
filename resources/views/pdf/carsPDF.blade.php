<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>

<!DOCTYPE html>
<html lang="nl">
<head>
    <title>instructors.pdf</title>
</head>
<body>
<h1>{{ $title }}</h1>
<p>{{ $date }}</p>

<table>
    <thead>
    <tr>
        <th>Type</th>
        <th>Merk</th>
        <th>Model</th>
        <th>Kenteken</th>

    </tr>
    </thead>
    <tbody>
    @foreach($cars as $car)
        <tr>
            <td>{{$car->type}}</td>
            <td>{{$car->brand}}</td>
            <td>{{$car->model}}</td>
            <td>{{$car->license_plate}}</td>
        </tr>
@endforeach

</body>
</html>
