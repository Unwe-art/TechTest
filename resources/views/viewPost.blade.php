<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Post') }}
        </h2>
    </x-slot>
    @if ($creator)
        <form method="post" action="{{route('deletePost',['id' => $post['id']])}}">
            @method('delete')
            @csrf
            <x-jet-button class="ml-4">
                {{ __('Delete') }}
            </x-jet-button>
        </form>
        <form method="post" action="{{route('editPost',['id' => $post['id'],'title' => $post['title']])}}">
            @method('post')
            @csrf
            <x-jet-button class="ml-4">
                {{ __('Edit') }}
            </x-jet-button>
        </form>
    @endif


    <div class="p-6">
        <div class="flex items-center">
            <div class="ml-4 text-lg leading-7 font-semibold"><a
                    href="{{App::make('url')->to('/')}}/post/{{$post['id']}}"
                    class="underline text-gray-900 dark:text-black">{{$post['title']}}</a>
            </div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                Laravel has wonderful, thorough documentation covering every aspect of the framework. Whether you are
                new to the framework or have previous experience with Laravel, we recommend reading all of the
                documentation from beginning to end.
            </div>
        </div>
        <div class="ml-12">
            <div class="mt-2 text-black-600 dark:text-black-400 text-sm">
                {{$post['author_name']}}
            </div>
        </div>
    </div>
</x-app-layout>
