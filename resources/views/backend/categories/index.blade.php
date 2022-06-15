@extends('adminlte::page')

@section('title', 'E-commerce - Categories')

@section('content_header')
    <h1 class="card card-body">{{__("web.categories")}} | {{__("web.list")}}</h1>

@stop

@section('content')



<div class="card card-body p-3">

    <div class="mb-5 mt-3">
            <a class="btn btn-success px-5 shadow" href="{{ route('categories.create') }}">{{ __("web.create")}}</a>
            <a href="" class="px-3"></a>
            <a class='btn btn-primary px-5 ms-4 shadow' href="{{route("categories.index")}}">{{__("web.return")}}</a>
    </div>


            <table class="table table-light table-striped border border-light shadow rounded mb-5">
                <tr>
                    <th>{{ __("web.name")}}</th>
                    <th>ES</th>
                    <th>EN</th>
                    <th>FR</th>
                    <th>img</th>
                    <th>{{ __("web.tools")}}</th>
                </tr>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->translate('es')->description }}</td>
                        <td>{{ $category->translate('en')->description }}</td>
                        <td>{{ $category->translate('fr')->description }}</td>
                        <td><img src="{{asset("images/".$category->image_category)}}" alt="" width="50px"></td>
                        <td>
                            <a href="{{ route('categories.show',['category' => $category->id]) }}"><button class="btn btn-primary w-100 mb-3">
                                {{-- {{__("web.detail")}} --}}
                                <i class="fas fa-info-circle"></i>
                                
                            </button></a>
                        <a href="{{ route('categories.edit', ['category' => $category->id]) }}"><button class="btn btn-secondary w-100 mb-3">
                            {{-- {{__("web.edit")}} --}}
                            <i class="fas fa-edit"></i>
                        </button></a>
                        {!! Form::open(['url' => route('categories.destroy',['category' => $category->id]), 'method' => 'POST']) !!}
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger w-100" type="submit">
                            <i class="fas fa-trash"></i>
                        </button>
                        {{-- {!! Form::submit(__("web.delete"), ["class"=>"btn btn-danger"]) !!} --}}
            
                        {!! Form::close() !!}
                    </td>
        
                    </tr>
                @endforeach
            
            </table
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
