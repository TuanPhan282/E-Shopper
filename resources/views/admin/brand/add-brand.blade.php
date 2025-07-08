@extends('admin.layouts.app')
@section("content")

<div class="page-wrapper">
    <form method="post" class="form-horizontal form-material">
        @csrf

        <div class="form-group">
            <label class="col-md-12">Brand</label>
            <div class="col-md-12">
                <input type="text" name='name' placeholder="Nike" class="form-control form-control-line">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-12">
                <button type='submit' class="btn btn-success">Add Brand</button>
            </div>
<!-- 
            <div class="col-sm-12">
                <button class="btn btn-success"><a href="{{url('/country')}}">Trở về</a></button>
            </div> -->
        </div>

    </form>
</div>

@endsection