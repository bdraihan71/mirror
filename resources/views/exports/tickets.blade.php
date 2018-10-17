<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>User Name</th>
                <th>User Email</th>
                <th>User Phone</th>
                <th>Ticket Type</th>
                <th>Ticket Price</th>
                <th>Present</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tickets as $ticket)
                <tr>
                    <td>{{$ticket->user->profile->f_name.' '.$ticket->user->profile->m_name.' '.$ticket->user->profile->l_name}}</td>
                    <td>{{$ticket->user->email}}</td>
                    <td>{{$ticket->user->profile->phone}}</td>
                    <td>{{$ticket->type->name}}</td>
                    <td>{{$ticket->type->price}}</td>
                    <td> </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>