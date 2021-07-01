<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>@yield('title') | হন্টক'স ব্লগ</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link rel="stylesheet" media="screen" href="{{asset('assets/fontend/css/superfish.css')}}" type="text/css" />
    <link rel="stylesheet" media="screen" href="{{asset('assets/fontend/css/stylesheet.css')}}" type="text/css" />
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Droid+Serif:regular,italic,bold,bolditalic" type="text/css" />
    <script type="text/javascript" src="{{asset('assets/fontend/js/jquery-1.6.1.min.js')}}"></script>
    <script src="{{asset('assets/fontend/js/hoverIntent.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/fontend/js/superfish.js')}}" type="text/javascript"></script>
    <script type="text/javascript" src="{{asset('assets/fontend/js/jquery-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/fontend/js/custom.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/fontend/js/jquery.animate-shadow.js')}}"></script>
    <script type='text/javascript' src='{{asset('assets/fontend/js/jquery.cycle.all.min.js')}}'></script>
    <script type="text/javascript" src="https://platform.linkedin.com/badges/js/profile.js" async defer></script>
    <script type='text/javascript' src='{{asset('assets/fontend/nivo-slider/jquery.nivo.slider.pack.js')}}'></script>
    <link rel="stylesheet" media="screen" href="{{asset('assets/fontend/nivo-slider/nivo-slider.css')}}" type="text/css" />
    <script type="text/javascript">
        //<![CDATA[
        $(window).load(function () {
            $('#slider').nivoSlider({
                effect: 'boxRandom', // Specify sets like: 'fold,fade,sliceDown'
                slices: 10,
                boxCols: 10, // For box animations
                boxRows: 5, // For box animations
                animSpeed: 1000, // Slide transition speed
                pauseTime: 4500, // How long each slide will show
                startSlide: 0, // Set starting Slide (0 index)
                directionNav: true, // Next & Prev navigation
                directionNavHide: true, // Only show on hover
                controlNav: false, // 1,2,3... navigation
                controlNavThumbs: false, // Use thumbnails for Control Nav
                controlNavThumbsFromRel: false, // Use image rel for thumbs
                pauseOnHover: true, // Stop animation while hovering
            });
        });
        //]]>
    </script>
    <script type="text/javascript">
        //featured slider
        jQuery('#featured_slider').cycle({
            fx: 'scrollHorz',
            speed: 800,
            timeout: 0,
            easing: 'easeInOutQuint',
            next: '#featured_slider_next',
            prev: '#featured_slider_prev'
        });
    </script>
    <style>
        #wrapper {
            margin: 0 auto;
            display: block;
            width: 960px;
        }
        .page-header {
            text-align: center;
            font-size: 1.5em;
            font-weight: normal;
            border-bottom: 1px solid #ddd;
            margin: 30px 0
        }
        #pagination {
            margin: 0;
            padding: 0;
            text-align: center
        }
        #pagination li {
            display: inline
        }
        #pagination li a {
            display: inline-block;
            text-decoration: none;
            padding: 5px 10px;
            color: #000
        }

        /* Active and Hoverable Pagination */
        #pagination li a {
            border-radius: 5px;
            -webkit-transition: background-color 0.3s;
            transition: background-color 0.3s

        }
        #pagination li a.active {
            background-color: #4caf50;
            color: #fff
        }
        #pagination li a:hover:not(.active) {
            background-color: #ddd;
        }

        /* border-pagination */
        .b-pagination-outer {
            width: 100%;
            margin: 0 auto;
            text-align: center;
            overflow: hidden;
            display: flex
        }
        #border-pagination {
            margin: 0 auto;
            padding: 0;
            text-align: center
        }
        #border-pagination li {
            display: inline;

        }
        #border-pagination li a {
            display: block;
            text-decoration: none;
            color: #000;
            padding: 5px 10px;
            border: 1px solid #ddd;
            float: left;

        }
        #border-pagination li a {
            -webkit-transition: background-color 0.4s;
            transition: background-color 0.4s
        }
        #border-pagination li a.active {
            background-color: #4caf50;
            color: #fff;
        }
        #border-pagination li a:hover:not(.active) {
            background: #ddd;
        }
    </style>

</head>
