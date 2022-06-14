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
        
        {{App::setLocale('es')}}

        {!! Form::label('description_es', 'description es', []) !!}
        {!! Form::text('description_es', $category->description, []) !!}
        
        {{ App::setLocale('en')}}

        {!! Form::label('description_en', 'description en', []) !!}
        {!! Form::text('description_en', $category->description, []) !!}
        
        {{ App::setLocale('fr')}}

        {!! Form::label('description_fr', 'description fr', []) !!}
        {!! Form::text('description_fr', $category->description, []) !!}

        <img src='{{ asset('images/' . $category->image_category) }}' width="100px">
        {!! Form::file('image_category', []) !!}
        {!! Form::submit('Crear', []) !!}

        {!! Form::close() !!}
    @else
        {!! Form::open(['url' => route('categories.store'), 'method' => 'POST', 'files' => 'true']) !!}
        
        {!! Form::label('name', 'Name', []) !!}
        {!! Form::text('name', null, []) !!}

        {{App::setLocale('es')}}

        {!! Form::label('description_es', 'description es', []) !!}
        {!! Form::text('description_es', null, []) !!}
        
        {{ App::setLocale('en')}}

        {!! Form::label('description_en', 'description en', []) !!}
        {!! Form::text('description_en', null, []) !!}
        
        {{ App::setLocale('fr')}}

        {!! Form::label('description_fr', 'description fr', []) !!}
        {!! Form::text('description_fr', null, []) !!}
        
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
