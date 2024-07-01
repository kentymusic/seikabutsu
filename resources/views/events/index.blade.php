<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Event</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Event Name</h1>
        <div class='events'>
            @foreach ($events as $event)
                <div class='event'>
                    <h2 class='title'> <a href="/schedules/create/{{ $event->id }}">{{ $event->title }}</a></h2>
                    <p class='body'>{{ $event->body }}</p>
                </div>
            @endforeach
        </div>
        <a href='/events/create'>create</a>
        <div class='paginate'>
            {{ $events->links() }}
        </div>
    </body>
</html>