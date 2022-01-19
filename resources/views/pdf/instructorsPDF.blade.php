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
        <th>Naam</th>
        <th>Email</th>
        <th>Adres</th>
        <th>Plaats</th>
        <th>Postcode</th>
        <th>Omschrijving</th>
    </tr>
    </thead>
    <tbody>
    @foreach($instructors as $instructor)
        <tr>
            <td>{{$instructor->first_name}} {{$instructor->prefix}} {{$instructor->last_name}}</td>
            <td>{{$instructor->email}}</td>
            <td>{{$instructor->instructor->address}}</td>
            <td>{{$instructor->instructor->city}}</td>
            <td>{{$instructor->instructor->postal_code}}</td>
            <td>{{$instructor->instructor->description}}</td>
        </tr>
@endforeach

</body>
</html>
