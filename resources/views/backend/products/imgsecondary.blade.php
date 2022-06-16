<!-- EXTENDS -->
@extends('adminlte::page')
<!-- TITLE -->
@section('title', 'E-commerce - Profile')
<!-- STYLES -->
<link rel="stylesheet" href="{{asset('css/profile.css')}}">
<!-- CONTENT -->
@section('content')
<!-- HEADER -->
<div class="container border border-dark d-flex justify-content-center rounded-top mt-5">
    <div class="row">
        <div class="mb-3 col-12">
            <h1>{{__('web.products_title')}}</h1>
        </div>
    </div>
</div>
<!-- CONTENT INFORMATION-->
{!!Form::open(['method'=>'POST', 'url'=>'/images2' , 'enctype'=>'multipart/form-data'])!!}
<div class="container border border-dark d-flex justify-content-center">
    <div class="row">
        <!-- Imagen principal -->
        <div class="mb-3 col-6 ">
            <label for="main_image_product" class="form-label ml-5">{{__('web.add_image')}}</label>
        </div>
        <div class="mb-3 col-6">
            <input class="form-label" type="file" name="main_image_product">
            <input type="hidden" name="id_product" value="{{$images->id}}">
        </div>
    </div>
</div>

<!-- MODIFICAR -->
<div class="container border border-dark d-flex justify-content-center rounded-bottom shadow-lg p-3 bg-white">
    <div class="row">
        <div class="mb-3 mt-3 col-12">
            <input class="btn btn-dark btn-lg" type="submit" value="{{__('web.create')}}">
        </div>
    </div>
</div>
{!!Form::close()!!}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(function() {});
</script>
@endsection