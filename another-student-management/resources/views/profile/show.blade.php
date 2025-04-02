<x-layout>
    <body>
        <h2>{{ $user->username }} </h2>

        <div class="bg-gray-200 p-4 rounded">
            <p><strong>Username: </strong>{{$user->username}}</p>
            <p><strong>Full Name: </strong>{{$user->fullname}}</p>
            <p><strong>Email: </strong>{{$user->email}}</p>
            <p><strong>UUID: </strong>{{$user->uuid}}</p>
            <p><strong>Phone Number: </strong>{{$user->phonenumber}}</p>
            <p><strong>Role:</strong> <?php echo $user['is_teacher'] ? "Teacher" : "Student"; ?></p>
        </div>
        <a href="/profile/{{$user->uuid}}/edit">Edit this profile</a>
</x-layout>
