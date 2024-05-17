<x-layouts>
    <div class="container px-4 mx-auto">
        <div class="max-w-md p-6 mx-auto bg-white rounded-lg shadow-md">
            <h2 class="mb-4 text-2xl font-bold">Register</h2>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" value="{{ old('name') }}"
                        required autofocus>
                    @error('name')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" value="{{ old('email') }}"
                        required>
                    @error('email')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" required>
                    @error('password')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm
                        Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div>
                    <button type="submit" class="w-full px-4 py-2 text-white bg-blue-500 rounded-md">Register</button>
                </div>
            </form>
        </div>
    </div>
</x-layouts>
