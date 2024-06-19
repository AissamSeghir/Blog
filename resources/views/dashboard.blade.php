<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Blog') }}
        </h2>
    </x-slot>

    <a href="{{ route('posts.create') }}" class="btn btn-lg btn-primary">{{ __('New Post') }}</a>

    <div class="container ">
        @forelse($posts as $post)
            <div class="mb-2 py-2">
                <a href="{{route('posts.edit', $post)}}" class="btn btn-warning">Edit</a>
                <form method="post" action="{{route('posts.destroy', $post)}} " style="display:inline-block" class="btn btn-danger ">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Are you sure')">Delete</button>
                    </form>
                <a href="" class="ml-4">{{ $post->title }}</a>
            </div>
        @empty
            <div>Don't have any post yet</div>
        @endforelse
    </div>
</x-app-layout>
