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
            <th>name</th>
            <th>ES</th>
            <th>EN</th>
            <th>FR</th>
            <th>img</th>
            <th>acciones</th>
        </tr>
        @foreach ($categories as $category)+
            <tr>
                <td>{{ $category->name }}</td>
                {{App::setLocale('es')}}
                <td>{{ $category->description }}</td>
               {{ App::setLocale('en')}}
                <td>{{ $category->description }}</td>
               {{ App::setLocale('fr')}}
                <td>{{ $category->description }}</td>
                <td><img src="{{asset("images/".$category->image_category)}}" alt="" width="100px"></td>
                <td>
                    <a href="{{ route('categories.show',['category' => $category->id]) }}"><button>Detall</button></a>
                <a href="{{ route('categories.edit', ['category' => $category->id]) }}"><button>Editar</button></a>
                {!! Form::open(['url' => route('categories.destroy',['category' => $category->id]), 'method' => 'POST']) !!}
                @csrf
                @method('DELETE')
                {!! Form::submit('Eliminar', []) !!}
    
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
    <script> console.log('Hi!'); </script>
@stop




