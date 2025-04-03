<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VAP - VCS Academic Portal</title>
    @vite('resources/css/app.css')
</head>
<body>
    <header>
        <nav>
            <h1 class="text-3xl font-bold underline">VAP - VCS Academic Portal</h1>
            <a href="{{ route('about') }}">About</a>
            @guest
            <a href="{{ route('show.login') }}">Login</a>
            @endguest
            @auth
            <a href="{{ route('dashboard.index') }}">Dashboard</a>
    <!--<a href="">Profile</a>-->
            <a href="/assignment">Homework Assignment</a>
            <a href="/submission">Homework Submission</a>
            <form method="POST" action="{{ route('logout') }}" class="m-0">
                @csrf
                <button type="submit" class='btn'>Logout</button>
            </form>
            @endauth
        </nav>
    </header>

    <main class="container">
        {{ $slot }}
    </main>
    <footer class="bg-gray-800 text-white p-4 text-center">
        &copy; 2025 hieudp
    </footer>
</body>
</html>
