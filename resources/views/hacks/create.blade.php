<x-guest-layout>
        <x-auth-card>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('hack.submit') }}">
                @csrf

                <!-- Title -->
                <div class="mt-4">
                    <x-label for="title" :value="__('Title')" />

                    <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
                </div>

                <!-- Url -->
                <div class="mt-4">
                    <x-label for="url" :value="__('Url')" />

                    <x-input id="url" class="block mt-1 w-full" type="text" name="url" :value="old('url')" required autofocus />
                </div>

                <!-- Text -->
                <div class="mt-4">
                    <x-label for="url" :value="__('Text')" />

                    <x-input id="text" class="block mt-1 w-full" type="text" name="text" :value="old('text')" required autofocus />
                </div>


                <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-3">
                        {{ __('Submit') }}
                    </x-button>
                </div>
            </form>

        </x-auth-card>
</x-guest-layout>
