<h2>{{$data["firstName"]}} {{$data["lastName"]}} wil zich aanmelden voor rijlessen, hieronder alle informatie:</h2>
<table style="margin-left: 20px">
    <tr>
        <td>Voornaam:</td>
        <td>{{$data["firstName"]}}</td>
    </tr>
    <tr>
        <td>Achternaam:</td>
        <td>{{$data["lastName"]}}</td>
    </tr>
    <tr>
        <td>Geboorte datum:</td>
        <td>{{$data["birthDate"]}}</td>
    </tr>
    <tr>
        <td>Telefoon nummer:</td>
        <td><a href="tel:{{$data["phone"]}}">{{$data["phone"]}}</a></td>
    </tr>
    <tr>
        <td>Email:</td>
        <td><a href="mailto:{{$data["email"]}}">{{$data["email"]}}</a></td>
    </tr>
</table>
