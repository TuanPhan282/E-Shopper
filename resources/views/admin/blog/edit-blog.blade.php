@extends('admin.layouts.app')
@section("content")

<div class="page-wrapper">

    <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Edit Blog</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit BLog</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

        <div class="container-fluid" style="background-color: white">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
            @if($errors->any())
            <div class="alert alert-danger alert-dismissible">
               <ul>
                   @foreach($errors->all() as $error)
                       <li>{{$error}}</li>
                   @endforeach
               </ul>
            </div>
            @endif
                        <form method="post" enctype="multipart/form-data" class="form-horizontal form-material">
                            @csrf
                    
                            <div class="form-group">
                                <label class="col-md-12">Title</label>
                                <div class="col-md-12">
                                    <input type="text" name='title' value="<?php echo $data->title?>" class="form-control form-control-line">
                                </div>
                            </div>
                    
                            <div class="form-group">
                                <label class="col-md-12">Image</label>
                                <div class="col-md-12">
                                    <input type="file" name='image'  class="form-control form-control-line">
                                </div>
                            </div>
                    
                            <div class="form-group">
                                <label class="col-md-12">Description</label>
                                <div class="col-md-12">
                                    <textarea name="description" class="form-control form-control-line"><?php echo $data->description; ?></textarea>
                                    </div>
                                </div>
                    
                            <div class="form-group">
                                <label class="col-md-12">Content</label>
                                <div class="col-md-12">
                                    <textarea  name='content' id="demo" value="<?php echo $data->content?>" class="form-control "><?php echo $data->content; ?></textarea>
                                </div>
                            </div>
                    
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type='submit' class="btn btn-success">Edit Blog</button>
                                </div>
                            </div>
                    
                        </form>
                    </div>
                </div>
        </div>


</div>

<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script> CKEDITOR.replace('demo'); </script>

@endsection