@extends('master.master')
@section('content')


<div style="display: flex; flex-direction: column; align-items: center; justify-content: center">
    <h2>Bạn có muốn xóa người có id: <strong><?php echo $id?> </strong>?</h2>
    <div>

        <form method="post">
            @csrf
            <a href="{{url('/list-user')}}">
                <button type="button">Trở về</button>
            </a>
            
            <input type="hidden" name="id" value="<?php echo $id?>">
                <button type="submit">Xóa</button>
        </form>
    </div>
</div>


@endsection