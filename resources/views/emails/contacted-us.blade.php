<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <title>Contacted Us</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            {{$contact->name}} sent a message: <br>
            {{$contact->body}}

            <br><br>
            Please get back to {{$contact->name}} at {{$contact->email}}
        </div>
    </div>
</body>
</html>