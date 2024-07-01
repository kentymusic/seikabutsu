<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Event</title>
</head>
<body>
    <h1>Event Name</h1>
    <form action="/events" method="POST">
        @csrf
        <div class="title">
            <h2>Title</h2>
            <input type="text" name="event[title]" placeholder="タイトル" value="{{ old('event.title') }}"/>
            <p class="title__error" style="color:red">{{ $errors->first('event.title') }}</p>
        </div>
        <div class="body">
            <h2>Body</h2>
            <textarea name="event[body]" placeholder="イベント詳細を記載してください">{{ old('event.body') }}</textarea>
            <p class="body__error" style="color:red">{{ $errors->first('event.body') }}</p>
        </div>
        <div class="locate">
            <h2>Locate</h2>
            <input type="text" name="event[locate]" placeholder="開催場所" value="{{ old('event.locate') }}"/>
            <p class="locate__error" style="color:red">{{ $errors->first('event.locate') }}</p>
        </div>
        <div class="password">
            <h2>Password</h2>
            <input type="password" name="event[password]" placeholder="パスワード" value="{{ old('event.password') }}"/>
            <p class="password__error" style="color:red">{{ $errors->first('event.password') }}</p>
        </div>
        <div class="start_date">
            <h2>Start Date</h2>
            <input type="date" name="event[start_date]" placeholder="開始日" value="{{ old('event.start_date') }}"/>
            <p class="start_date__error" style="color:red">{{ $errors->first('event.start_date') }}</p>
        </div>
        <div class="end_date">
            <h2>End Date</h2>
            <input type="date" name="event[end_date]" placeholder="終了日" value="{{ old('event.end_date') }}"/>
            <p class="end_date__error" style="color:red">{{ $errors->first('event.end_date') }}</p>
        </div>
        <input type="submit" value="store"/>
    </form>
    <div class="footer">
        <a href="/">戻る</a>
    </div>
</body>
</html>
