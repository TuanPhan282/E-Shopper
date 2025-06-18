<!-- <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}"> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
            table{
                width: 800px;
                margin: auto;
                text-align: center;
            }
            /* tr {
                border: 1px solid;
            } */
            th {
                border: 1px solid;
            }
            td {
                border: 1px solid;
            }
            h1{
                text-align: center;
                color: red;
            }
            #button{
                margin: 2px;
                margin-right: 10px;
                float: right;
            }
        </style>
    <title>@yield('Title')</title>
</head>
<body>
    <!-- gọi trang header -->
    @include('master.header')
    <!-- nơi chứa nội dung -->
     @yield('content')
    <!-- gọi trang footer -->
    @include('master.footer')
</body>
</html>