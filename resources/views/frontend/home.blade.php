@extends('frontend.master')

@section('title')
    হোম
@endsection



@section('content')
    @include('frontend.master.slider')
<div class="clear"></div>
<div id="featured">
    <h4 id="featured-title"><span>Featured</span></h4>
    <div id="featured_slider" style="position:relative; overflow:hidden;">

      @foreach($featured as $k=>$post)
          @if($k==0|$k%5==0)
         <div class="item" >
          @endif
                <div class="column ">
                    <div class="inner">
                        <div class="image"> <a href="{{route('post',$post->url)}}"><img alt="" src="{{asset($post->thumbimg)}}" /></a></div>
                        <h3><a href="{{route('post',$post->url)}}">{!! \Illuminate\Support\Str::words($post->shortdesc,10) !!}</a></h3>
                    </div>
                </div>
             @if(($k+1)%5==0)
             <div class="clear"></div>
         </div>
            @endif
      @endforeach
    </div>
    <div class="nav_controls">
        <div id="featured_slider_prev"><a href="#">‹‹ Previous</a></div>
        <div id="featured_slider_next"><a href="#">Next ››</a></div>
    </div>
    <div class="clear"></div>
</div>
<div id="content-wrapper">
    <div id="inner-content">
        <div id="category_sort" class="clearfix">
            <div class="column">
                <h4><span>Technology</span></h4>
                <ul>
                    <li><a href="#">Scientists use inkjet printing to produce solar cells</a></li>
                    <li><a href="#">iPhone 5 delay, Android fears drag Apple stock</a></li>
                    <li><a href="#">Panasonic unveils stereo headset</a></li>
                    <li><a href="#">Google Chrome OS has security holes</a></li>
                    <li><a href="#">Nokia shuts down online stores</a></li>
                </ul>
            </div>
            <div class="column">
                <h4><span>Hot on Web</span></h4>
                <ul>
                    <li><a href="#">Google Launches Its Google+ Social Networking Service</a></li>
                    <li><a href="#">World of Warcraft offered 'free'</a></li>
                    <li><a href="#">Skype rolls out free app for Android phones</a></li>
                    <li><a href="#">PayPal Predicts The End of the Wallet By 2015</a></li>
                    <li><a href="#">Apple iPad now has over 100,000 apps</a></li>
                </ul>
            </div>
            <div class="column">
                <h4><span>Entertainment</span></h4>
                <ul>
                    <li><a href="#">Spacey's Richard III wows critics</a></li>
                    <li><a href="#">Maria Sharapova returns to Wimbledon final</a></li>
                    <li><a href="#">Beyonce's debut brings curtain down on Glastonbury</a></li>
                    <li><a href="#">Mike Tyson in Big Brother?</a></li>
                    <li><a href="#">Justin Timberlake to promote MySpace</a></li>
                </ul>
            </div>
        </div>
        <div id="double_container">
            <h4 class="cont-title"><span>Some more posts</span></h4>
            @foreach($posts as $post)
                <div class="post_double">
                <h4 class="post_title"><a href="{{route('post',$post->url)}}">{{$post->title}}</a><span class="comment_bubble"><a href="#">21</a></span></h4>
                <div class="post_content clearfix">
                    <div class="thumbnail"> <a href="{{route('post',$post->url)}}"><img src="{{$post->thumbimg}}" alt="" /></a></div>
                    <div class="summary_article">
                        <p>{!! \Illuminate\Support\Str::words($post->longdesc,30) !!}</p>
                    </div>
                </div>
                <span class="read_more"><a href="{{route('post',$post->url)}}">More...</a></span> </div>
            @endforeach
            <div class="clear"></div>

            <div class="pagenavi clearfix" style="float: right;">

                {{ $posts->links('vendor.pagination.custom') }}

            </div>
        </div>
    </div>
    <div id="sidebar">
        <div class="widget_nostyle">
            <ul class="sponsors">
                <li><a href="#"><img src="css/images/cc_260x120_v3.gif" alt="" /></a></li>
                <li><a href="#"><img src="css/images/aj_125x125_v4.gif" alt="" /></a></li>
                <li><a href="#"><img src="css/images/tf_125x125_v5.gif" alt="" /></a></li>
            </ul>
            <div class="clear"></div>
        </div>
        @include('frontend.master.rightside')

    </div>
    <div class="clear"></div>
</div>
</div>
@endsection
