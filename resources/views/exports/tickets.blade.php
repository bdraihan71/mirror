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
                <th>Purchased Tickets</th>
            </tr>
        </thead>
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
            @foreach($event->tickets as $ticket)
                <tr>
                    @if ($ticket->user != null)
                        <td>{{$ticket->user->profile->f_name.' '.$ticket->user->profile->m_name.' '.$ticket->user->profile->l_name}}</td>
                        <td>{{$ticket->user->email}}</td>
                        <td>{{$ticket->user->profile->phone}}</td>
                        <td>{{$ticket->type->name}}</td>
                        <td>{{$ticket->type->price}}</td>
                        <td>{{$ticket->present != false ? "Present" : "Absent"}}</td>
                    @endif
                </tr>
            @endforeach
        </tbody>
        <thead>
            <tr>
                <th>Issued Tickets</th>
            </tr>
        </thead>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Designation</th>
                <th>Company</th>
                <th>Present</th>
            </tr>
        </thead>
        <tbody>
            @foreach($event->issues as $ticket)
                <tr>
                    <td>{{$ticket->name}}</td>
                    <td>{{$ticket->email}}</td>
                    <td>{{$ticket->phone}}</td>
                    <td>{{$ticket->designation}}</td>
                    <td>{{$ticket->company}}</td>
                    <td>{{$ticket->present != false ? "Present" : "Absent"}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>