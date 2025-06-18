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

    <h2>Thêm người dùng: </h2>
    <form method='post'>
        @csrf
        <p>Tên: </p>
        <input type="text" name="name">
        
        <p>Email: </p>
        <input type="text" name="email">
        
        <p>Password: </p>
        <input type="password" name="password">
        
        <p>Tuổi</p>
        <input type="number" name="age">
        
        <button type="submit">Nộp</button>
    </form>
</div>

@endsection