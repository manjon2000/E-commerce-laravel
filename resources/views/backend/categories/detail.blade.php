@extends('adminlte::page')

@section('title', 'Ecommerce Laravel Project')

@section('content_header')
    <h1>Ecommerce Laravel Project</h1>
@stop

@section('content')
<a href="{{ route('categories.create') }}"><button>Crear</button></a>

<div class="container">

    <table class="table table-bordered">
        <tr>
            <th>ES</th>
            <th>img</th>
            <th>acciones</th>
        </tr>
            <tr>
                <td>{{ $category->name }}</td>
                <td><img src="{{asset("images/".$category->image_category)}}" alt="" width="100px"></td>
                <td>
                <a href="{{ route('categories.edit', ['category' => $category->id]) }}"><button>Editar</button></a>
                {!! Form::open(['url' => route('categories.destroy',['category' => $category->id]), 'method' => 'POST']) !!}
                @csrf
                @method('DELETE')
                {!! Form::submit('Eliminar', []) !!}
    
                {!! Form::close() !!}
            </td>

            </tr>
    
    </table>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop




