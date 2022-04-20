<x-guest-layout>
    <ul>
        @foreach($hacks as $hack)
            <li>{{ $hack->title }}</li>
        @endforeach
    </ul>
</x-guest-layout>
