<!--layouts. 的 . 代表資料夾-->
@extends('layouts.app')

@section('page_title')
<section class="page-title">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="text-uppercase">Category Admin table</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a>
                            </li>

                            <li class="breadcrumb-item active">Category Admin table</li>
                        </ol>
                    </div>
                </div>
            </div>
</section>
@endsection

@section('content')
<section class="body-content ">

    <div class="page-content">
        <div class="container">
            <div class="toolbox">
            <a href="/categories/create" class="btn btn-primary">create category</a>
            </div>
            
            <ul class="list-group">
                @foreach ($categories as $key=>$category)
                    <li  class="list-group-item clearfix">
                        <div class="float-left">
                            <div class="name">{{$category->name}}</div>

                          

                        </div>


                        <span class="float-right">
                            <a href="/categories/show/{{$category->id}}"class="btn btn-primary">View</a>
                            <a href="/categories/{{$category->id}}/edit" class="btn btn-primary">Edit</a>
                            <button class="btn btn-danger" onclick="deleteCategory({{$category->id}})">Delete</button>
                        </span>
                    </li>    
                @endforeach

            </ul>

    </div>
    </div>


</section>
@endsection

@section('script')

<script>



</script>

@endsection
            