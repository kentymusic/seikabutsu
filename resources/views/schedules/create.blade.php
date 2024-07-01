<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Event</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <style>
        .calendar {
            display: flex;
            flex-wrap: wrap;
        }
        .calendar .day {
            width: 14.28%;
            padding: 10px;
            box-sizing: border-box;
        }
        .calendar .day label {
            display: block;
            text-align: center;
        }
        .schedule-table {
            width: 100%;
            border-collapse: collapse;
        }
        .schedule-table th, .schedule-table td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .schedule-table th {
            background-color: #f2f2f2;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1 class="title">{{ $event->title }}</h1>
    <div class="content">
        <div class="content__event">
            <h3>本文</h3>
            <p>{{ $event->body }}</p>
            <p class="locate">{{ $event->locate }}</p>
            <p class="start_date">{{ $event->start_date }}</p>
            <p class="end_date">{{ $event->end_date }}</p>
        </div>
    </div>

    <h1>Schedule</h1>
    <form action="{{ route('schedules.store') }}" method="POST">
        @csrf
        <input type="hidden" name="event_id" value="{{ $event->id }}">
        <div class="user_name">
            <h2>User Name</h2>
            <input type="text" name="user_name" placeholder="ユーザー名" value="{{ old('user_name') }}"/>
            <p class="user_name__error" style="color:red">{{ $errors->first('user_name') }}</p>
        </div>
        <div class="email">
            <h2>Email</h2>
            <input type="email" name="email" placeholder="メールアドレス" value="{{ old('email') }}"/>
            <p class="email__error" style="color:red">{{ $errors->first('email') }}</p>
        </div>
        <div class="calendar">
            @if(isset($dates))
                @foreach ($dates as $date)
                    <div class="day">
                        <label>{{ $date }}</label>
                        <select name="states[{{ $date }}]">
                            <option value="o" {{ old("states.$date") == 'o' ? 'selected' : '' }}>O</option>
                            <option value="x" {{ old("states.$date") == 'x' ? 'selected' : '' }}>X</option>
                        </select>
                        <p class="state__error" style="color:red">{{ $errors->first("states.$date") }}</p>
                    </div>
                @endforeach
            @else
                <p>No dates available.</p>
            @endif
        </div>
        <input type="submit" value="store"/>
    </form>

    <h2>Current Schedules</h2>
    @foreach ($dates as $date)
        <div class="schedule-date">
            <h3>{{ $date }}</h3>
            <p>Participants: {{ $attendanceCounts[$date] }}</p>
            <table class="schedule-table">
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>State</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($schedules[$date]) && count($schedules[$date]) > 0)
                        @foreach ($schedules[$date] as $schedule)
                            <tr>
                                <td>{{ $schedule->user_name }}</td>
                                <td>{{ $schedule->email }}</td>
                                <td>{{ $schedule->state }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3">No participants</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    @endforeach

    <h2>Most Popular Date</h2>
    <p>Date: {{ $maxDate }}</p>
    <p>Participants: {{ $attendanceCounts[$maxDate] }}</p>

    <div class="footer">
        <a href="/">戻る</a>
    </div>
</body>
</html>
