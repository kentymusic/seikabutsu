<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Event</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
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

    <!-- 参加可否入力フォーム -->
    <h1>Schedule</h1>
    <form action="https://your-domain.com/schedules" method="POST">
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
        <div class="schedule">
            <h2>Schedule</h2>
            @foreach ($dates as $date)
                <div class="date">
                    <label>{{ $date }}</label>
                    <select name="states[{{ $date }}]">
                        <option value="o" {{ old("states.$date") == 'o' ? 'selected' : '' }}>O</option>
                        <option value="x" {{ old("states.$date") == 'x' ? 'selected' : '' }}>X</option>
                    </select>
                    <p class="state__error" style="color:red">{{ $errors->first("states.$date") }}</p>
                </div>
            @endforeach
        </div>
        <input type="submit" value="store"/>
    </form>

    <!-- スケジュール一覧表示 -->
    <h2>スケジュール一覧</h2>
    <table>
        <thead>
            <tr>
                <th>ユーザー名</th>
                <th>メール</th>
                <th>日付</th>
                <th>状態</th>
                <th>メモ</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($schedules as $schedule)
                <tr>
                    <td>{{ $schedule->user_name }}</td>
                    <td>{{ $schedule->email }}</td>
                    <td>{{ $schedule->date }}</td>
                    <td>{{ $schedule->state }}</td>
                    <td>{{ $schedule->memo }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <a href="/">戻る</a>
    </div>
</body>
</html>
