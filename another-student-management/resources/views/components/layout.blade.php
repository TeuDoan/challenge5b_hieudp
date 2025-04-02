<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VAP - VCS Academic Portal</title>
</head>
<body>
    <header>
        <nav>
            <h1>VAP - VCS Academic Portal</h1>
            <a href="{{ route('dashboard.index') }}">Dashboard</a>
            <a href="{{ route('about') }}">About</a>
    <!--<a href="">Profile</a>-->
            <a href="/assignment">Homework Assignment</a>
            <a href="/submission">Homework Submission</a>
        </nav>
    </header>

    <main class="container">
        {{ $slot }}
    </main>
</body>
</html>
