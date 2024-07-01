<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Schedules</title>
</head>
<body>
    <h1>Schedules</h1>
    <a href="{{ route('schedules.create') }}">Create New Schedule</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Event ID</th>
                <th>State</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Memo</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($schedules as $schedule)
            <tr>
                <td>{{ $schedule->id }}</td>
                <td>{{ $schedule->event_id }}</td>
                <td>{{ $schedule->state }}</td>
                <td>{{ $schedule->user_name }}</td>
                <td>{{ $schedule->email }}</td>
                <td>{{ $schedule->memo }}</td>
                <td>{{ $schedule->date }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
