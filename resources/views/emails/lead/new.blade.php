<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Lead</title>
</head>

<body>

    <h1>Hai un nuovo messaggio </h1>

    <div style="background-color: rgb(197, 197, 197); padding:15px;">
        <br>
        <div style="font-size: 20px"> Nome: <span style="font-weight: bold">{{ $lead->name }} </span>ù</div>
        <div style="font-size: 20px"> Email: <span style="font-weight: bold">{{ $lead->email }} </span>ù</div>
        <div style="font-size: 20px">Message: </div>
        {{ $lead->message }}
        <br>
    </div>
</body>

</html>
