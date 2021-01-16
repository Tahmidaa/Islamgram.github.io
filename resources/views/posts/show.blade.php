@extends('layouts.app')


@section('content')



<div class="container">
    <div class="row">
        <div class="col-5">
            <img src="/storage/{{ $post->image }}" class=" rounded-circle w-100">
        </div>
        <div class="col-2 ">
            <div>
              
              <div class="d-flex align-items-center pr-5">

                    <div class= "pr-2">
                      <img src="{{ $post->user->profile->profileImage() }}" class=" rounded-circle w-100" style="max-width:30px">
                    </div>

                    <div>
                    <div class="font-weight-bold pt-2"><a href="/profile/{{ $post->user->id}}"><span class="text-dark">{{ $post->user->username}}</span></a>
                    
                   
                    
                    

                    </div>
                    </div>
              
              </div>

              
              <hr>
              
               <div class="pr-2">{{$post->caption}}</div>
               
        </div>
    </div>
</div> 
@endsection

   
   
   
   
