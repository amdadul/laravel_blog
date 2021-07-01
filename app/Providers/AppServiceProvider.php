<?php

namespace App\Providers;

use App\Category;
use App\Post;
use App\Slider;
use App\Tag;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('frontend.master.header', function ($menu)
        {
            $data['categories'] = Category::where('status','active')->get();
            $menu->with($data);
        });

        view()->composer('frontend.master.footer', function ($recent)
        {
            $data['posts'] = Post::orderBy('id','desc')->take(5)->get();
            $recent->with($data);
        });

        view()->composer('frontend.master.rightside',function ($side)
        {
           $data['populers'] = Post::orderBy('hit','desc')->take(10)->get();
           $data['recents'] = Post::orderBy('id','desc')->take(5)->get();
           $data['comments'] = Post::orderBy('id','desc')->take(5)->get();
           $data['tags'] = Tag::orderBy('id','desc')->take(15)->get();
           $side->with($data);
        });

        view()->composer('frontend.master.slider', function ($slide)
        {
            $data['slider'] = Slider::orderBy('position','asc')->get();
            $slide->with($data);
        });
    }
}
