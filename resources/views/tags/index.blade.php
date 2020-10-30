<!--layouts. 的 . 代表資料夾-->
@extends('layouts.app')

@section('page_title')
<section class="page-title">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="text-uppercase">Tag Admin table</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a>
                            </li>

                            <li class="breadcrumb-item active">Tag  Admin table</li>
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

            
            <ul class="list-group">
                @foreach ($tags as $key=>$tag)
                    <li  class="list-group-item clearfix">
                        <div class="float-left">
                            <div class="name">{{$tag->name}}</div>

                          

                        </div>


                        <span class="float-right">
                            <button class="btn btn-danger" onclick="deleteTag({{$tag->id}})">Delete</button>
                            
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
            