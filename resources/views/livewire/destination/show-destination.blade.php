<div class="grid grid-cols-3 gap-4 p-3 mb-4 border rounded-md border-slate-500">
    <div class="h-auto">
        <img src="{{asset('storage/images/destinations/'.$destination->photo_path)}}"
            alt="" />
    </div>
    <div class="col-span-2">
        <div class="">
            {{ $destination->title }}
        </div>
        <div>
            {{ $destination->description }}
        </div>
        <div class="flex justify-between gap-4">
            <div>
                Location : {{ $destination->location }}
            </div>

            <div>
                Estimated Price: ${{ $destination->estimated_price }}
            </div>
        </div>
        <div>

            <a href="{{ route('dest.show', $destination) }}">
                <button>Show</button>
            </a>
        </div>

    </div>
</div>
