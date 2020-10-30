@php
use App\Category;
use App\Tag;
use App\Post;
use App\Comment;

$categories= Category::all();
$tags =Tag::has('posts')->withCount('posts')->orderBy('posts_count','desc')->get();
$latesPosts = Post::orderBy('created_at','desc')->take(3)->get();
$latesComments = Comment::orderBy('created_at','desc')->take(4)->get();

@endphp
                    <!--latest post widget-->
                    <div class="widget">
                        <div class="heading-title-alt text-left heading-border-bottom">
                            <h6 class="text-uppercase">latest post</h6>
                        </div>
                        <ul class="widget-latest-post">
                            @foreach($latesPosts as $key=>$post)
                            <li>
                                <div class="thumb">
                                    <a href="/posts/{{$post->id}}">
                                        @if($post->thumbnail)
                                        <img src="{{$post->thumbnail}}" alt="thumbnail" />
                                        @else
                                        <img src="/assets/img/post/p12.jpg" alt="預設圖片" /><!--預設圖片-->
                                        @endif
                                    </a>
                                </div>
                                <div class="w-desk">
                                    <a href="#">{{$post->title}}</a>
                                    {{$post->created_at->format('F d, Y')}}
                                </div>
                            </li>
                            @endforeach
 
                        </ul>
                    </div>
                    <!--latest post widget-->



                    <!--category widget-->
                    <div class="widget">
                        <div class="heading-title-alt text-left heading-border-bottom">
                            <h6 class="text-uppercase">category</h6>
                        </div>
                        <ul class="widget-category">
                            @foreach ($categories as $key =>$category)
                                <li><a href="/posts/category/{{$category->id}}">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <!--category widget-->

                    <!--comments widget-->
                    <div class="widget">
                        <div class="heading-title-alt text-left heading-border-bottom">
                            <h6 class="text-uppercase">Latest comments </h6>
                        </div>
                        <ul class="widget-comments">
                        @foreach ($latesComments as $key => $comment)
                        <li>{{$comment->name}} on <a href="/posts/{{$comment->post->id}}">{{$comment->post->title}} </a>
                            </li>
                        @endforeach


                        </ul>
                    </div>
                    <!--comments widget-->

                    <!--tags widget-->
                    <div class="widget">
                        <div class="heading-title-alt text-left heading-border-bottom">
                            <h6 class="text-uppercase">tag cloud</h6>
                        </div>
                        <div class="widget-tags">
                                @foreach ($tags as $key =>$tag)
                                <a href="/posts/tag/{{$tag->id}}">{{$tag->name}}</a>                                      
                                @endforeach
                        </div>
                    </div>
                    <!--tags widget-->