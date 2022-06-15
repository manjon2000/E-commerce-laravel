@extends('adminlte::page')

@section('title', 'E-commerce - Categories')

@section('content_header')
    <h1 class="card card-body p-3"> Tiendas | {{ __('web.list') }}</h1>
@stop

@section('content')



    <div class="card card-body p-3">
        <div class="mb-5">
            <a class="btn btn-success px-5 shadow rounded w-25" href="{{ route('stores.create') }}">{{ __('web.create') }}</a>
        </div>
        {{-- Table information --}}

        <table class="table table-light table-striped shadow border border-light mb-4 text-center">

            {{-- Table head --}}
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone number</th>
                    <th>email</th>
                    <th>schedule</th>
                    <th>Acciones</th>
                    
                </tr>
            </thead>
            {{-- Table head --}}

            {{-- Table body --}}
            <tbody>

                @foreach ($tiendas as $tienda)
                <tr>
                    <td>{{$tienda->name}}</td>
                    <td>{{$tienda->address}}</td>
                    <td>{{$tienda->phone_number	}}</td>
                    <td>{{$tienda->email}}</td>
                    <td>{{$tienda->schedule}}</td>
                    <td >
                        {{-- <a class="btn btn-primary w-100 mb-3" href=""><i class="fas fa-info-circle"></i></a> --}}
                        <a class="btn btn-secondary w-100 mb-3" href="{{ route('stores.edit', ['store' => $tienda->id]) }}"><i class="fas fa-edit"></i></a>
                        {!! Form::open(['url' => route('stores.destroy', ['store' => $tienda->id]), 'method' => 'POST']) !!}
                        @csrf
                        @method('DELETE')

                        <button type="submit" class=" btn btn-danger w-100 mb-3">
                            <i class="fas fa-trash"></i>
                        </button>
                        
                        {{-- {!! Form::submit(__('web.delete'), ['class' => 'btn btn-danger']) !!} --}}

                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
                
            </tbody>
            {{-- Table body --}}

        </table>


        {{-- Table information --}}

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
