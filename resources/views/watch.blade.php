@extends('layouts.app')

@section('title', 'Je regarde')
@section('style')

<link rel="stylesheet" type="text/css" href="{{asset('slider/revslider/styles.css')}}" />

@endsection

@section('content')
<!-- title -->
<div class="padding">
	<div class="container pt-3">
		<div class="row ">
			<div class="col-md-12 section-title">
				<h2 class="section-title">Nos Programmes</h2>
				<div class="liner"></div>
			</div>
		</div>
	</div>
</div>

<div >

<div class="container text-center" style="padding:50px 15px; background-color: #007EBD; border-radius: 10px">
    <div class="kids-bg-level-1" >
		<div class="bg-level-1"></div>

		<!--/ #kids_header-->
		<!-- HEADER END -->
		<div class="bg-level-2-page-width-container ">
			<div class="bg-level-2 first-part" id="bg-level-2"></div>
			<div class="l-page-width">
				<div class="kids_slider_bg img_slider">
					<div class="kids_slider_wrapper">
						<div class="kids_slider_inner_wrapper">
							<div class="img-slider">
								<div id="rev_slider_1_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container">
									<!-- START REVOLUTION SLIDER 4.6.5 fullwidth mode -->
									<div id="rev_slider_1_1" class="rev_slider fullwidthabanner">
										<ul>
                                            @foreach ($episodes as $ep)
                                                <li data-transition="random" data-slotamount="7" data-masterspeed="300" data-saveperformance="off">
                                                    <!-- MAIN IMAGE -->
                                                    <img src="{{ getYoutubeThumbnail($ep->link)}}" alt="slide-17" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                                                    <!-- LAYERS -->
                                                    <!-- LAYER NR. 1 -->
                                                    <div class="tp-caption kids-slider-header customin fadeout tp-resizeme" data-x="7" data-y="340" data-customin="x:-90;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="600" data-start="200" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="2" data-endelementdelay="0.1" data-endspeed="300">{{$ep->show->name}}
                                                    </div>
                                                    <!-- LAYER NR. 2 -->
                                                    <div class="tp-caption kids-slider-header-alt customin fadeout tp-resizeme" data-x="7" data-y="400" data-customin="x:-90;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="600" data-start="500" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="2" data-endelementdelay="0.1" data-endspeed="300">{{$ep->name}}
                                                    </div>
                                                </li>
                                            @endforeach
											<!-- SLIDE  -->
											
										</ul>
										<div class="tp-bannertimer tp-bottom"></div>
									</div>
								</div>
								<!-- END REVOLUTION SLIDER -->
							</div>
							<!--/ #kids-slider-->
						</div>
						<!--/ .kids_slider_inner_wrapper-->
					</div>
					<!--/ .kids_slider_wrapper-->
				</div>
				<!--/ .kids_slider_bg-->
			</div>
			<!-- .l-page-width -->
			<div class="bg-level-2 second-part" id="bg-level-2"></div>
		</div>
    </div>

</div>
</div>

<!-- Newest programs and their episodes -->
<div class="padding elements-sec">
	<div class="container pt-3 new-items" id="new-shows-sec">
		<div id="new-shows-title">
		<h1 id="items-title" style="text-shadow: 3px 0 2px #ff7457;">Nouveaux Programmes!</h1>
		</div>
			@if(count($newShows)>0)
				@foreach($newShows as $show)
				<div class="show-container">
				<div class="row" >
				<div class="col-lg-6">
					<div class="card item-cont newest-item episode-item" onmouseenter="playPaperAudio()">
						<a href="{{route('showPage', ['show_id'=> $show->id])}}">
							<div class="card-body">
								<img src="{{asset($show->image_src)}}" alt="photo">
							</div>
							<div class="card-header text-center">
								<h4 class="item-title">{{ $show->name}}</h4>
							</div>
						</a>
					</div>
				</div>

				<div class="col-lg-6">
					<div class="row other-elements">
						@foreach($show->newEpisodes() as $episode)
								<div class="col-lg-6 element">
									<div class="card item-cont episode-item" onmouseenter="playPaperAudio()">
										<a href="{{route('episodeVideoPage', ['video_id'=> $episode->id])}}">
											<div class="card-body">
												<img src="{{getYoutubeThumbnail($episode->link)}}" alt="photo">
											</div>
											<div class="card-header">
												<h4 class="item-title">{{$episode->name}}</h4>
												<p class="item-date">{{$episode->updated_at}}</p>
											</div>
										</a>
									</div>
								</div>
						@endforeach
					</div>
				</div>
					</div>
				</div>
            @endforeach
			@endif()

	</div>
</div>

<!--all shows -->
<div class="padding ">
	<div class="container " id="all-shows-sec">
		<h1 id="items-title" style="text-shadow: 3px 0 2px #ff7457;">Tous Les Programmes</h1>
		<div class="row ">
			@foreach($shows as $show)
				<div class="col-lg-4">
					<div class="show-element " onmouseenter="playPaperAudio()">
						<a href="{{route('showPage', ['show_id'=> $show->id])}}">
								<img class="show-pic" src="{{asset($show->image_src)}}" alt="photo">
								<span class="show-title " >{{$show->name}}</span>
						</a>
					</div>
				</div>
			@endforeach
		</div>
	</div>
</div>
<div class="container end">
	<div class="row ">
		<div class="col-md-12 text-center">
			<img src="{{asset('/img/kidswatch.jpg')}}" alt="kids watch" >
		</div>

	</div>
</div>

@endsection
@section('script')
<script type="text/javascript" src="{{asset('slider/revslider/jquery.themepunch.revolution.min.js')}}"></script>
<script type="text/javascript" src="{{asset('slider/revslider/jquery.themepunch.tools.min.js')}}"></script>
<script type='text/javascript' src="{{asset('slider/scripts.js')}}"></script>
@endsection

