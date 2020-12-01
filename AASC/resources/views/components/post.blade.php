@props(['post' => $post])

<div class="mt-5 ml-5 w-80 border rounded-lg overflow-hidden float-left">

    <a href="{{route('users.posts', $post->user)}}" class="font-bold ml-3  capitalize">{{$post->user->name}}</a> <span
    class="text-gray-600 text-sm">{{$post->created_at->diffForHumans()}}</span>

    <img class="mt-3 object-contain h-80 w-80" src="/storage/cover_images/{{$post->cover_image}}">
    <div class="p-6">
        
        <h1 class="font-semibold capitalize">{{$post->title}}</h1>

        <p class="">{{$post->body}}</p>

        <div class="flex items-center">
            @auth
                @if (!$post->likedBy(auth()->user()))
                    <form action="{{route('posts.likes', $post->id)}}" method="post" class="mr-1">
                        @csrf
                        <button type="submit" class="text-blue-500">Like</button>
                    </form>
                @else
                    <form action="{{route('posts.likes', $post)}}" method="post" class="mr-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-blue-500">Unlike</button>
                    </form>
                @endif
            @endauth

            <span>{{$post->likes->count()}} {{ Str::plural('like', 
            $post->likes->count())}}</span>
        </div>

        @can('delete', $post)
            <form action="{{route('posts.destroy', $post)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-blue-500">Delete</button>
            </form>
        @endcan

    </div>
    


    
    
</div>