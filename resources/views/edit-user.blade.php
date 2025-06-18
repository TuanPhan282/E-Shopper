@extends('master.master')
@section('content')

<?php
$html = '';
foreach($data as $val){
    $html .= '
    
        <input type="hidden" name="id" value="'.$val->id.'">
        
        <p>Tên: </p>
        <input type="text" name="name" value="'.$val->name.'">
        
        <p>Email: </p>
        <input type="text" name="email" value="'.$val->email.'">
        
        <p>Tuổi</p>
        <input type="number" min="16" max="35" name="age" value="'.$val->age.'">
        

        <button type="submit">Nộp</button>
        <p></p>
        <a href="'.url('/list-user').'">
                <button type="button">Trở về</button>
            </a>';
        
}
?>

<div style="display: flex; flex-direction: column; align-items: center; justify-content: center">
<h2>Chỉnh sửa người dùng: </h2>
<form method="post">
        @csrf
    <?php echo $html ?>
    </form>
</div>

@endsection