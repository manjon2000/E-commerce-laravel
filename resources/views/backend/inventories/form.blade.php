@extends('adminlte::page')

@section('title', 'E-commerce - Categories')


@section('content_header')
    <h1>{{__("web.inventory")}} | {{__("web.create")}}</h1>
@stop

@section('content')
    <div class="card card-body p-3">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif
          <a href="{{route("inventories.index")}}"><button class='btn btn-primary'>{{__("web.return")}}</button></a>
        @if (isset($inventory))
            {!! Form::open(['url' => route('inventories.update', ['inventory' => $inventory->id]), 'method' => 'PUT', 'files' => 'true']) !!}
            <div class="mb-3">
                {!! Form::label('quantity', __("web.quantity"), ['class' => 'form-label']) !!}
                {!! Form::number('quantity', $inventory->quantity, ['class' => 'form-control']) !!}
            </div>
            <div class="mb-3">
                {!! Form::label('product', __("web.product"), ['class' => 'form-label']) !!}
                <select name="product" id="product">
                    @foreach ($products as $product)
                        @if ($product->id==$inventory->products->id)
                        <option value="{{$product->id}}" selected="selected">{{$product->name}}</option>
                        @else
                        <option value="{{$product->id}}" >{{$product->name}}</option>
                        @endif
                        
                    @endforeach


                </select>
            </div>
            <div class="mb-3">
                {!! Form::label('store', __("web.store"), ['class' => 'form-label']) !!}
                <select name="store" id="store">
                    @foreach ($stores as $store)
                        @if ($store->id==$inventory->stores->id)
                        <option value="{{$store->id}}" selected="selected">{{$store->name}}</option>
                        @else
                        <option value="{{$store->id}}" >{{$store->name}}</option>
                        @endif
                        
                    @endforeach


                </select>
            
            </div>
            <div class="mb-3">
                {!! Form::submit(__("web.update"), ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
        @else
            {!! Form::open(['url' => route('inventories.store'), 'method' => 'POST', 'files' => 'true']) !!}
            <div class="mb-3">
                {!! Form::label('quantity', __("web.quantity"), ['class' => 'form-label']) !!}
                {!! Form::number('quantity', null, ['class' => 'form-control']) !!}
            </div>
            <div class="mb-3">
                {!! Form::label('product', __("web.product"), ['class' => 'form-label']) !!}
                <select name="product" id="product">
                    @foreach ($products as $product)
                        <option value="{{$product->id}}" >{{$product->name}}</option>
                        
                    @endforeach


                </select>
            </div>
            <div class="mb-3">
                {!! Form::label('store', __("web.store"), ['class' => 'form-label']) !!}
                <select name="store" id="store">
                    @foreach ($stores as $store)
                        <option value="{{$store->id}}" >{{$store->name}}</option>
                        
                    @endforeach


                </select>
            
            </div>
            <div class="mb-3">
                {!! Form::submit(__("web.create"), ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        @endif

    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script></script>
@stop
