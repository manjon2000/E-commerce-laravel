@extends('adminlte::page')

@section('title', 'E-commerce - Categories')

@section('content_header')
    <h1>{{ __('web.categories') }} | {{ __('web.list') }}</h1>
@stop

@section('content')



    <div class="card card-body p-3">
        <div class="mb-5">
            <a class="btn btn-success px-5 shadow rounded"
                href="{{ route('categories.create') }}">{{ __('web.create') }}</a>
            <a class="btn btn-primary px-5 shadow rounded" href="{{ route('categories.index') }}">{{ __('web.return') }}</a>
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
                <th>{{ __('web.name') }}</th>
                <th>ES</th>
                <th>EN</th>
                <th>FR</th>
                <th>img</th>
                <th>{{ __('web.tools') }}</th>
            </tr>
            @foreach ($categories as $category)
                <tr>
<<<<<<< HEAD
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->translate('es')->description }}</td>
                    <td>{{ $category->translate('en')->description }}</td>
                    <td>{{ $category->translate('fr')->description }}</td>
                    <td><img src="{{ asset('images/' . $category->image_category) }}" alt="" width="100px"></td>
                    <td>
                        <a class="btn btn-primary w-100 mb-3" href="{{ route('categories.show', ['category' => $category->id]) }}"><i class="fas fa-info-circle"></i></a>
                        <a class="btn btn-secondary w-100 mb-3" href="{{ route('categories.edit', ['category' => $category->id]) }}"><i class="fas fa-edit"></i></a>
                        {!! Form::open(['url' => route('categories.destroy', ['category' => $category->id]), 'method' => 'POST']) !!}
=======
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
>>>>>>> main
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
