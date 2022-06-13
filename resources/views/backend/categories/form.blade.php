@extends('adminlte::page')

@section('title', 'Ecommerce Laravel Project')

@section('content_header')
    <h1>Ecommerce Laravel Project</h1>
@stop

@section('content')
    @if (isset($category))
        {!! Form::open(['url' => route('categories.update',['category' => $category->id]), 'method' => 'PUT', 'files' => 'true']) !!}

        {!! Form::label('name', 'Name', []) !!}
        {!! Form::text('name', $category->name, []) !!}

        <img src='{{ asset('images/' . $category->image_category) }}' width="100px">
        {!! Form::file('image_category', []) !!}
        {!! Form::submit('Crear', []) !!}

        {!! Form::close() !!}
    @else
        {!! Form::open(['url' => route('categories.store'), 'method' => 'POST', 'files' => 'true']) !!}
        
        {!! Form::label('name', 'Name', []) !!}
        {!! Form::text('name', null, []) !!}
        
        {!! Form::label('image_category', 'image_category', []) !!}
        {!! Form::file('image_category', []) !!}
        
        {!! Form::submit('Crear', []) !!}

        {!! Form::close() !!}
    @endif


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
    </script>
@stop
