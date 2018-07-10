@extends('front.layouts.master')
@section('title')
    IceTrips | {{$trip->title}}
@endsection
@section('breadcrumbs')

    <div class="page-title-container">
        <div class="container">
            <div class="page-title pull-left">
                <h2 class="entry-title">{{$trip->title}}</h2>
            </div>
            <ul class="breadcrumbs pull-right">
                <li><a href="{{url('/home')}}">HOME</a></li>
                @if($category->category_id == null)
                    <li><a href="{{url('/home/'.$category->url_slug)}}">{{$category->title}}</a></li>
                @else
                    <li><a href="{{url('/home/'.\App\Models\Category::find($category->category_id)->url_slug)}}">{{\App\Models\Category::find($category->category_id)->title}}</a></li>
                    <li class="active"> {{$category->title}}</li>
                @endif
                <li class="active">{{$trip->title}}</li>
            </ul>
        </div>
    </div>

@endsection

@section('content')

    <section id="content">

        <div class="container tour-detail-page">
            <div class="row">

                <div id="main" class="col-md-9">

                    <h1> {{$trip->title}} </h1>


                    <div class="featured-image">
                        <img src="{{Request::root()}}/public/uploads/trip/cover/{{$trip->photo}}" width="870px" height="442px" alt=""/>
                    </div>

                    <div id="cruise-features" class="tab-container">
                        <ul class="tabs">
                            <li class="active"><a href="#cruise-description" data-toggle="tab">Description</a></li>
                            <li><a href="#cruise-photo" data-toggle="tab">Photo</a></li>
                            <li><a href="#cruise-reviews" data-toggle="tab">Reviews</a></li>
                            <li><a href="#cruise-write-review" data-toggle="tab">Write a Review</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="cruise-description">

                                <div class="intro table-wrapper full-width hidden-table-sms">
                                    <div class="col-sm-6 table-cell">
                                        <div class="icon-box style7 box">
                                            <i class="soap-icon-check-1"></i>
                                            <div class="description">
                                                <h4 class="box-title"><a href="#">Include in the trip </a></h4>
                                                <ul class="circle">
                                                    <li>{!! $trip->include  !!}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 table-cell">
                                        <div class="icon-box style7 box">
                                            <i class="soap-icon-close"></i>
                                            <div class="description">
                                                <h4 class="box-title"><a href="#">Not Include in the trip </a></h4>
                                                <ul class="circle">
                                                    <li>{!! $trip->not_include  !!}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="long-description">
                                           <span class="icon-box style2">
                                              <h2 style="float: right">   Please Note </h2>
                                               <i class="soap-icon-notice "></i>

                                           </span>

                                    <br/><br/>
                                   {!! $trip->note  !!}
                                </div>

                                <hr/>
                                <div class="long-description">
                                           <span class="icon-box style2">
                                              <h2 style="float: right">  Program  </h2>
                                               <i class="soap-icon-plane-right "></i>
                                           </span>

                                    <br/><br/>
                                    {!! $trip->program  !!}
                                </div>

                                <hr/>
                                <div class="long-description">
                                           <span class="icon-box style2">
                                              <h2 style="float: right">  Price   </h2>
                                               <i class="fa fa-money "></i>
                                           </span>

                                    <br/><br/>
                                    ${!! $trip->price  !!}
                                </div>



                            </div>
                            <div class="tab-pane fade" id="cruise-photo">
                                <div class="block">
                                    <h1>Gallery Style 01</h1>
                                    <div id="gallery_style1" class="flexslider photo-gallery style1" data-animation="slide" data-sync="#carousel_style1">
                                        <ul class="slides">
                                            @foreach ($trip->photos as $photo)
                                                <li><img src="{{Request::root()}}/public/uploads/trip/photos/{{$photo->photo}}" alt="" /></li>
                                            @endforeach
                                            {{--<li><img src="http://placehold.it/1170x342" alt="" /></li>--}}
                                            {{--<li><img src="http://placehold.it/1170x342" alt="" /></li>--}}
                                            {{--<li><img src="http://placehold.it/1170x342" alt="" /></li>--}}
                                            {{--<li><img src="http://placehold.it/1170x342" alt="" /></li>--}}
                                            {{--<li><img src="http://placehold.it/1170x342" alt="" /></li>--}}
                                            {{--<li><img src="http://placehold.it/1170x342" alt="" /></li>--}}
                                            {{--<li><img src="http://placehold.it/1170x342" alt="" /></li>--}}
                                            {{--<li><img src="http://placehold.it/1170x342" alt="" /></li>--}}
                                            {{--<li><img src="http://placehold.it/1170x342" alt="" /></li>--}}
                                            {{--<li><img src="http://placehold.it/1170x342" alt="" /></li>--}}
                                            {{--<li><img src="http://placehold.it/1170x342" alt="" /></li>--}}
                                            {{--<li><img src="http://placehold.it/1170x342" alt="" /></li>--}}
                                            {{--<li><img src="http://placehold.it/1170x342" alt="" /></li>--}}
                                            {{--<li><img src="http://placehold.it/1170x342" alt="" /></li>--}}
                                        </ul>
                                    </div>
                                    <div id="carousel_style1" class="flexslider image-carousel style1" data-animation="slide" data-item-width="70" data-item-margin="10" data-sync="#gallery_style1">
                                        <ul class="slides">
                                            @foreach ($trip->photos as $photo)
                                                <li><img src="{{Request::root()}}/public/uploads/trip/photos/{{$photo->photo}}" alt="" /></li>
                                            @endforeach
                                            {{--<li><img src="http://placehold.it/70x70" alt="" /></li>--}}
                                            {{--<li><img src="http://placehold.it/70x70" alt="" /></li>--}}
                                            {{--<li><img src="http://placehold.it/70x70" alt="" /></li>--}}
                                            {{--<li><img src="http://placehold.it/70x70" alt="" /></li>--}}
                                            {{--<li><img src="http://placehold.it/70x70" alt="" /></li>--}}
                                            {{--<li><img src="http://placehold.it/70x70" alt="" /></li>--}}
                                            {{--<li><img src="http://placehold.it/70x70" alt="" /></li>--}}
                                            {{--<li><img src="http://placehold.it/70x70" alt="" /></li>--}}
                                            {{--<li><img src="http://placehold.it/70x70" alt="" /></li>--}}
                                            {{--<li><img src="http://placehold.it/70x70" alt="" /></li>--}}
                                            {{--<li><img src="http://placehold.it/70x70" alt="" /></li>--}}
                                            {{--<li><img src="http://placehold.it/70x70" alt="" /></li>--}}
                                            {{--<li><img src="http://placehold.it/70x70" alt="" /></li>--}}
                                            {{--<li><img src="http://placehold.it/70x70" alt="" /></li>--}}
                                        </ul>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="cruise-reviews">

                                <div class="guest-reviews">
                                    <h2>Guest Reviews</h2>
                                    @foreach($reviews as $review)
                                        <div class="guest-review table-wrapper">
                                            <div class="col-xs-3 col-md-2 author table-cell">
                                                <a href="#"><img src="{{Request::root()}}/assets/front/images/avatar.png" alt="" width="270"
                                                                 height="263"/></a>
                                                <p class="name">Jessica Brown</p>
                                                <p class="date">{{$review->created_at->toFormattedDateString()}}</p>
                                            </div>
                                            <div class="col-xs-9 col-md-10 table-cell comment-container">
                                                <div class="comment-header clearfix">
                                                    <h4 class="comment-title">{{$review->title}}</h4>
                                                    <div class="review-score">
                                                        <input id="input-2" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="0.5" value="{{ $review->averageRating }}" data-size="xs" disabled="">
                                                        {{--<input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5" data-step="0.5" value="0">--}}

                                                    </div>
                                                </div>
                                                <div class="comment-content">
                                                    <p>{{$review->description}}</p>
                                                </div>

                                            </div>
                                        </div>
                                    @endforeach
                                    {{--<div class="guest-review table-wrapper">--}}
                                        {{--<div class="col-xs-3 col-md-2 author table-cell">--}}
                                            {{--<a href="#"><img src="http://placehold.it/270x263" alt="" width="270"--}}
                                                             {{--height="263"/></a>--}}
                                            {{--<p class="name">David Jhon</p>--}}
                                            {{--<p class="date">NOV, 12, 2013</p>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-xs-9 col-md-10 table-cell comment-container">--}}
                                            {{--<div class="comment-header clearfix">--}}
                                                {{--<h4 class="comment-title">First time cruise - FANTASTIC</h4>--}}
                                                {{--<div class="review-score">--}}
                                                    {{--<div class="five-stars-container">--}}
                                                        {{--<div class="five-stars" style="width: 64%;"></div>--}}
                                                    {{--</div>--}}
                                                    {{--<span class="score">3.2/5.0</span>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="comment-content">--}}
                                                {{--<p>Lorem Ipsum is simply dummy text of the printing and typesetting--}}
                                                    {{--industry. Lorem Ipsum has been the industry's stand dummy text ever--}}
                                                    {{--since the 1500s, when an unknown printer took a galley of type and--}}
                                                    {{--scrambled it to make a type specimen book. It has survived not only--}}
                                                    {{--five centuries.</p>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="guest-review table-wrapper">--}}
                                        {{--<div class="col-xs-3 col-md-2 author table-cell">--}}
                                            {{--<a href="#"><img src="http://placehold.it/270x263" alt="" width="270"--}}
                                                             {{--height="263"/></a>--}}
                                            {{--<p class="name">Kyle Martin</p>--}}
                                            {{--<p class="date">NOV, 12, 2013</p>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-xs-9 col-md-10 table-cell comment-container">--}}
                                            {{--<div class="comment-header clearfix">--}}
                                                {{--<h4 class="comment-title">5-day Carnival Inspiration out of Tampa</h4>--}}
                                                {{--<div class="review-score">--}}
                                                    {{--<div class="five-stars-container">--}}
                                                        {{--<div class="five-stars" style="width: 76%;"></div>--}}
                                                    {{--</div>--}}
                                                    {{--<span class="score">3.8/5.0</span>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="comment-content">--}}
                                                {{--<p>Lorem Ipsum is simply dummy text of the printing and typesetting--}}
                                                    {{--industry. Lorem Ipsum has been the industry's stand dummy text ever--}}
                                                    {{--since the 1500s, when an unknown printer took a galley of type and--}}
                                                    {{--scrambled it to make a type specimen book. It has survived not only--}}
                                                    {{--five centuries.</p>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                </div>
                                <a href="#" class="button full-width btn-large">LOAD MORE REVIEWS</a>
                            </div>
                            <div class="tab-pane fade" id="cruise-write-review">

                                <form class="review-form" action="{{url('/home/trip/'.$category->url_slug.'/'.$trip->url_slug)}}" method="post">
                                    {{csrf_field()}}
                                    <div class="form-group col-md-5 no-float no-padding">
                                        <h4 class="title">Title of your review</h4>
                                        <input type="text" name="title" class="input-text full-width" value=""
                                               placeholder="enter a review title"/>
                                    </div>
                                    <div class="form-group">
                                        <h4 class="title">Your review</h4>
                                        <textarea class="input-text full-width" name="description"
                                                  placeholder="enter your review (minimum 200 characters)"
                                                  rows="5"></textarea>
                                    </div>


                                    <label for="input-1" class="control-label">Give a rating for Trip:</label>
                                    <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5" data-step="0.5" value="0">


                                    <div class="form-group">
                                        <h4 class="title">Share with friends
                                            <small>(Optional)</small>
                                        </h4>
                                        <p>Share your review with your friends on different social media networks.</p>
                                        <ul class="social-icons icon-circle clearfix">
                                            <li class="twitter"><a href="https://api.addthis.com/oexchange/0.8/forward/twitter/offer?url={{url('home/trip/'.$category->url_slug.'/'.$trip->url_slug)}}&pubid=ra-42fed1e187bae420&title={{$trip->title}}&ct=1" target="_blank" title="Twitter"  data-toggle="tooltip"><i
                                                            class="soap-icon-twitter"></i></a></li>
                                            <li class="facebook"><a href="https://api.addthis.com/oexchange/0.8/forward/facebook/offer?url={{url('home/trip/'.$category->url_slug.'/'.$trip->url_slug)}}&pubid=ra-42fed1e187bae420&title={{$trip->title}}&ct=1" target="_blank" title="Facebook" data-toggle="tooltip"><i
                                                            class="soap-icon-facebook"></i></a></li>
                                            <li class="googleplus"><a href="https://api.addthis.com/oexchange/0.8/forward/google_plusone_share/offer?url={{url('home/trip/'.$category->url_slug.'/'.$trip->url_slug)}}&pubid=ra-42fed1e187bae420&title={{$trip->title}}&ct=1" target="_blank" title="GooglePlus" data-toggle="tooltip"><i
                                                            class="soap-icon-googleplus"></i></a></li>
                                        </ul>

                                        {{--<a href="https://api.addthis.com/oexchange/0.8/forward/facebook/offer?url={{url('home/trip/'.$category->url_slug.'/'.$trip->url_slug)}}&pubid=ra-42fed1e187bae420&title={{$trip->title}}&ct=1" target="_blank"><img src="https://cache.addthiscdn.com/icons/v3/thumbs/32x32/facebook.png" border="0" alt="Facebook"/></a>--}}
                                        {{--<a href="https://api.addthis.com/oexchange/0.8/forward/google_plusone_share/offer?url={{url('home/trip/'.$category->url_slug.'/'.$trip->url_slug)}}&pubid=ra-42fed1e187bae420&title={{$trip->title}}&ct=1" target="_blank"><img src="https://cache.addthiscdn.com/icons/v3/thumbs/32x32/google_plusone_share.png" border="0" alt="Google+"/></a>--}}
                                        {{--<a href="https://api.addthis.com/oexchange/0.8/forward/twitter/offer?url={{url('home/trip/'.$category->url_slug.'/'.$trip->url_slug)}}&pubid=ra-42fed1e187bae420&title={{$trip->title}}&ct=1" target="_blank"><img src="https://cache.addthiscdn.com/icons/v3/thumbs/32x32/twitter.png" border="0" alt="Twitter"/></a>--}}

                                    </div>
                                    <div class="form-group col-md-5 no-float no-padding no-margin">
                                        <button type="submit" class="btn-large full-width">SUBMIT REVIEW</button>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
<br>

                    <a style="font-size: 20px" href="{{url('home/'.$trip->url_slug.'/book')}}" class="button ">BOOK NOW</a>

                </div>


                <div class="sidebar col-md-3">
                    <div class="travelo-box">
                        <h4 class="box-title">Last Minute Deals</h4>
                        <div class="image-box style14">
                            @foreach($latestTrips as $trip)
                                <article class="box">
                                    <figure>
                                        <a href="{{url('home/trip/'.$trip->categories()->first()->url_slug.'/'.$trip->url_slug)}}" title="">
                                            <img src="{{Request::root()}}/public/uploads/trip/cover/{{$trip->photo}}" alt="">
                                        </a>
                                    </figure>
                                    <div class="details">
                                        <h5 class="box-title"><a href="{{url('home/trip/'.$trip->categories()->first()->url_slug.'/'.$trip->url_slug)}}">{{$trip->title}}</a></h5>
                                        <label class="price-wrapper"><span class="price-per-unit">${{$trip->price}}</span>avg/night</label>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                    <div class="travelo-box book-with-us-box">
                        <h4>Why Book with us?</h4>
                        <ul>
                            <li>
                                <i class="soap-icon-hotel-1 circle"></i>
                                <h5 class="title"><a href="#">135,00+ Hotels</a></h5>
                                <p>Nunc cursus libero pur congue arut nimspnty.</p>
                            </li>
                            <li>
                                <i class="soap-icon-savings circle"></i>
                                <h5 class="title"><a href="#">Low Rates &amp; Savings</a></h5>
                                <p>Nunc cursus libero pur congue arut nimspnty.</p>
                            </li>
                            <li>
                                <i class="soap-icon-support circle"></i>
                                <h5 class="title"><a href="#">Excellent Support</a></h5>
                                <p>Nunc cursus libero pur congue arut nimspnty.</p>
                            </li>
                        </ul>
                    </div>
                    <div class="travelo-box contact-box">
                        <h4 class="box-title">Need Travelo Help?</h4>
                        <p>We would be more than happy to help you. Our team advisor are 24/7 at your service to help
                            you.</p>
                        <address class="contact-details">
                            <span class="contact-phone"><i class="soap-icon-phone"></i> 1-800-123-HELLO</span>
                            <br/>
                            <a href="#" class="contact-email">help@travelo.com</a>
                        </address>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection


@section('css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>

    <script>
        $("#input-1").rating();
        $("#input-2").rating();
    </script>

@endsection