@extends('layouts.app')

@section('content')
<div class="flex justify-center">
  @auth
  <div class="w-8/12 bg-white p-6 rounded-lg mb-4">
    <form action="{{route('posts')}}" method="post">
      @csrf
      <div>
        <label for="body" class="sr-only">Body</label>
        <textarea name="body" id="body" cols="30" rows="4" class="bg-beige  focus:border-darkhunter focus:ring-darkhunter border-2 border-hunter w-full p-4 rounded-lg  
            @error('body') border-darkpink @enderror" placeholder="Post something!"></textarea>
        @error('body')
        <div class="text-darkpink mt-2 text-sm font-semibold">{{$message}}</div>
        @enderror
      </div>
      <div class="mt-4">
        <button class="bg-lighthunter text-white px-4 py-1 rounded hover:bg-lighthunter">Post</button>
      </div>
    </form>
    @endauth
  </div>
</div>
<div class="flex justify-center">
  <div class="w-8/12 bg-white p-6 rounded-lg mb-4">
    @if ($posts->count())
    @foreach ($posts as $post)
    <x-post :post="$post" />
    @endforeach

    {{$posts->links()}}
    @else
    <p>No posts found.</p>
    @endif
  </div>
</div>
@endsection

{{-- @section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
  $(document).ready(function(){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  $('.btnLike').click(function() {
    // alert($(this).prev('input').val());
    // event.preventDefault(); 
  //   $.ajaxSetup({
  // headers: {
  //   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  // }
  // });
  $.ajax({
      url: "{{route('posts.likes',$post)}}",
      type: 'post',
      data:{_token: CSRF_TOKEN, message:$(this).prev('input').val()},
      // {_token: $('form').serialize()},
        // '{!! csrf_token() !!}', message:$(this).prev('input').val()} , 
      // dataType: 'json',
      success: function( _response ){
          console.log('true');
      },
      error: function( _response ){
        console.log('false');
      }
  });
});    
});    
</script>
@endsection --}}
{{-- @section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
</script>
<script type="text/javascript">
  var button = document.querySelector('.btnLike');
  let  likeToggle = {{ $likeToggle }};
  button.onclick = function ( event ) {
    event.preventDefault();
    $.ajax({
      type: 'post',
        url: '{{ route("add.like.post")  }}',
        headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 },
        data: { '_token': $('meta[name="csrf-token"]').attr('content'),
                'data': likeToggle,
              },
        // dataType: 'json',
        success: function( data ){
            console.log('true');
          },
          error: function( data ){
          console.log('false');
        }
    });
};
    
</script>
@endsection --}}