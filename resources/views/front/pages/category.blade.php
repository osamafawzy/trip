@extends('front.layouts.master')
@section('title')
    IceTrips | {{$category->title}}
@endsection
@section('breadcrumbs')

    <div class="page-title-container">
        <div class="container">
            <div class="page-title pull-left">
                <h2 class="entry-title">{{$category->title}}</h2>
            </div>
            <ul class="breadcrumbs pull-right">
                <li><a href="{{url('/home')}}">HOME</a></li>
                @if($category->category_id == null)
                <li><a href="{{url('/home/'.$category->url_slug)}}">{{$category->title}}</a></li>
                @else
                    <li><a href="{{url('/home/'.\App\Models\Category::find($category->category_id)->url_slug)}}">{{\App\Models\Category::find($category->category_id)->title}}</a></li>
                <li class="active"> {{$category->title}}</li>
                @endif
            </ul>
        </div>
    </div>

@endsection

@section('content')

    <section id="content">
        <div class="container">
            <div id="main">
                <div class="row add-clearfix image-box style1 tour-locations">
                    @foreach($trips as $trip)
                    <div class="col-sm-6 col-md-4">
                        <article class="box">
                            <figure>
                                <a href="{{url('home/trip/'.$category->url_slug.'/'.$trip->url_slug)}}" class="hover-effect">
                                    <img src="{{Request::root()}}/public/uploads/trip/cover/{{$trip->photo}}" alt="">
                                </a>
                            </figure>
                            <div class="details">
                                <span class="price">${{$trip->price}}</span>
                                <h4 class="box-title">{{$trip->title}}</h4>
                                <hr>

                                <a href="{{url('home/'.$trip->url_slug.'/book')}}" class="button btn-small full-width">BOOK NOW</a>
                            </div>
                        </article>
                    </div>
                    @endforeach
                    {{--<div class="col-sm-6 col-md-4">--}}
                        {{--<article class="box">--}}
                            {{--<figure>--}}
                                {{--<a href="#" class="hover-effect">--}}
                                    {{--<img src="{{ asset('assets/front/images/trips/2.jpg') }}" alt="">--}}
                                {{--</a>--}}
                            {{--</figure>--}}
                            {{--<div class="details">--}}
                                {{--<span class="price">$534</span>--}}
                                {{--<h4 class="box-title">Italy Family Tour</h4>--}}
                                {{--<hr>--}}

                                {{--<a href="#" class="button btn-small full-width">BOOK NOW</a>--}}
                            {{--</div>--}}
                        {{--</article>--}}
                    {{--</div>--}}
                    {{--<div class="col-sm-6 col-md-4">--}}
                        {{--<article class="box">--}}
                            {{--<figure>--}}
                                {{--<a href="#" class="hover-effect">--}}
                                    {{--<img src="{{ asset('assets/front/images/trips/3.jpg') }}" alt="">--}}
                                {{--</a>--}}
                            {{--</figure>--}}
                            {{--<div class="details">--}}
                                {{--<span class="price">$718</span>--}}
                                {{--<h4 class="box-title">Chicago Long Tour</h4>--}}
                                {{--<hr>--}}

                                {{--<a href="#" class="button btn-small full-width">BOOK NOW</a>--}}
                            {{--</div>--}}
                        {{--</article>--}}
                    {{--</div>--}}

                </div>
                <a href="#" class="button btn-large full-width uppercase">Load More Packages</a>
            </div>
        </div>
    </section>

@endsection

