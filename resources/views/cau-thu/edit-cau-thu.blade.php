@extends('master.master')
@section('content')

<?php
$html = '';
foreach($data as $val){
    $html .= '
    
        <input type="hidden" name="id" value="'.$val->id.'">
        
        <p>Tên: </p>
        <input type="text" name="name" value="'.$val->name.'">
        
        <p>Phone Number: </p>
        <input type="text" name="phoneNumber" value="'.$val->phoneNumber.'">
        
        <p>Tuổi</p>
        <input type="number" min="16" max="35" name="age" value="'.$val->age.'">
        

        <button type="submit">Nộp</button>
        <p></p>
        <a href="'.url('/list-cau-thu').'">
                <button type="button">Trở về</button>
            </a>';
        
}
?>

<div style="display: flex; flex-direction: column; align-items: center; justify-content: center">
@if($errors->any())
           <div class="alert alert-danger alert-dismissible">
               <ul>
                   @foreach($errors->all() as $error)
                       <li>{{$error}}</li>
                   @endforeach
               </ul>
           </div>
@endif

<h2>Chỉnh sửa cầu thủ: </h2>
<form method="post">
        @csrf
    <?php echo $html ?>
    </form>
</div>

@endsection