<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit post') }} : {{$post->title}}
        </h2>
    </x-slot>

    <form action="{{route('posts.update',$post->id)}}" method="post" class="container mt-3">
        @method('PATCH')
       @include('posts.form')
    </form>
</x-app-layout>
