<x-guest-layout>
    <div>
        <ol class="pl-1">
            @foreach($hacks as $hack)
                <li>
                    <div class="grid grid-cols-12 md:flex items-center space-x-1">
                        <span class="font-bold col-span-1 text-center text-xs border-red-500 border h-5 w-5 hover:bg-red-500 hover:text-white cursor-pointer">
                            H<sub>+</sub>
                        </span>
                        <a class="col-span-10 text-gray-900" href="{{route('hack.show', $hack)}}"> {{ $hack->title }} </a>
                        <a class="col-span-1" href="{{$hack->url}}" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                        </a>
                    </div>

                    <small class="text-gray-500">by {{$hack->user->name}} {{$hack->created_at->diffForHumans()}}</small>
                </li>
            @endforeach
        </ol>
    </div>



</x-guest-layout>
