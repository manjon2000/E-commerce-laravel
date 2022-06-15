@extends('adminlte::page')

@section('title', 'E-commerce - Categories')


@section('content_header')
    <h1>{{__("web.categories")}} | {{__("web.create")}}</h1>
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
          <a href="{{route("categories.index")}}"><button class='btn btn-primary'>{{__("web.return")}}</button></a>
        @if (isset($category))
            {!! Form::open(['url' => route('categories.update', ['category' => $category->id]), 'method' => 'PUT', 'files' => 'true']) !!}
            <div class="mb-3">
                {!! Form::label('name', __("web.name"), ['class' => 'form-label']) !!}
                {!! Form::text('name', $category->name, ['class' => 'form-control']) !!}
            </div>
            <div class="mb-3">
                {!! Form::label('description_es', 'description es', ['class' => 'form-label']) !!}
                {!! Form::text('description_es', $category->translate('es')->description, ['class' => 'form-control']) !!}
            </div>

            <div class="mb-3">
                {!! Form::label('description_en', 'description en', ['class' => 'form-label']) !!}
                {!! Form::text('description_en', $category->translate('en')->description, ['class' => 'form-control']) !!}
            </div>

            <div class="mb-3">
                {!! Form::label('description_fr', 'description fr', ['class' => 'form-label']) !!}
                {!! Form::text('description_fr', $category->translate('fr')->description, ['class' => 'form-control']) !!}
            </div>
            <div class="mb-3">

                {!! Form::file('image_category', ['class' => 'form-control', 'type' => 'file', 'id' => 'formFile']) !!}
            </div>
            <div class="mb-3">
                <img src='{{ asset('images/' . $category->image_category) }}' width="100px">
            </div>
            <div class="mb-3">
                {!! Form::submit(__("web.update"), ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
        @else
            {!! Form::open(['url' => route('categories.store'), 'method' => 'POST', 'files' => 'true']) !!}
            <div class="mb-3">
                {!! Form::label('name', __("web.name"), ['class' => 'form-label']) !!}
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
