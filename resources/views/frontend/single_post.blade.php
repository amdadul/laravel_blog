@extends('frontend.master')

@section('title')
    {{$post->title}}
@endsection

@section('content')
    <div id="outer-wrapper">
        <div id="content-wrapper">
            <div id="inner-content">
                <div id="entry">
                    <div id="post-top">
                        <h3 id="post-title">{{$post->title}}</h3>
                        <div class="post-meta"> <span class="author">Posted by <a href="#">{{$post->user->name}}</a></span><span class="posting-date">{{$post->created_at->format('d M Y')}}</span><span class="label"><a href="#">{{$post->category->name}}</a> </span> <span class="print"><a onclick="window.print()" href="#">Print</a></span> </div>
                    </div>
                    <div class="entry-content">
                        <img src="{{asset($post->image)}}" style="width: 100%" alt="" />
                        {!! $post->longdesc !!}
                        <div class="social_sharing_post"> <a href="#" class="twitter"> Twitter</a> <a href="#" class="facebook">Facebook</a> <a href="#" class="stumble">Stumble Upon</a> <a href="#" class="digg">Digg It!</a> <a href="#" class="delicious">Del.ici.ous</a></div>
                    </div>
                    <div id="related_posts" class="clearfix">
                        <h3><span>Related posts</span></h3>
                        <ul>
                            @foreach($relateds as $related)
                            <li>
                                <div class="thumb"><a href="{{route('post',$related->url)}}"><img src="{{asset($related->thumbimg)}}" alt=""/></a></div>
                                <div class="heading-container">
                                    <h4 class="post_title"><a href="{{route('post',$related->url)}}">{{\Illuminate\Support\Str::words($related->title,8)}}</a></h4>
                                    <span class="line"></span> <span class="comment_number">3 comments</span> </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div id="comments">
                    <h3>13 Comments on "Lorem ipsum dolor sit amet consectetuer adipiscing elit"</h3>
                    <ol>
                        <li>
                            <div class="line"></div>
                            <div class="image"> <a href="#"><img alt="" src="css/images/gravatar.jpg" /></a></div>
                            <div class="details">
                                <div class="name"> <span class="author"><a href="#">JDsans</a></span> <span class="comment-date">June 5, 2011 at 4:32pm </span> </div>
                                <p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Nulla vitae elit libero, a pharetra augue. Sed posuere consectetur est at lobortis. Nullam id dolor id nibh ultricie</p>
                            </div>
                            <span class="reply"><a href="#">Reply</a></span>
                            <ul>
                                <li>
                                    <div class="line"></div>
                                    <div class="image"> <a href="#"><img alt="" src="css/images/gravatar.jpg" /></a></div>
                                    <div class="details">
                                        <div class="name"> <span class="author"><a href="#">JDsans</a></span> <span class="comment-date">June 5, 2011 at 4:32pm </span> </div>
                                        <p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                                    </div>
                                    <span class="reply"><a href="#">Reply</a></span>
                                    <ul>
                                        <li>
                                            <div class="line"></div>
                                            <div class="image"> <a href="#"><img alt="" src="css/images/gravatar.jpg" /></a></div>
                                            <div class="details">
                                                <div class="name"> <span class="author"><a href="#">JDsans</a></span> <span class="comment-date">June 5, 2011 at 4:32pm </span> </div>
                                                <p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                                            </div>
                                            <span class="reply"><a href="#">Reply</a></span> </li>
                                        <li>
                                            <div class="line"></div>
                                            <div class="image"> <a href="#"><img alt="" src="css/images/gravatar.jpg" /></a></div>
                                            <div class="details">
                                                <div class="name"> <span class="author"><a href="#">JDsans</a></span> <span class="comment-date">June 5, 2011 at 4:32pm </span> </div>
                                                <p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                                            </div>
                                            <span class="reply"><a href="#">Reply</a></span> </li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="line"></div>
                                    <div class="image"> <a href="#"><img alt="" src="css/images/gravatar.jpg" /></a></div>
                                    <div class="details">
                                        <div class="name"> <span class="author"><a href="#">JDsans</a></span> <span class="comment-date">June 5, 2011 at 4:32pm </span> </div>
                                        <p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                                    </div>
                                    <span class="reply"><a href="#">Reply</a></span> </li>
                                <li>
                                    <div class="line"></div>
                                    <div class="image"> <a href="#"><img alt="" src="css/images/gravatar.jpg" /></a></div>
                                    <div class="details">
                                        <div class="name"> <span class="author"><a href="#">JDsans</a></span> <span class="comment-date">June 5, 2011 at 4:32pm </span> </div>
                                        <p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                                    </div>
                                    <span class="reply"><a href="#">Reply</a></span> </li>
                            </ul>
                        </li>
                        <li>
                            <div class="line"></div>
                            <div class="image"> <a href="#"><img alt="" src="css/images/gravatar.jpg" /></a></div>
                            <div class="details">
                                <div class="name"> <span class="author"><a href="#">JDsans</a></span> <span class="comment-date">June 5, 2011 at 4:32pm </span> </div>
                                <p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Nulla vitae elit libero, a pharetra augue. Sed posuere consectetur est at lobortis. Nullam id dolor id nibh ultricie</p>
                            </div>
                            <span class="reply"><a href="#">Reply</a></span> </li>
                        <li>
                            <div class="line"></div>
                            <div class="image"> <a href="#"><img alt="" src="css/images/gravatar.jpg" /></a></div>
                            <div class="details">
                                <div class="name"> <span class="author"><a href="#">JDsans</a></span> <span class="comment-date">June 5, 2011 at 4:32pm </span> </div>
                                <p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Nulla vitae elit libero, a pharetra augue. Sed posuere consectetur est at lobortis. Nullam id dolor id nibh ultricie</p>
                            </div>
                            <span class="reply"><a href="#">Reply</a></span> </li>
                        <li>
                            <div class="line"></div>
                            <div class="image"> <a href="#"><img alt="" src="css/images/gravatar.jpg" /></a></div>
                            <div class="details">
                                <div class="name"> <span class="author"><a href="#">JDsans</a></span> <span class="comment-date">June 5, 2011 at 4:32pm </span> </div>
                                <p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Nulla vitae elit libero, a pharetra augue. Sed posuere consectetur est at lobortis. Nullam id dolor id nibh ultricie</p>
                            </div>
                            <span class="reply"><a href="#">Reply</a></span> </li>
                    </ol>
                    <div class="clear"></div>
                    <div id="respond">
                        <h3>Leave a Comment</h3>
                        <form action="#">
                            <p>
                                <label>Name<span class="star">*</span></label>
                                <input type="text" name="author" value="Your name" />
                            </p>
                            <p>
                                <label>Email<span class="star">*</span></label>
                                <input type="text" name="email" value="" />
                            </p>
                            <p>
                                <label>Website</label>
                                <input type="text" name="url" value="" />
                            </p>
                            <p>
                                <label>Message<span class="star">*</span></label>
                                <textarea rows="10" cols="73" name="message"></textarea>
                            </p>
                            <p class="submit">
                                <input type="submit" value="Submit" class="btn" name="submit" />
                            </p>
                        </form>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            @include('frontend.master.rightside')
        </div>
    </div>
@endsection
