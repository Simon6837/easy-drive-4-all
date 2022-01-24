<table style="margin: 0 auto; text-align: center">
    <td>
        <h2>{{$data['name']}} heeft u een bericht gestuurd, hieronder alle
            informatie:
        </h2>
    </td>
</table>
<table style="margin: 0 auto">
    <tr>
        <td>Naam:</td>
        <td>{{$data['name']}}</td>
    </tr>
    <tr>
        <td>Email:</td>
        <td><a href="mailto:{{$data['email']}}">{{$data['email']}}</a></td>
    </tr>

</table>
<table style="margin: 10px auto; text-align: center">
    <tr>
        <td>Onderwerp:</td>
        <td>{{$data['subject']}}</td>
    </tr>
    <tr>
        <td colspan="2">
            Bericht:
        </td>
    </tr>
    <tr>
        <td colspan="2">
            {{$data['message']}}
        </td>
    </tr>

</table>
<table style="margin: 0 auto; text-align: center">
    <td>
        Met vriendelijke groet,<br> {{env('APP_NAME')}}
    </td>
</table>
