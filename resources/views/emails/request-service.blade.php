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
        {{$user->name}} Request to Book  : <br>
        {{$subcategory->title}}  <br>
        {{$subcategory->category->name}}  <br>
        Contact: {{$user->email}}, {{$user->profile->phone}}

    </div>
</div>
</body>
</html>