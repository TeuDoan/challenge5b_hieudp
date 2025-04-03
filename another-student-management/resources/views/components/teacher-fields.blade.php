<div class="mb-4">
    <label for="fullname" class="block text-sm font-medium text-gray-700">Full Name</label>
    <input type="text" name="fullname" id="fullname" value="{{ old('fullname', $user->fullname) }}" 
           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
    @error('fullname')
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
</div>

<div class="mb-4">
    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
    <input type="text" name="username" id="username" value="{{ old('username', $user->username) }}" 
           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
    @error('username')
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
</div>