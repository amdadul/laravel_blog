
<div id="slider-wrapper">
    <div id="slider" class="nivoSlider" >
        @foreach($slider as $slide)
            <a href="{{$slide->url}}" ><img style="width: 640px; height: 350px;" src="{{$slide->image}}" alt="{{$slide->alt}}" rel="{{$slide->image}}"  /></a>
        @endforeach
    </div>
    <div class="clear"></div>
</div>
