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
        {{$user->profile->f_name}} {{$user->profile->m_name == null ? $user->profile->l_name : $user->profile->m_name.' '.$user->profile->l_name}} requested to book: <br>
        {{$subcategory->title}}, {{$subcategory->category->name}}<br>
        Contact: {{$user->email}}, {{$user->profile->phone}}
    </div>
</div>
</body>
</html>