@extends('layouts.app')

@section('content')
<div class="flex justify-center">
  <div class="w-4/12 bg-white py-8 px-6 shadow rounded-lg sm:px-10 ">
    @if (session('status'))
    <div class="bg-lightpink py-4 px-2 shadow rounded-lg text-center text-white">
      {{ session ('status') }}
    </div>
    @endif

    <form action="{{route('login')}}" method="post" class="mb-0 space-y-6 ">
      @csrf
      <div>
        <label for="email" class="block text-sm font-medium mb-1">Email</label>
        <input type="text" name="email" id="email" placeholder="Your Email" autocomplete="off" value="{{old('email')}}"
          class="w-full shadow-sm border-hunter rounded-lg focus:border-lightpink focus:ring-lightpink @error('email') border-lightpink border-2 @enderror">
        @error('email')
        <div class="text-lightpink mt-2 text-sm font-semibold">
          {{$message}}
        </div>
        @enderror
      </div>
      <div>
        <label for="password" class="block text-sm font-medium mb-1">Password</label>
        <input type="password" name="password" id="password" placeholder="Your Password" autocomplete="off" value=""
          class="w-full shadow-sm border-hunter rounded-lg focus:border-lightpink focus:ring-lightpink @error('password') border-lightpink border-2 @enderror">
        @error('password')
        <div class="text-lightpink mt-2 text-sm font-semibold">
          {{$message}}
        </div>
        @enderror
      </div>
      <div class="mb-4">
        <div class="flex items-center">
          <input type="checkbox" name="remember" id="remember"
            class="mr-2 bg-hunter border-hunter focus:ring-1 focus:ring-darkhunter h-4 w-4 rounded checked:bg-hunter checked:border-hunter focus:outline-none text-darkhunter"
            checked>
          <label for="remember" class=" text-base mb-1">Remember me</label>
        </div>
      </div>

      <div>
        <button type="submit" class="bg-darkpink text-white px-4 py-3 rounded font-medium w-full">Login</button>
      </div>
    </form>
  </div>

</div>

@endsection