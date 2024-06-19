<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Blog') }}
        </h2>
    </x-slot>

    <form action="{{route('posts.store')}}" method="post" class="container mt-3">
       @include('posts.form')
    </form>
</x-app-layout>
