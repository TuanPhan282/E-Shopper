
@extends('master.master')
@section('content')

<?php
$html = '';
foreach($data as $val){
    $html .= '
    <tr role="row">
        <td>'.$val->id.'</td>
        <td>'.$val->name.'</td>
        <td>'.$val->email.'</td>
        <td>'.$val->age.'</td>
        <td>'.$val->password.'</td>
        <td><a href="'.url("/edit-user/$val->id").'">Edit</a></td>
        <td><a href="'.url("/delete-user/$val->id").'">Delete</a></td>
    </tr>';
}
?>

    <div>
        <table>
        <h1 style = "font-size: 30px">List user</h1>
        <thead>
            <tr>
                <th>id</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Tuổi</th>
                <th>Password</th>
                <th style="width: 7%">Edit</th>
                <th style="width: 10%">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php echo $html ?>
        </tbody>
        <tfoot>
                <tr>
                    <td colspan="8">
                        <a href="{{url('insert-user')}}"><button id="button">Thêm cầu thủ</button></a>
                    </td>
                </tr>
            </tfoot>
    </table>
    
</div>


@endsection