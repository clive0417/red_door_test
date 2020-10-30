@php
    $isCreate = request()->is('*create');
    $actionUrl = ($isCreate)? '/categories' :'/categories/'.$category->id;
@endphp       
        @if ($errors->any())    
            <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $key => $error) 
                    <li>{{$error}}</li>

                
                @endforeach
            </ul>
            </div>
        @endif
        <form method="post" action="{{$actionUrl}}">

            <!--@csrf 塞 session token 去跨過csrf -->
            @csrf
            @if(!$isCreate) 
            <!--傳統HTML只支持，post/get 不支持put/delete laravel 要特別加 -->
            <input type="hidden" name="_method" value="put">
            @endif

            <div class="form-group">
                <label>Name</label>
                <input  name="name" class="form-control"  value="{{$category->name}}">
            </div>
            <div class="form-group">


            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-default" onclick="window.history.back()">cancel</button>
        </form>