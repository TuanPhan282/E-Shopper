@extends('master.master')
@section('content')
<div style="margin-left: 200px">
@if($errors->any())
           <div class="alert alert-danger alert-dismissible">
               <ul>
                   @foreach($errors->all() as $error)
                       <li>{{$error}}</li>
                   @endforeach
               </ul>
           </div>
@endif

    <h2>Thêm Cầu Thủ: </h2>
    <form method='post'>
        @csrf
        <p>Tên: </p>
        <input type="text" name="name">
        
        <p>Phone number: </p>
        <input type="text" name="phoneNumber">

        <p>Tuổi</p>
        <input type="number" name="age">
        
        <button type="submit">Nộp</button>
    </form>
</div>

@endsection