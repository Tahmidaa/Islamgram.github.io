@extends('layouts.app')

@section('content')
<div class="container">
               <form class="bg-success w-100;">
                <div class="row justify-content-center text-white pt-2">
                    <h1>Feed</h1>
                </div>
                </form>
                
    @foreach($posts as $post)
        <div class="row pt-4">
            <div class="col-6 offset-3 ">
                   
                     <a href="/profile/{{ $post->user->id }}">
                    <img src="/storage/{{ $post->image }}" class="w-100">
                </a>
            </div>
        </div>
        <div class="row pt-2 pb-4">
            <div class="col-6 offset-3">
                <div>
                    <p>
                    <span class="font-weight-bold">
                    <img src="{{ $post->user->profile->profileImage() }}" class=" rounded-circle " style="max-width:30px">
                        <a href="/profile/{{ $post->user->id }}">
                            <span class="text-dark">{{ $post->user->username }}: </span>
                        </a>
                    </span> {{ $post->caption }}
                
                   
                    </p>
                </div>
            </div>
        </div>

        
    @endforeach
    
        
</div>
@endsection