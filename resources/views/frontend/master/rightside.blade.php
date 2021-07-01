<div id="sidebar">
    <div class="widget_nostyle">
        <ul class="sponsors">
            <li><a href="#"><img src="css/images/cc_260x120_v3.gif" alt="" /></a></li>
            <li><a href="#"><img src="css/images/aj_125x125_v4.gif" alt="" /></a></li>
            <li><a href="#"><img src="css/images/tf_125x125_v5.gif" alt="" /></a></li>
        </ul>
        <div class="clear"></div>
    </div>
    <div class="widget">
        <div id="tabs">
            <ul id="tab-items">
                <li><a href="#tab-one">Popular</a></li>
                <li><a href="#tab-two">Recent</a></li>
                <li><a href="#tab-three">Comments</a></li>
                <li><a href="#tab-four">Tags</a></li>
            </ul>
            <div class="tabs-inner">
                <div id="tab-one"  class="tab">
                    <ul>
                        @foreach($populers as $populer)
                        <li>
                            <div class="tab-thumb"> <a class="thumb" href="{{route('post',$populer->url)}}"><img width="45" height="45" alt=""  src="{{asset($populer->thumbimg)}}" /></a></div>
                            <h3 class="entry-title"><a class="title" href="{{route('post',$populer->url)}}">{{\Illuminate\Support\Str::words($populer->title,10)}}</a></h3>
                            <div class="entry-meta entry-header"> <span class="published">{{$populer->created_at->format('M d Y')}}</span> <span class="seperator">,</span> <span class="comment_number"> <a href="#">21 Comments</a> </span> </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="tab tab-recent" id="tab-two">
                    <ul>
                        @foreach($recents as $recent)
                        <li>
                            <div class="tab-thumb"> <a class="thumb" href="{{route('post',$recent->url)}}"><img width="45" height="45" alt=""  src="{{asset($recent->thumbimg)}}" /></a></div>
                            <h3 class="entry-title"><a class="title" href="{{route('post',$recent->url)}}">{{\Illuminate\Support\Str::words($recent->title,10)}}</a></h3>
                            <div class="entry-meta entry-header"> <span class="published">{{$recent->created_at->format('M d Y')}}</span> <span class="seperator">,</span> <span class="comment_number"> <a href="#">3 Comments</a> </span> </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="tab tab-comments" id="tab-three">
                    <ul>
                        <li class="clearfix"> <a href="#"><img width="45" height="45" class="avatar" src="post-images/dropbox_thumb.jpg" alt="" /></a> <span><a href="#"><b>Lady Gaga</b>: Nullam id dolor id nibh ultricies vehicula ut id elit....</a></span> </li>
                        <li class="clearfix"> <a href="#"><img width="45" height="45" class="avatar" src="post-images/dropbox_thumb.jpg" alt="" /></a> <span><a href="#"><b>Nicholas Cage</b>: Nullam id dolor id nibh ultricies vehicula ut id elit. Curabitur bland...</a></span> </li>
                        <li class="clearfix"> <a href="#"><img width="45" height="45" class="avatar" src="post-images/dropbox_thumb.jpg" alt="" /></a> <span><a href="#"><b>A.R Rahman</b>: Sed posuere consectetur est at lobortis. Aenean eu Pellentes...</a></span> </li>
                        <li class="clearfix"> <a href="#"><img width="45" height="45" class="avatar" src="post-images/dropbox_thumb.jpg" alt="" /></a> <span><a href="#"><b>Tiger Woods</b>: Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget ...</a></span> </li>
                        <li class="clearfix"> <a href="#"><img width="45" height="45" class="avatar" src="post-images/dropbox_thumb.jpg" alt="" /></a> <span><a href="#"><b>Admin</b>: Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget ...</a></span> </li>
                    </ul>
                </div>
                <div class="tab tab-tags clearfix" id="tab-four">
                    @foreach($tags as $tag)
                        <a  href="{{route('tag',$tag->url)}}">{{$tag->name}}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="widget">
        <h2 class="title clearfix"><span>My Linkedin Profile</span></h2>
        <div class="widget-content">
            <div class="LI-profile-badge"  data-version="v1" data-size="medium" data-locale="en_US" data-type="vertical" data-theme="dark" data-vanity="eahoque"><a class="LI-simple-link" href='https://bd.linkedin.com/in/eahoque?trk=profile-badge'>Amdadul Hoque</a></div>
        </div>
    </div>
    <div class="widget">
        <h2 class="title clearfix"><span>Video widget</span></h2>
        <div class="widget-content">
            <iframe width="252" height="142" src="https://www.youtube.com/embed/edndn1dXcQY" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>
</div>
<div class="clear"></div>
