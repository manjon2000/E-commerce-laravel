@extends('adminlte::page')

@section('title', 'E-commerce - Categories')


@section('content_header')
    <h1>{{__("web.sizes")}} | {{__("web.create")}}</h1>
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
          <a href="{{route("sizes.index")}}"><button class='btn btn-primary'>{{__("web.return")}}</button></a>
        @if (isset($size))
            {!! Form::open(['url' => route('sizes.update', ['size' => $size->id]), 'method' => 'PUT', 'files' => 'true']) !!}
            <div class="mb-3">
                {!! Form::label('name_inferior', __("web.name_inferior"), ['class' => 'form-label']) !!}
                {!! Form::text('name_inferior', $size->name_inferior, ['class' => 'form-control']) !!}
            </div>
            <div class="mb-3">
                {!! Form::label('name_superior', __("web.name_superior"), ['class' => 'form-label']) !!}
                {!! Form::text('name_superior', $size->name_superior, ['class' => 'form-control']) !!}
            </div>
            <div class="mb-3">
                {!! Form::submit(__("web.update"), ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
        @else
            {!! Form::open(['url' => route('sizes.store'), 'method' => 'POST', 'files' => 'true']) !!}
            <div class="mb-3">
                {!! Form::label('name_inferior', __("web.name_inferior"), ['class' => 'form-label']) !!}
                {!! Form::text('name_inferior', null, ['class' => 'form-control']) !!}
            </div>
            <div class="mb-3">
                {!! Form::label('name_superior', __("web.name_superior"), ['class' => 'form-label']) !!}
                {!! Form::text('name_superior', null, ['class' => 'form-control']) !!}
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
