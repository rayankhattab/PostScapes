@extends('layouts.app')

@section('content')
<div class="flex justify-center">
  <div class="w-4/12 bg-white py-8 px-6 shadow rounded-lg sm:px-10 ">
    <form action="{{route('register')}}" method="post" class="mb-0 space-y-6 ">
      @csrf
      <div>
        <label for="name" class="block text-sm font-medium mb-1">Name</label>
        <input type="text" name="name" id="name" placeholder="Your Name" autocomplete="off" value="{{old('name')}}"
          class="w-full shadow-sm border-hunter rounded-lg focus:border-darkpink focus:ring-lightpink @error('name') border-lightpink border-2 @enderror">
        @error('name')
        <div class="text-lightpink mt-2 text-sm font-semibold">
          {{$message}}
        </div>
        @enderror
      </div>
      <div>
        <label for="username" class="block text-sm font-medium mb-1">Username</label>
        <input type="text" name="username" id="username" placeholder="Your Username" autocomplete="off"
          value="{{old('username')}}"
          class="w-full shadow-sm border-hunter rounded-lg focus:border-lightpink focus:ring-lightpink @error('username') border-lightpink border-2 @enderror">
        @error('username')
        <div class="text-lightpink mt-2 text-sm font-semibold">
          {{$message}}
        </div>
        @enderror
      </div>
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
      <div>
        <label for="password" class="block text-sm font-medium mb-1">Confirm Password</label>
        <input type="password" name="password_confirmation" id="password" placeholder="Repeat your password"
          autocomplete="off" value=""
          class="w-full shadow-sm border-hunter rounded-lg focus:border-lightpink focus:ring-lightpink">
      </div>
      <div>
        <button type="submit" class="bg-darkpink text-white px-4 py-3 rounded font-medium w-full">Register</button>
      </div>
    </form>
  </div>

</div>

@endsection