@extends('client.layouts.app')
@section('content')

<div class="blog-post-area">
	<h2 class="title text-center">Latest From our Blog</h2>
@foreach($data as $val)
    <div class="single-blog-post">
							<h3>{{$val->title}}</h3>
							<div class="post-meta">
								<ul>
									<li><i class="fa fa-user"></i> Mac Doe</li>
									<li><i class="fa fa-clock-o"></i> {{ explode(' ', $val->updated_at)[1] }} </li>
									<li><i class="fa fa-calendar"></i> {{ explode(' ', $val->updated_at)[0] }}</li>
								</ul>
								<span>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-o"></i>
								</span>
							</div>
							<a href="">
								<img style="width: 100%; height:400px; object-fit: contain" src="{{asset('/upload/blog/image/'. $val->image)}}" alt="">
							</a>
		<p>{{$val->description}}</p>
		<!-- @php
            $formattedContent = nl2br(e(str_replace('\\n', "\n", $val->content)));
        @endphp
        <p>{!! $formattedContent !!}</p> -->

		<a class="btn btn-primary" href="{{ url('/blog-single/' . $val->id) }}">Read More</a>


	</div>
    @endforeach
</div>

<div style="margin-top: 50px" class="d-flex justify-content-center ">
    {{ $data->links() }}
</div>

@endsection()