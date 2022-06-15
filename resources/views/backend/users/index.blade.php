<!-- EXTENDS -->
@extends('adminlte::page')
<!-- TITLE -->
@section('title', 'E-commerce - Profile')
<!-- STYLES -->
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
<!-- CONTENT -->
@section('content')
<div class="card card-body p-3">
    <div class="mb-5">
        <a class="btn btn-success px-5 shadow rounded"
            href="{{ route('profiles.create') }}">{{ __('web.create') }}</a>
        <a class="btn btn-primary px-5 shadow rounded" href="{{ route('profiles.index') }}">{{ __('web.return') }}</a>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors as $error)
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
            <th>{{__("web.username")}}</th>
            <th>{{__("web.email")}}</th>
            <th>{{ __('web.first_name_title') }}</th>
            <th>{{ __('web.last_name_title') }}</th>
            <th>{{ __('web.is_admin') }}</th>
            <th>{{ __('web.address') }}</th>
            <th>{{ __('web.city') }}</th>
            <th>{{ __('web.tools') }}</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->last_name }}</td>
                <td>{{ $user->is_admin }}</td>
                <td>{{ $user->address }}</td>
                <td>

                    @if (isset($user->cities->name))
                        {{$user->cities->name}}
                    @else
                        {{__("web.not-data")}}
                    @endif

                </td>

                <td>
                    <a class="btn btn-primary" href="{{ route('profiles.show', ['profile' => $user->id]) }}"><i class="fas fa-info-circle"></i></a>
                    <a class="btn btn-secondary" href="{{ route('profiles.edit', ['profile' => $user->id]) }}"><i class="fas fa-edit"></i></a>
                    {!! Form::open(['url' => route('profiles.destroy', ['profile' => $user->id]), 'method' => 'POST']) !!}
                    @csrf
                    @method('DELETE')
                    
                    {!! Form::submit(__('web.delete'), ['class' => 'btn btn-danger']) !!}

                    {!! Form::close() !!}
                </td>

            </tr>
        @endforeach

    </table>
    
@endsection
