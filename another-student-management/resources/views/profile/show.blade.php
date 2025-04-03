<x-layout>
    <body>
        <h2>{{ $user->username }} </h2>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-gray-200 p-4 rounded">
            <p><strong>Username: </strong>{{$user->username}}</p>
            <p><strong>Full Name: </strong>{{$user->fullname}}</p>
            <p><strong>Email: </strong>{{$user->email}}</p>
            <p><strong>UUID: </strong>{{$user->uuid}}</p>
            <p><strong>Phone Number: </strong>{{$user->phonenumber}}</p>
            <p><strong>Role:</strong> <?php echo $user['is_teacher'] ? "Teacher" : "Student"; ?></p>
        </div>

        <!-- Owner-only fields -->
        @if ($isOwner || $isTeacher)
        <a href="/profile/{{$user->uuid}}/edit">Edit this profile</a>
        @endif


        @if($isOwner)
        <x-received-messages :user="$user" :messages="$messages" />
        @else
        <x-sent-messages :user="$user" :messages="$messages" />
        @endif

        

        
</x-layout>
