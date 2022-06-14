<!-- EXTENDS -->
@extends('adminlte::page')
<!-- TITLE -->
@section('title', 'E-commerce - Profile')
<!-- STYLES -->
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
<!-- CONTENT -->
@section('content')
    <!-- HEADER -->
    <div class="container border border-dark d-flex justify-content-center rounded-top mt-5">
        <div class="row">
            <div class="mb-3 col-12">
                <h1>{{ __('web.profile_title') }}</h1>
            </div>
        </div>
    </div>
    <!-- CONTENT INFORMATION-->
        @if (Auth::User())
            {!! Form::model($user, ['method' => 'PUT', 'url' => '/profiles/' . $user->id]) !!}
            <div class="container border border-dark d-flex justify-content-center">
                <div class="row">
                    <!-- Nombre usuario -->
                    <div class="mt-5 mb-3 col-6">
                        <label for="name" class="form-label ml-5">{{ __('web.username_title') }}</label>
                    </div>
                    <div class="mt-5 mb-3 col-6">
                        {!! Form::text('name', $user->name, ['class' => 'form-control text-center rounded']) !!}
                    </div>
                    <!-- Email -->
                    <div class="mb-3 col-6 ">
                        <label for="email" class="form-label ml-5">{{ __('web.email_title') }}</label>
                    </div>
                    <div class="mb-3 col-6">
                        {!! Form::text('email', $user->email, ['class' => 'form-control text-center rounded']) !!}
                    </div>
                    <!-- Nombre -->
                    <div class="mb-3 col-6 ">
                        <label for="first_name" class="form-label ml-5">{{ __('web.first_name_title') }}</label>
                    </div>
                    <div class="mb-3 col-6">
                        @if (is_null($user->first_name))
                            {!! Form::text('first_name', null, ['class' => 'form-control text-center rounded', 'placeHolder' => __('web.not-data')]) !!}
                        @else
                            {!! Form::text('first_name', $user->first_name, ['class' => 'form-control text-center rounded']) !!}
                        @endif
                    </div>
                    <!-- Apellidos -->
                    <div class="mb-3 col-6 ">
                        <label for="last_name" class="form-label ml-5">{{ __('web.last_name_title') }}</label>
                    </div>
                    <div class="mb-3 col-6">
                        @if (is_null($user->last_name))
                            {!! Form::text('last_name', null, ['class' => 'form-control text-center rounded', 'placeHolder' => __('web.not-data')]) !!}
                        @else
                            {!! Form::text('last_name', $user->last_name, ['class' => 'form-control text-center rounded']) !!}
                        @endif
                    </div>
                    <!-- Dirección -->
                    <div class="mb-3 col-6">
                        <label for="address" class="form-label ml-5">{{ __('web.address_title') }}</label>
                    </div>
                    <div class="mb-3 col-6">
                        @if (is_null($user->address))
                            {!! Form::text('address', null, ['class' => 'form-control text-center rounded', 'placeHolder' => __('web.not-data')]) !!}
                        @else
                            {!! Form::text('address', $user->address, ['class' => 'form-control text-center rounded']) !!}
                        @endif
                    </div>
                    <!-- Pais -->
                    <div class="mb-3 col-6">
                        <label for="country" class="form-label ml-5">{{ __('web.country_title') }}</label>
                    </div>
                    <div class="mb-3 col-6">
                        <select id="country" name="country" class="form-control text-center country_value">
                            <option selected>{{ __('web.country_title') }}</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>

                    </div>
                    <!-- Ciudad -->
                    <div class="mb-3 col-6">
                        <label for="city" style="display:none;"
                            class="form-label ml-5 city-label">{{ __('web.city_title') }}</label>
                    </div>
                    <div class="mb-3 col-6">
                        <select style="" id="city" name="city" class="form-control text-center city-select-es">
                        </select>

                    </div>

                </div>
            </div>
            <!-- MODIFICAR -->
            <div class="container border border-dark d-flex justify-content-center rounded-bottom shadow-lg p-3 bg-white">
                <div class="row">
                    <div class="mb-3 mt-3 col-12">
                        <a href="{{ route('profiles.index') }}"
                            class="btn btn-dark btn-lg">{{ __('web.return_title') }}</a>
                        <input class="btn btn-dark btn-lg" type="submit" value="{{ __('web.modificate_button') }}">

                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        @endif
    
@endsection
@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(function() {
        $('.country_value').change(function() {
            var country = $(this).val();
            var dades= null;
            var select = document.getElementById("city");
            select.innerHTML = '';
            $.get("{{url("cities")}}/"+country, function(data, status) {
                dades=data;
                for (let index = 0; index < dades.length; index++) {
                const dada = dades[index];
                var option=document.createElement("option");
                option.value=dada["id"];
                option.text=dada["name"];
                select.appendChild(option);
            }
            });
        });
    });
</script>
@stop
