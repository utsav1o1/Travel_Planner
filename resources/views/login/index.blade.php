<x-layouts>
    
    <div class="container mx-auto mt-10">
        <div class="w-1/3 mx-auto">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Email:</label>
                    <input type="email" name="email" id="email" class="w-full p-2 mt-1 border border-gray-300 rounded" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700">Password:</label>
                    <input type="password" name="password" id="password" class="w-full p-2 mt-1 border border-gray-300 rounded" required>
                </div>
                <div class="mb-4">
                    <button type="submit" class="w-full p-2 text-white bg-blue-500 rounded">Login</button>
                </div>
            </form>
        </div>
    </div>

</x-layouts>