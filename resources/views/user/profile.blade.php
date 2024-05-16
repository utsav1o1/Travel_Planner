<x-layouts>


    <div class="flex flex-col gap-4 ">
        <div class="flex flex-row justify-between gap-4 p-4 border rounded-md border-emerald-600">

            <div>
                {{ $user->name }}
            </div>
            <div>
                {{ $user->email }}
            </div>
            <div>
                Contribution : {{ $user->destination->count() }}
            </div>

            <div class=" bg-slate-600">
                <form action="{{ route('logout')}}" method="POST">
                    
                   @csrf
                        <Button>Logout</Button>
                    
                </form>
            </div>
            <div>
                <a href="{{route('dest.create')}}">
                Create
                </a>
            </div>

        </div>
        <div>
            @foreach ($user->destination as $destination)
                <livewire:destination.show-destination :destination="$destination" />
            @endforeach
        </div>
    </div>

</x-layouts>
