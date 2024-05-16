<x-layouts>
    <div class="items-center">

        User Id : {{ $destination->user_id }}
        {{ $destination->title }}
        </br>
        {{ $destination->description }}
        <img src="{{ asset('storage/images/destinations/' . $destination->photo_path) }}" alt="$destination->photo_path">
        Estimated Price: ${{ $destination->estimated_price }}

    </div>
</x-layouts>
