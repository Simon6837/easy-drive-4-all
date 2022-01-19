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
    <title>students.pdf</title>
</head>
<body>
<h1>{{ $title }}</h1>
<p>{{ $date }}</p>

<table style="width: 100%">
    <thead>
    <tr>
        <th>Naam</th>
        <th>Email</th>
        <th>Adres</th>
        <th>Plaats</th>
        <th>Postcode</th>
        <th>lessen tegoed</th>
    </tr>
    </thead>
    <tbody >
    @foreach($students as $student)
        <tr>
            <td>{{$student->first_name}} {{$student->prefix}} {{$student->last_name}}</td>
            <td>{{$student->email}}</td>
            <td>{{$student->student->address}}</td>
            <td>{{$student->student->city}}</td>
            <td>{{$student->student->postal_code}}</td>
            <td>{{$student->student->lessons_to_go}}</td>
        </tr>
@endforeach

</body>
</html>
