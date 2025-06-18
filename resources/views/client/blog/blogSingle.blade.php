@extends('client.layouts.app')
@section('content')

					<div class="blog-post-area">
						<h2 class="title text-center">Latest From our Blog</h2>
						<div class="single-blog-post">
							<h3>{{ $data->title}}</h3>
							<div class="post-meta">
								<ul>
									<li><i class="fa fa-user"></i> Mac Doe</li>
									<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
									<li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
								</ul>
								<!-- <span>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-half-o"></i>
								</span> -->
							</div>
							<a href="">
								<img style="width: 100%; height:400px; object-fit: contain" src="{{ asset('/upload/blog/image/'. $data->image)}}" alt="">
							</a>
                            <p>{{$data->description}}</p> <br>
                            <p>{{$data->content}}</p> <br>
							<div class="pager-area">
								<ul class="pager pull-right">
									@if($prev)
                                        <li><a href="{{ url('/blog-single/' . $prev->id) }}">Prev</a></li>
                                    @endif

                                    @if($next)
                                        <li><a href="{{ url('/blog-single/' . $next->id) }}">Next</a></li>
                                    @endif
								</ul>
							</div>
						</div>
					</div><!--/blog-post-area-->

					<div class="rating-area">
						<div class="rate">
                <div class="vote">
                    <div class="star_1 ratings_stars"><input value="1" type="hidden"></div>
                    <div class="star_2 ratings_stars"><input value="2" type="hidden"></div>
                    <div class="star_3 ratings_stars"><input value="3" type="hidden"></div>
                    <div class="star_4 ratings_stars"><input value="4" type="hidden"></div>
                    <div class="star_5 ratings_stars"><input value="5" type="hidden"></div>
                    <span class="rate-np"></span>
                </div> 
            </div>
						<ul class="tag">
							<li>TAG:</li>
							<li><a class="color" href="">Pink <span>/</span></a></li>
							<li><a class="color" href="">T-Shirt <span>/</span></a></li>
							<li><a class="color" href="">Girls</a></li>
						</ul>
					</div><!--/rating-area-->

					<div class="socials-share">
						<a href=""><img src="images/blog/socials.png" alt=""></a>
					</div><!--/socials-share-->

					<!-- <div class="media commnets">
						<a class="pull-left" href="#">
							<img class="media-object" src="images/blog/man-one.jpg" alt="">
						</a>
						<div class="media-body">
							<h4 class="media-heading">Annie Davis</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
							<div class="blog-socials">
								<ul>
									<li><a href=""><i class="fa fa-facebook"></i></a></li>
									<li><a href=""><i class="fa fa-twitter"></i></a></li>
									<li><a href=""><i class="fa fa-dribbble"></i></a></li>
									<li><a href=""><i class="fa fa-google-plus"></i></a></li>
								</ul>
								<a class="btn btn-primary" href="">Other Posts</a>
							</div>
						</div>
					</div> --><!--Comments-->
					<div class="response-area">
						<h2>3 RESPONSES</h2>
						<ul class="media-list">
							@foreach($commentsLevel0 as $val)
							<li class="media {{$val->id}}">
								<a class="pull-left" href="#">
									<img style="width: 50px; height: 50px; object-fit: cover" class="media-object" src="{{ asset('upload/avatar/'.$val->avatar)}}" alt="">
								</a>
								<div class="media-body">
									<ul class="sinlge-post-meta">
										<li><i class="fa fa-user"></i>{{$val->name}}</li>
										<li><i class="fa fa-clock-o"></i> {{ explode(' ', $val->created_at)[1] }}</li>
										<li><i class="fa fa-calendar"></i> {{ explode(' ', $val->created_at)[0] }}</li>
									</ul>
									<p>{{$val->cmt}}</p>
									<button class="btn btn-primary replay-button"><i class="fa fa-reply"></i>Replay</button>
									
									<div style="margin-bottom: 10px; display: none" class="replay-box">
										<div class="row">
											<div class="col-sm-12">
												<h2>Leave a replay</h2>
												
												<div style="margin: 0" class="text-area text-area-level-n">
													<div class="blank-arrow">
														<label></label>
													</div>
													<span>*</span>
														<textarea name="cmt" rows="6"></textarea>
														<button class="btn btn-primary level-n">post comment</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>
								<!-- level child -->
								@foreach($commentsLevels as $val2)
									@if($val2->level == $val->id)
									<li class="media second-media {{$val->id}}">
										<a class="pull-left" href="#">
											<img style="width: 50px; height: 50px; object-fit: cover" class="media-object" src="{{ asset('upload/avatar/'.$val2->avatar)}}" alt="">
										</a>
										<div class="media-body">
											<ul class="sinlge-post-meta">
												<li><i class="fa fa-user"></i>{{$val2->name}}</li>
												<li><i class="fa fa-clock-o"></i> {{ explode(' ', $val2->created_at)[1] }}</li>
												<li><i class="fa fa-calendar"></i> {{ explode(' ', $val2->created_at)[0] }}</li>
											</ul>
											<p>{{$val2->cmt}}</p>
											<button class="btn btn-primary replay-button"><i class="fa fa-reply"></i>Replay</button>
											
											<div style="margin-bottom: 10px; display: none" class="replay-box">
												<div class="row">
													<div class="col-sm-12">
														<h2>Leave a replay</h2>
														
														<div style="margin: 0" class="text-area text-area-level-n">
															<div class="blank-arrow">
																<label></label>
															</div>
															<span>*</span>
																<textarea name="cmt" rows="6"></textarea>
																<button class="btn btn-primary level-n">post comment</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</li>
									@endif
								@endforeach
							@endforeach

							<li class="media">
								<a class="pull-left" href="#">
									<img class="media-object" src="images/blog/man-two.jpg" alt="">
								</a>
								<div class="media-body">
									<ul class="sinlge-post-meta">
										<li><i class="fa fa-user"></i>Janis Gallagher</li>
										<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
										<li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
									</ul>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
									<a class="btn btn-primary" href=""><i class="fa fa-reply"></i>Replay</a>
								</div>
							</li>
							<li class="media second-media">
								<a class="pull-left" href="#">
									<img class="media-object" src="images/blog/man-three.jpg" alt="">
								</a>
								<div class="media-body">
									<ul class="sinlge-post-meta">
										<li><i class="fa fa-user"></i>Janis Gallagher</li>
										<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
										<li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
									</ul>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
									<a class="btn btn-primary" href=""><i class="fa fa-reply"></i>Replay</a>
								</div>
							</li>
							
						</ul>					
					</div><!--/Response-area-->
					<div class="replay-box">
						<div class="row">
							<div class="col-sm-12">
								<h2>Leave a replay</h2>
								
								<div class="text-area">
									<div class="blank-arrow">
										<label></label>
									</div>
									<span>*</span>
										<textarea name="cmt" rows="11"></textarea>
										<button class="btn btn-primary level-0">post comment</button>
								</div>
							</div>
						</div>
					</div><!--/Repaly Box-->

@endsection()
<script src="{{ asset('client/js/jquery-1.9.1.min.js') }}"></script>
    <script>
    	
    	$(document).ready(function(){
			$.ajaxSetup({
                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

			var userName = "{{Auth::Check() ? Auth::user()->name : 'Your name'}}";
			$('.blank-arrow').find('label').text(userName);

			
			const rating = @json($rate);

			if(rating){
				$('.star_'+rating.rate).prevAll().andSelf().addClass('ratings_hover');
				$('.rate-np').text({{$averageRating}})
				console.log('trung bình: {{$averageRating}}' );
				
			}
			
			//vote
			$('.ratings_stars').hover(
				// Handles the mouseover
	            function() {
					$(this).prevAll().andSelf().addClass('ratings_hover');
	                // $(this).nextAll().removeClass('ratings_vote'); 
	            },
	            function() {
					$(this).prevAll().andSelf().removeClass('ratings_hover');
	                // set_votes($(this).parent());
	            }
	        );

			$('.ratings_stars').click(function() {
				// Gọi PHP để kiểm tra đăng nhập
				var checkLogin = "{{Auth::Check()}}"; // giá trị này sẽ được PHP render thành true/false

				if (checkLogin) {
					var rate = $(this).find("input").val();
					var id_blog = {{$data->id}};
					var id_rate = null;
					if(rating){
						id_rate = rating.id;
						$('.ratings_hover').removeClass('ratings_hover');
						$('.rate-np').text(rate);
					}
					alert(rate);

					// Highlight các ngôi sao
					if ($(this).hasClass('ratings_over')) {
						$('.ratings_stars').removeClass('ratings_over');
						$(this).prevAll().andSelf().addClass('ratings_over');
					} else {
						$(this).prevAll().andSelf().addClass('ratings_over');
					}

					// Gửi dữ liệu rate bằng AJAX tới controller
					$.ajax({
						type: 'POST',
						url: '{{url("/blog/rate/ajax")}}', // route xử lý lưu dữ liệu rate 
						data: {
							rate: rate,
							id_blog: id_blog, 
						},
						success: function(data) {
							console.log(data); // Hiển thị kết quả trả về từ server


						}
					});

					
				} else {
					alert("Vui lòng đăng nhập để đánh giá");
				}
			});	

			// Comment
			
			$('.text-area').find('button.level-0').click(function(){
				var checkLogin = "{{Auth::check()}}";
				var id_blog = {{$data->id}};

				if(checkLogin){
					var cmt = $('.text-area').find('textarea').val();
					
					$.ajax({
						type: 'POST',
						url: '{{url("/blog/comment/ajax")}}',
						data: {
							cmt: cmt,
							id_blog: id_blog, 
							level: 0,
						},
						success: function(response) {
							// console.log(data); 
							let data = response.data;
							
							var htmls = `
								<li class="media">
									<a class="pull-left" href="#">
										<img style="width: 50px; height: 50px; object-fit: cover" class="media-object" src="{{ asset('/upload/avatar/${data.avatar}')}}" alt="">
									</a>
									<div class="media-body">
										<ul class="sinlge-post-meta">
											<li><i class="fa fa-user"></i> ${data.name}</li>
											<li><i class="fa fa-clock-o"></i>Now</li>
											<li><i class="fa fa-calendar"></i>Now</li>
										</ul>
										<p>${data.cmt}</p>
										<button class="btn btn-primary"><i class="fa fa-reply"></i>Replay</button>
									</div>
								</li>
							`;
							$('.media-list').append(htmls);

						}
					});

				}else{
					alert("Bạn cần login để comment");
				}
			})

			$('.media').find('button.replay-button').click(function(){
				$(this).siblings('.replay-box').show();
			}) 

			$('.text-area').find('button.level-n').click(function(){
				var checkLogin = "{{Auth::check()}}";
				var id_blog = {{$data->id}};
				var id_comment = $(this).closest(".media").attr("id");

				if(checkLogin){
					var cmt = $(this).siblings('textarea').val();
					
					$.ajax({
						type: 'POST',
						url: '{{url("/blog/comment/ajax")}}',
						data: {
							cmt: cmt,
							id_blog: id_blog, 
							level: id_comment,
						},
						success: function(response) {
							// console.log(data); 
							let data = response.data;
							
							var htmls = `
								<li class="media second-media">
									<a class="pull-left" href="#">
										<img style="width: 50px; height: 50px; object-fit: cover" class="media-object" src="{{ asset('/upload/avatar/${data.avatar}') }}" alt="">
									</a>
									<div class="media-body">
										<ul class="sinlge-post-meta">
											<li><i class="fa fa-user"></i> ${data.name}</li>
											<li><i class="fa fa-clock-o"></i>Now</li>
											<li><i class="fa fa-calendar"></i>Now</li>
										</ul>
										<p>${data.cmt}</p>
										<button class="btn btn-primary"><i class="fa fa-reply"></i>Replay</button>
									</div>
								</li>
							`;
							$('.' + id_comment).after(htmls);

						}
					});

				}else{
					alert("Bạn cần login để comment");
				}
			})

		});
    </script>