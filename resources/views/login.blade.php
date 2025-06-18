@extends('master.master')
@section('content')
<div style="margin: 0 200px 50px">

    <form method="post">
        @csrf
        username: <input type="text" name="username">
        <br>
        password: <input type="password" name="password">
        <br>
        <button type = "submit"> send</button>
    </form>
</div>
@endsection