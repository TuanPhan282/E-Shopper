@extends('admin.layouts.app')
@section("content")

<div class="page-wrapper">
    <form method="post" class="form-horizontal form-material">
        @csrf

        <div class="form-group">
            <label class="col-md-12">Country</label>
            <div class="col-md-12">
                <input type="text" name='name' placeholder="Viet Nam" class="form-control form-control-line">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-12">
                <button type='submit' class="btn btn-success">Add Country</button>
            </div>
<!-- 
            <div class="col-sm-12">
                <button class="btn btn-success"><a href="{{url('/country')}}">Trở về</a></button>
            </div> -->
        </div>

    </form>
</div>

@endsection