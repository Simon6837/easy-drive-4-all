<table style="margin: 0 auto">
    <td><h2>
            Hallo {{$data["firstName"]}} {{$data["lastName"]}} we hebben je aanmelding ontvangen. <br>
            hieronder vind je een kopie van je aanmelding:</h2></td>
</table>
<table style="margin: 0 auto">
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
