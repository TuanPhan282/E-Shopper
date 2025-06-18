@extends('layouts.app')
@section("content")

<?php
$html = '';
foreach($data as $val){
    $html .= '
    <tr role="row">
                <td>'.$val->id.'</td>
                <td>'.$val->name.'</td>
                <td>'.$val->phoneNumber.'</td>
                <td>'.$val->age.'</td>
                <td><a href="'.url("/edit-cau-thu/$val->id").'">Edit</a></td>
        <td><a href="'.url("/delete-cau-thu/$val->id").'">Delete</a></td>
            </tr>';
}
?>
<div class="container">

    <div class=" justify-content-center row">
        <table>
            <h1 style = "font-size: 30px">List user</h1>
            <thead>
                <tr>
                    <th>id</th>
                    <th>Tên</th>
                    <th>Số điện thoại</th>
                    <th>Tuổi</th>
                    <th style="width: 7%">Edit</th>
                    <th style="width: 10%">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php echo $html?>
            </tbody>
            <tfoot>
                <tr  class="flex justify-end">
                    <td colspan="8">
                        <a href="{{url('insert-cau-thu')}}"><button id="button">Thêm cầu thủ</button></a>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
    
</div>
    @endsection