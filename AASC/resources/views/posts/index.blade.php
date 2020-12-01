@extends ('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            @auth
                <form action="{{route('posts')}}" method="post" enctype="multipart/form-data" class="mb-4">
                    @csrf                    
                    <div class="mb-4">
                        <label for="title" class="sr-only">Title</label>
                        <textarea name="title" id="title" cols="30" rows="1" class="bg-gray-100
                        border-2 w-full p-4 rounded-lg @error('title') border-red-500 @enderror"
                        placeholder="Your Title"></textarea>

                        @error('title')
                            <div class="text-red-500 mt-2 text-sm">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="body" class="sr-only">Body</label>
                        <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100
                        border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror"
                        placeholder="Post Something!"></textarea>

                        @error('body')
                            <div class="text-red-500 mt-2 text-sm">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="cover_image" class="sr-only">Select image to upload:</label>
                        <input type="file" name="cover_image" id="cover_image"cols="30" rows="4" class="bg-gray-100
                        border-2 w-full p-4 rounded-lg @error('cover_image') border-red-500 @enderror">

                        @error('cover_image')
                            <div class="text-red-500 mt-2 text-sm">
                                {{$message}}
                            </div>
                        @enderror
                            
                    </div>

                    <div>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded
                        font-medium">Post</button>
                    </div>
                
                </form>
            @endauth

            @if ($posts->count())
                @foreach ($posts as $post)
                <x-post :post='$post'/>
                    
                @endforeach

                {{$posts->links()}}
            @else
            <p>There are no posts</p>
            @endif

        
        </div>
    </div>

    
@endsection