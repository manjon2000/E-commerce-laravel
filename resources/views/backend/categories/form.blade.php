@extends('adminlte::page')

@section('title', 'Ecommerce Laravel Project')

@section('content_header')
    <h1>Ecommerce Laravel Project</h1>
@stop

@section('content')
    <div class="container bg-white p-3">
        @if (isset($category))
            {!! Form::open(['url' => route('categories.update', ['category' => $category->id]), 'method' => 'PUT', 'files' => 'true']) !!}
            <div class="mb-3">
                {!! Form::label('name', 'Name', ['class' => 'form-label']) !!}
                {!! Form::text('name', $category->name, ['class' => 'form-control']) !!}
            </div>
            {{ App::setLocale('es') }}
            <div class="mb-3">
                {!! Form::label('description_es', 'description es', ['class' => 'form-label']) !!}
                {!! Form::text('description_es', $category->description, ['class' => 'form-control']) !!}
            </div>

            {{ App::setLocale('en') }}
            <div class="mb-3">
                {!! Form::label('description_en', 'description en', ['class' => 'form-label']) !!}
                {!! Form::text('description_en', $category->description, ['class' => 'form-control']) !!}
            </div>

            {{ App::setLocale('fr') }}
            <div class="mb-3">
                {!! Form::label('description_fr', 'description fr', ['class' => 'form-label']) !!}
                {!! Form::text('description_fr', $category->description, ['class' => 'form-control']) !!}
            </div>
            <div class="mb-3">

                {!! Form::file('image_category', ['class' => 'form-control', 'type' => 'file', 'id' => 'formFile']) !!}
            </div>

            <div class="mb-3">
                <img src='{{ asset('images/' . $category->image_category) }}' width="100px">
            </div>
            <div class="mb-3">
                {!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
        @else
            {!! Form::open(['url' => route('categories.store'), 'method' => 'POST', 'files' => 'true']) !!}
            <div class="mb-3">
                {!! Form::label('name', 'Name', ['class' => 'form-label']) !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
            <div class="mb-3">
                {!! Form::label('description_es', 'description es', ['class' => 'form-label']) !!}
                {!! Form::text('description_es', null, ['class' => 'form-control']) !!}
            </div>
            <div class="mb-3">
                {!! Form::label('description_en', 'description en', ['class' => 'form-label']) !!}
                {!! Form::text('description_en', null, ['class' => 'form-control']) !!}
            </div>
            <div class="mb-3">
                {!! Form::label('description_fr', 'description fr', ['class' => 'form-label']) !!}
                {!! Form::text('description_fr', null, ['class' => 'form-control']) !!}
            </div>
            <div class="mb-3">
                {!! Form::label('image_category', 'image_category', ['class' => 'form-label']) !!}
            </div>
            <div class="mb-3">
                {!! Form::file('image_category', ['class' => 'form-control', 'type' => 'file', 'id' => 'formFile']) !!}
            </div>
            <div class="mb-3"> <label for="formFile" class="form-label">Default file input example</label>
                <input class="form-control" type="file" id="formFile"> </div>
            <div class="mb-3">
                {!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}
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