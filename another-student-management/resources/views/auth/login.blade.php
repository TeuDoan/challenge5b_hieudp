<x-layout>


    <form action="{{ route('login') }}" method="POST">
        @csrf

        <h2>Login to your Account</h2>
        <label for="username">Username: </label>
        <input type="text" name='username' required value="{{ old('username') }}">
        <label for="password">Password: </label>
        <input type="password" name='password' required>

        <button type="submit" class="btn mt-4">Log in</button>

        <!-- validation errors -->
        @if ($errors->any())
        <ul class="px-4 py-2 bg-red-100">
            @foreach ($errors->all() as $error)
            <li class="my-2 text-red-500">{{ $error }}</li>
            @endforeach
        </ul>
        @endif
    </form>
</x-layout>
