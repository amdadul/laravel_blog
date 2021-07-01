<div id="footer"> <span id="Scroll"><a href="#">&uarr;</a></span>
    <div id="footer_inner">
        <div class="columns">
            <div class="widget">
                <h6>About Us</h6>
                <p>Lorem ipsum dolor sit consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
                <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla consequat massa quis enim.</p>
                <p>Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
            </div>
            <div class="clear"></div>
        </div>
        <div class="columns">
            <div class="widget">
                <h6>My Flickr</h6>
                <div class="flickr">
                    <div> <a href="#"><img alt="" src="flickr/blaclbeard.jpg" /></a></div>
                    <div> <a href="#"><img alt="" src="flickr/robo.jpg" /></a></div>
                    <div> <a href="#"><img alt="" src="flickr/greenlantern.jpg" /></a></div>
                    <div class="last"> <a href="#"><img alt="" src="flickr/grey_matter_2.jpg" /></a></div>
                    <div> <a href="#"><img alt="" src="flickr/grey_matter_1.jpg" /></a></div>
                    <div> <a href="#"><img alt="" src="flickr/will_be_back.jpg" /></a></div>
                    <div> <a href="#"><img alt="" src="flickr/shot.jpg" /></a></div>
                    <div class="last"> <a href="#"><img alt="" src="flickr/vector.jpg" /></a></div>
                    <div> <a href="#"><img alt="" src="flickr/ribbon.jpg" /></a></div>
                    <div> <a href="#"><img alt="" src="flickr/workin.jpg" /></a></div>
                    <div> <a href="#"><img alt="" src="flickr/mj.jpg" /></a></div>
                    <div class="last"> <a href="#"><img alt="" src="flickr/blaclbeard.jpg" /></a></div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="columns">
            <div class="widget">
                <h6>Recent Posts</h6>
                <ul class="recent_posts">
                    @foreach($posts as $post)
                    <li class="clearfix">
                        <h3 class="title"><a href="{{route('post',$post->id)}}">{{\Illuminate\Support\Str::words($post->title,10)}}</a></h3>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="clear"></div>
        </div>
        <div class="columns" style="width:15% !important;">
            <div class="widget">
                <h6>Quick links</h6>
                <ul class="quick_links">
                    <li><a href="#">World news</a></li>
                    <li><a href="#">Science</a></li>
                    <li><a href="#">Entertainment</a></li>
                    <li><a href="#">Technology</a></li>
                    <li><a href="#">Helth</a></li>
                    <li><a href="#">Business</a></li>
                    <li><a href="#">Sports</a></li>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <div class="footer_bottom">
            <ul class="footer_menu">
                <li><a href="#">Home</a> /</li>
                <li><a href="#">About</a> /</li>
                <li><a href="#">Contact</a> /</li>
                <li><a href="#">Licensing</a></li>
            </ul>
            <p>&copy; Copyright 2011. All rights reserved. Template by <a target="_blank" href="http://www.bloggerzbible.com">Jdsans</a></p>
        </div>
    </div>
</div>
</div>
</body>
</html>
