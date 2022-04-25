<x-guest-layout>

    <ol class="pl-5 list-decimal">
        @foreach($hacks as $hack)
            <a href="{{route('hack.show', $hack)}}"> <li>{{ $hack->title }} </li> </a>
        @endforeach
    </ol>

</x-guest-layout>
