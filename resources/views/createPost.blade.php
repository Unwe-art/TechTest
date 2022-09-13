<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <form method="POST" action="{{ route('addPost') }}">
                @csrf

                <div>
                    <x-jet-label for="Title" value="{{ __('Title') }}" />
                    <x-jet-input id="name" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus autocomplete="title" />
                </div>
                <x-jet-button class="ml-4">
                    {{ __('Create post') }}
                </x-jet-button>

            </form>

        </div>
    </div>
</x-app-layout>
