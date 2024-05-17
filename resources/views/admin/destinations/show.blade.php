<x-layouts>
    <div class="container px-4 mx-auto">
        <h1 class="mb-4 text-2xl font-bold">{{ $destination->title }}</h1>

        <div class="p-4 bg-white rounded shadow">
            <img src="{{ asset('storage/images/destinations/' . $destination->photo_path) }}" alt="{{ $destination->title }}"
                class="w-full h-auto mb-4">
            <p><strong>Description:</strong> {{ $destination->description }}</p>
            <p><strong>Location:</strong> {{ $destination->location }}</p>
            <p><strong>Estimated Price:</strong> ${{ $destination->estimated_price }}</p>

            <form action="{{ route('admin.destinations.approve', $destination) }}" method="POST" class="mt-4">
                @csrf
                <button type="submit" class="px-4 py-2 text-white bg-green-500 rounded">Approve Destination</button>
            </form>
        </div>
    </div>
</x-layouts>
