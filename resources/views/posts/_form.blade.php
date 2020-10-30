@php
    $isCreate = request()->is('*create');
    $actionUrl = ($isCreate)? '/posts' :'/posts/'.$post->id;
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
        <form method="post" action="{{$actionUrl}}" enctype="multipart/form-data">

            <!--@csrf 塞 session token 去跨過csrf -->
            @csrf
            @if(!$isCreate) 
            <!--傳統HTML只支持，post/get 不支持put/delete laravel 要特別加 -->
            <input type="hidden" name="_method" value="put">
            @endif

            <div class="form-group">
                <label>Title</label>
                <input  name="title" class="form-control"  placeholder="title" value="{{$post->title}}">
            </div>
            <div class="form-group">
                <label class="d-block">upload picture thumbnail</label>
                @if ($post->thumbnail)
                    <img width="320px" src="{{$post->thumbnail}}" alt="thumbnail">
                @endif
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" name="thumbnail">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
            </div>

            <div class="form-group">
                <label >Category</label>
                <select class="form-control" name="category_id">
                    <option selected value>Please select a category</option>
                    @foreach ($categories as $key => $category)
                        <option value="{{$category->id}}" @if($post->category_id==$category->id) selected @endif>{{$category->name}}</option>
                    @endforeach
                </select>       
            </div>
            <div class="form-group">
                <label >Tags</label>
                <input type="text" name="tags" class="form-control"  value="{{$post->tagsString()}}">
     
            </div>
            <div class="form-group">
                <label >Content</label>
                <textarea name="content" class="form-control" cols="80" rows="8" >{{$post->content}}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-secondary" onclick="window.history.back()">cancel</button>
        </form>