@extends('adminlte::page')

@section('title', 'E-commerce - Categories')

@section('content_header')
    <h1>{{ __('web.inventory') }} | {{ __('web.list') }}</h1>
@stop

@section('content')



    <div class="card card-body p-3">
        <div class="mb-5">
            <a class="btn btn-success px-5 shadow rounded"
                href="{{ route('inventories.create') }}">{{ __('web.create') }}</a>
            <a class="btn btn-primary px-5 shadow rounded" href="{{ route('inventories.index') }}">{{ __('web.return') }}</a>
        </div>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (isset($message))
            <div class="alert alert-danger">
                <ul>
                    <li>{{ $message }}</li>
                </ul>
            </div>
        @endif

        <table class="table table-light table-striped border border-light shadow">
            <tr>
                <th>{{__("web.quantity")}}</th>
                <th>{{__("web.store")}}</th>
                <th>{{ __('web.product') }}</th>
                <th>{{ __('web.tools') }}</th>
            </tr>
            @foreach ($inventories as $inventory)
                <tr>
                    <td>{{ $inventory->quantity }}</td>
                    <td>{{ $inventory->products->name }}</td>
                    <td>{{ $inventory->stores->name }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('inventories.show', ['inventory' => $inventory->id]) }}"><i class="fas fa-info-circle"></i></a>
                        <a class="btn btn-secondary" href="{{ route('inventories.edit', ['inventory' => $inventory->id]) }}"><i class="fas fa-edit"></i></a>
                        {!! Form::open(['url' => route('inventories.destroy', ['inventory' => $inventory->id]), 'method' => 'POST']) !!}
                        @csrf
                        @method('DELETE')
                        
                        {!! Form::submit(__('web.delete'), ['class' => 'btn btn-danger']) !!}

                        {!! Form::close() !!}
                    </td>

                </tr>
            @endforeach

        </table>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
