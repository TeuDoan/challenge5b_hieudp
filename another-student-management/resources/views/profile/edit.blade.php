<x-layout>
    <h2>Edit Profile: {{ $user->username }}</h2>

    <form method="POST" action="{{ route('profile.update', $user->uuid) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH') <!-- Assuming you're using PATCH for updates -->

        <!-- Teacher-only fields -->
        @if(session('is_teacher') || Auth::user()->is_teacher)
            <x-teacher-fields :user="$user" />
        @endif

        <!-- Common fields for everyone -->
        <x-common-fields :user="$user" />

        <div class="mt-6">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Save Changes
            </button>
            <a href="{{ route('profile.show', $user->uuid) }}" class="ml-4 text-gray-600 hover:underline">
                Cancel
            </a>
        </div>
    </form>
</x-layout>