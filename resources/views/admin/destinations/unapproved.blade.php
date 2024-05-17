<x-layouts>
    <div class="container px-4 mx-auto">
        <h1 class="mb-4 text-2xl font-bold">Unapproved Destinations</h1>
    
        @if(session('success'))
            <div class="p-4 mb-4 text-white bg-green-500 rounded">
                {{ session('success') }}
            </div>
        @endif
    
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
            @foreach($destinations as $destination)
                <div class="p-4 bg-white rounded shadow">
                    <h2 class="text-xl font-bold">{{ $destination->title }}</h2>
                    <p>{{ $destination->description }}</p>
                    <p><strong>Location:</strong> {{ $destination->location }}</p>
                    <p><strong>Estimated Price:</strong> ${{ $destination->estimated_price }}</p>
                    <a href="{{ route('admin.destinations.show', $destination) }}" class="block px-4 py-2 mt-4 text-center text-white bg-blue-500 rounded">View Details</a>
                </div>
            @endforeach
        </div>
    </div>
</x-layouts>