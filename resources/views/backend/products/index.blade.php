<!-- EXTENDS -->
@extends('adminlte::page')
<!-- TITLE -->
@section('title', 'E-commerce - Profile')
<!-- STYLES -->
<link rel="stylesheet" href="{{asset('css/profile.css')}}">
<!-- CONTENT -->
@section('content_header')
    <h1 class="card card-body p-3">{{__('web.products_title')}} | {{ __('web.list') }}</h1>
@stop
@section('content')
<div class="card card-body p-3">
    @if( count($products) == 0 )
    <div class="mt-5 justify-content-center d-flex">
        <p>{{__('web.not-data')}}</p>
    </div>
    <div class="mt-5 justify-content-center d-flex">
        <a class="btn btn-success px-5 shadow" href="{{ route('products.create') }}"> {{ __("web.create")}} </a>
    </div>
@else
<!-- CONTENT INFORMATION-->
<div class="mb-3">
    <a class="btn btn-success px-5 w-25 shadow" href="{{ route('products.create') }}"> {{ __("web.create")}} </a>
</div>
<table class="table table-light table-striped border border-light shadow">
    <tr>
        <th>{{__('web.name_product')}}</th>
        <th>{{__('web.price_product')}}</th>
        <th>{{__('web.name_category_product')}}</th>
        <th>{{__('web.principal_image_products')}}</th>
        <th>{{ __('web.tools') }}</th>
    </tr>
    @foreach($products as $product)
    <tr>
        <!-- Aqui hace el bucle de los productos y va mostrando -->
        <td><label name="name" class="form-label mt-4">{{$product->name}}</label></td>
        <td><label name="price" class="form-label mt-4">{{$product->price}}</label></td>
        <td><label name="username" class="form-label mt-4">{{$product->categories->name}}</label></td>
        <td>
            @if(is_null($product->image_product))
                <i class="far fa-images fs-2"></i>
            @else
                <img name="main_image" src="{{asset('images/imageProduct/'.$product->image_product)}}" alt="Main image" width="100">
            @endif
        </td>
        <!-- Botones de las acciones -->
        <td>
            <a class="btn btn-primary w-100 mb-3" href="{{ route('products.show',['product' => $product->id])}}"><i class="fas fa-info-circle"></i></a>

            <a class="btn btn-secondary w-100 mb-3" href="{{ route('products.edit', ['product' => $product->id])}}"><i class="fas fa-edit"></i></a>
                        
            {!! Form::open(['url' => route('products.destroy',['product' => $product->id]), 'method' => 'POST']) !!}
                @csrf
                @method('DELETE')
                <button class="btn btn-danger w-100" type="submit"><i class="fas fa-trash"></i></button>
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach

</table>

@endif
</div>
<!-- Condición si existe -->

@endsection


<!-- HEADER -->
{{-- <div class="container border border-dark d-flex justify-content-center rounded-top mt-5">
    <div class="row">
        <div class="mb-3 col-12">
            <h1 class="card card-body p-3">{{__('web.products_title')}}</h1>
        </div>
    </div>
</div> --}}

{{-- <div class="container  d-flex justify-content-center">
    <div class="row">
        <div class="mt-5 mb-5 ml-5 justify-content-center d-flex">
            <a class="btn btn-success px-5 shadow" href="{{ route('products.create') }}">{{ __("web.create")}}</a>
        </div>
        <table class="table table-light table-striped border border-light shadow rounded mb-5 text-center">
            <!-- Titulos de la tabla -->
            
            <tr>
                <td><label for="name" class="form-label">{{__('web.name_product')}}</label></td>
                <td><label for="price" class="form-label">{{__('web.price_product')}}</label></td>
                <td><label for="username" class="form-label">{{__('web.name_category_product')}}</label></td>
                <td><label for="main_image" class="form-label">{{__('web.principal_image_products')}}</label></td>
                <td><label for="actions" class="form-label">{{__('web.tools')}}</label></td>
            </tr>
            @foreach($products as $product)
            <tr>
                <!-- Aqui hace el bucle de los productos y va mostrando -->
                <td><label name="name" class="form-label mt-4">{{$product->name}}</label></td>
                <td><label name="price" class="form-label mt-4">{{$product->price}}</label></td>
                <td><label name="username" class="form-label mt-4">{{$product->categories->name}}</label></td>
                <td>
                    @if(is_null($product->image_product))
                        <i class="far fa-images fs-2"></i>
                    @else
                        <img name="main_image" src="{{asset('images/imageProduct/'.$product->image_product)}}" alt="Main image" width="100">
                    @endif
                </td>
                <!-- Botones de las acciones -->
                <td>
                    <a href="{{ route('products.show',['product' => $product->id])}}"><button class="btn btn-primary w-100 mb-3">{{__("web.detail")}}<i class="fas fa-info-circle"></i></button></a>

                    <a href="{{ route('products.edit', ['product' => $product->id])}}"><button class="btn btn-secondary w-100 mb-3">{{__("web.edit")}}<i class="fas fa-edit"></i></button></a>
                                
                    {!! Form::open(['url' => route('products.destroy',['product' => $product->id]), 'method' => 'POST']) !!}
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger w-100" type="submit"><i class="fas fa-trash"></i></button>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div> --}}