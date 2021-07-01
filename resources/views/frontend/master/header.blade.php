<div id="container_wrapper">
<div id="header">
    <div id="header-top" style="margin: 0px; padding-top:0px;height: 80px;">
        <h2 id="logo" style="margin: 20px 0 0 0px;"><a href="#"></a></h2>
        <form method="get" id="searchform" action="#" name="searchform" style="top: 30px;">
            <input type="text" class='rounded text_input' value="" name="s" id="s" />
            <input type="submit" class="button ie6fix" id="searchsubmit" value="&rarr;" />
        </form>
    </div>
    <div id="header-bottom">
        <div class="category-container">
            <ul class="sf-menu">
                <li><a href="#">Home</a></li>
                <li><a href="#">World news</a></li>
                <li><a href="#">Sports</a></li>
                <li> <a href="#">Category</a>
                    <ul>
                        @foreach($categories as $category)
                        <li><a href="{{route('category',$category->url)}}">{{$category->name}}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="#">Entertainment</a></li>
                <li><a href="#">Health</a></li>
                <li><a href="#">Weather</a></li>
            </ul>
        </div>
        <div class="subscriber_widget"> <span class="twitter_count"><a href="#">2552 followers</a></span> <span class="feed"><a href="#">1453 Subscribers</a></span> <span class="email"><a href="#">Subscribe via email</a></span> </div>
    </div>
</div>
<div id="outer-wrapper">
