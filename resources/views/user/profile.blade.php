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
            <div>
                <div>
                    Notification: 
                    <span id="notification-count">{{ $user->unreadNotifications->count() }}</span>
                    <button id="show-notifications" class="ml-2 text-blue-500">Show Notifications</button>
                </div>    
            </div>

            <div class=" bg-slate-600">
                <form action="{{ route('logout') }}" method="POST">

                    @csrf
                    <Button>Logout</Button>

                </form>
            </div>
            <div>
                <a href="{{ route('dest.create') }}">
                    Create
                </a>
            </div>

        </div>
        <div id="notifications" class="hidden">
            @foreach ($user->unreadNotifications as $notification)
                <div class="p-2 border-b">
                    <p>{{ $notification->data['description'] }}</p>
                    <p class="text-sm text-gray-500">Destination: {{ $notification->data['title'] }}</p>
                </div>
            @endforeach
        </div>
        @php
            $urlPath = 'dest.show';
        @endphp
        <div>
            @foreach ($user->destination as $destination)
                <livewire:destination.show-destination :destination="$destination "  :urlPath="$urlPath" />
            @endforeach
        </div>
    </div>
    <script>
        document.getElementById('show-notifications').addEventListener('click', function() {
            const notifications = document.getElementById('notifications');
            notifications.classList.toggle('hidden');
        });
    </script>
</x-layouts>
