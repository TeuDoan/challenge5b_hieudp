<div class="mb-4">
    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" 
           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
    @error('email')
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
</div>

<div class="mb-4">
    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
    <input type="password" name="password" id="password" 
           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Leave blank to keep current">
    @error('password')
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
</div>

<div class="mb-4">
    <label for="profile_picture" class="block text-sm font-medium text-gray-700">Profile Picture</label>
    <input type="file" name="profile_picture" id="profile_picture" 
           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
    @error('profile_picture')
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
</div>

<div class="mb-4">
    <label for="phonenumber" class="block text-sm font-medium text-gray-700">Phone Number</label>
    <input type="text" name="phonenumber" id="phonenumber" value="{{ old('phonenumber', $user->phonenumber) }}" 
           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
    @error('phonenumber')
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
</div>