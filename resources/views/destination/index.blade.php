<x-layouts>


    <div class="flex flex-col gap-4 ">
        <div class="flex flex-row gap-4 p-4 border rounded-md border-emerald-600">
            <form action="{{ route('dest.search') }}" method="post">
                @csrf
                <input class="rounded-sm basis-2/4" type="text" name="title" id=""
                    placeholder="Title and description">
                <input class="rounded-sm basis-1/4" type="text" name="location" id="" placeholder="location">
                <input class="rounded-sm basis-1/4" type="text" name="budget" id=""
                    placeholder="estimated budget">
                <button class="border border-orange-600 rounded-md">Search</button>
            </form>
        </div>
        @php
            $urlPath = 'dest.show';
        @endphp
        <div>
            @foreach ($destinations as $destination)
                <livewire:destination.show-destination :destination="$destination" :urlPath="$urlPath" />
            @endforeach
        </div>
    </div>


</x-layouts>
