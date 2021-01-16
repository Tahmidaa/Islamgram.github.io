@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
        
        <div class="col-2 pt-5">
        <img src="{{ $user->profile->profileImage() }}" style="height:160px;width=150px;" class ="rounded-circle w-100">
        
        </div>
        

        
        <div class="col-9 pt-5">
          <div class="d-flex justify-content-between align-items-baseline" >
         
         <div class="d-flex align-items-center pb-3">
         <div class="h4">{{$user ->username}}</div class="">

          <follow-button user-id="{{ $user->id }}" follows="{{$follows}}"></follow-button>
        


            <br>
            
         </div>
                
          
          @can('update', $user->profile)
                    <a href="/p/create" class="btn btn-success btn-sm ">Add New Post</a>
                @endcan


                @can('update', $user->profile)
                <a href="/profile/{{ $user->id }}/edit" class="btn btn-success btn-sm">Edit Profile</a>
            @endcan


            @can('update', $user->profile)
            <form method="post" action="{{ route('user.delete', $user->id) }}">
                     @csrf
                         @method('post')    

                     <button type="submit" class="btn btn-success btn-sm">Delete Profile</button>
                    </form>
                @endcan

          </div>
          

        
        <div class="d-flex">
                <div class="pr-5"><strong>{{$user->posts->count()}}</strong> posts</div>
                <div class="pr-5"><strong>{{ $user->profile->followers->count()}}</strong> followers</div>
                <div class="pr-5"><strong>{{ $user->following->count()}}</strong> following</div>
          
               

          </div>
          <div class="pt-3 font-weight-bold">{{$user->profile->title}}</div>
          <div>{{$user->profile->description}}</div>
          <div><a href="#">{{$user->profile->url}}</a></div>

    </div>
    </div>
        
        
      
          

    <div class="row pt-5">
            @foreach($user->posts as $post)
            <div class="col-4 pb-4">
              <a href="/p/{{$post->id}}">
              <img src="/storage/{{ $post->image }}" class ="rounded w-100" alt="Cinque Terre">

              @can('update', $user->profile)
              <form method="post" action="{{ route('post.delete', $post->id) }}">
                     @csrf
                         @method('post')    

                     <center><button type="submit" class="btn btn-success w-100">Delete</button></center>
                    </form>
                    @endcan
              </a>
            
           </div>
           @endforeach

           </div>
</div>
@endsection
