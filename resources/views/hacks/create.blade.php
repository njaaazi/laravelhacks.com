<x-guest-layout>
        <div class="flex flex-col sm:justify-center items-center my-8 sm:pt-0">

            <h1>Create a new hack</h1>

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

                    <x-textarea id="text" class="block mt-1 w-full" type="text" name="text" cols="30" rows="10" :value="old('text')" autofocus />
                </div>


                <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-3">
                        {{ __('Submit') }}
                    </x-button>
                </div>
            </form>

        </div>
</x-guest-layout>
