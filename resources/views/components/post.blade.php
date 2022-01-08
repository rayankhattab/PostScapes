@props(['post' => $post])
<div class="mb-4 rounded-lg border-2 border-hunter p-3">
    <a href="{{route('users.posts', $post->user)}}" class="font-bold">{{$post->user->name}}</a> <span
        class="text-lightpink text-sm float-right">{{$post->created_at->diffForHumans()}}</span>

    <p class="mb-2">{{$post->body}}</p>

    @auth
    @can('delete', $post)
    <form action="{{route('posts.destroy',$post)}}" method="post" class="inline float-right">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-darkpink "><i class="las la-trash la-lg "></i></button>
    </form>
    @endcan
    @if (!$post->likedBy(auth()->user()))
    <form id="like" action="{{route('posts.likes',$post)}}" method="post" class="mr-1 inline">
        @csrf
        {{-- <input type="hidden" name="id" id="postid" value="{{$post->id}}">--}}
        {{-- <button id="submit" type="button" class="text-darkhunter font-semibold btnLike">Like</button> --}}
        <button type="submit" class="text-darkhunter font-semibold btnLike">Like</button>
    </form>
    @else
    <form action="{{route('posts.likes',$post)}}" method="post" class="inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-darkhunter font-semibold">Unlike</button>
    </form>
    @endif

    @endauth
    <span class=" text-sm font-extralight">{{$post->likes->count()}} {{Str::plural('like',
        $post->likes->count()
        )}}</span>
</div>