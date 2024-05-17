<x-layouts>

    <div class="flex flex-col gap-4 ">
        @if (session('success'))
            <div class="p-4 mb-4 text-white bg-green-500 rounded">
                {{ session('success') }}
            </div>
        @endif
        <div class="flex flex-row justify-between gap-4 p-4 border rounded-md border-emerald-600">

            <div>
                {{ Auth::guard('admin')->user()->name }}
            </div>
            <div>
                {{ Auth::guard('admin')->user()->email }}
            </div>
            <div>
                Contribution : {{ $destinations->count() }}
            </div>
            <div class="rounded-md bg-slate-600">
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit"
                        class="px-4 py-2 text-white bg-red-500 rounded-md round hover:bg-red-600">Logout</button>
                </form>
            </div>
        </div>
        @php
            $urlPath = 'admin.destinations.show';
        @endphp
        <div>
            @foreach ($destinations as $destination)
                <livewire:destination.show-destination :destination="$destination" :urlPath="$urlPath" />
            @endforeach
        </div>
    </div>




</x-layouts>
