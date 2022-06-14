<!-- EXTENDS -->
@extends('adminlte::page')
<!-- TITLE -->
@section('title', 'E-commerce - Profile')
<!-- STYLES -->
<link rel="stylesheet" href="{{asset('css/profile.css')}}">
<!-- CONTENT -->
@section('content')
            <!-- HEADER -->
            <div class="container border border-dark d-flex justify-content-center rounded-top mt-5">
                <div class="row">
                    <div class="mb-3 col-12">
                        <h1>{{__('web.profile_title')}}</h1>
                    </div>
                </div>
            </div>
            <!-- CONTENT INFORMATION-->
            @foreach($users as $user)
            @if(Auth::User())
            <div class="container border border-dark d-flex justify-content-center">
                <div class="row">
                        <!-- Nombre usuario -->
                        <div class="mb-3 col-6 vvv">
                            <label for="username" class="form-label mt-5 ml-5">{{__('web.username_title')}}</label>
                        </div>
                        <div class="mb-3 col-6">
                            <label name="username" class="form-label mt-5">{{$user->name}}</label>
                        </div>
                        <!-- Email -->
                        <div class="mb-3 col-6 vvv">
                            <label for="username" class="form-label ml-5">{{__('web.email_title')}}</label>
                        </div>
                        <div class="mb-3 col-6">
                            <label name="username" class="form-label">{{$user->email}}</label>
                        </div>
                        <!-- Nombre -->
                        <div class="mb-3 col-6 vvv">
                            <label for="username" class="form-label ml-5">{{__('web.first_name_title')}}</label>
                        </div>
                        <div class="mb-3 col-6">
                            <label name="username" class="form-label">@if(is_null($user->first_name)){{__('web.not-data')}} @else{{$user->first_name}}@endif</label>
                        </div>
                        <!-- Apellidos -->
                        <div class="mb-3 col-6 vvv">
                            <label for="username" class="form-label ml-5">{{__('web.last_name_title')}}</label>
                        </div>
                        <div class="mb-3 col-6">
                            <label name="username" class="form-label">@if(is_null($user->last_name)){{__('web.not-data')}} @else{{$user->last_name}}@endif</label>
                        </div>
                        <!-- Dirección -->
                        <div class="mb-3 col-6 vvv">
                            <label for="username" class="form-label ml-5">{{__('web.address_title')}}</label>
                        </div>
                        <div class="mb-3 col-6">
                            <label name="username" class="form-label">@if(is_null($user->address)){{__('web.not-data')}} @else{{$user->address}}@endif</label>
                        </div>
                        <!-- Ciudad -->
                        <div class="mb-3 col-6 vvv">
                            <label for="username" class="form-label ml-5">{{__('web.city_title')}}</label>
                        </div>
                        <div class="mb-3 col-6">
                        @foreach($cities as $city)
                            <label name="username" class="form-label">@if(is_null($user->city_id)){{__('web.not-data')}} @else{{$city->name}}@endif</label>
                        @endforeach
                        </div>
                        <!-- País -->
                        <div class="mb-3 col-6 vvv">
                            <label for="username" class="form-label ml-5 mb-5">{{__('web.country_title')}}</label>
                        </div>
                        <div class="mb-3 col-6">
                        @foreach($countries as $country)
                            <label name="username" class="form-label mb-5">@if(is_null($user->city_id)){{__('web.not-data')}} @else{{$country->name}}@endif</label>
                        @endforeach
                        </div>
                </div>
            </div>
            <!-- MODIFICAR -->
            <div class="container border border-dark d-flex justify-content-center rounded-bottom shadow-lg p-3 bg-white">
                <div class="row">
                    <div class="mb-3 mt-3 col-12">
                        <a class="btn btn-dark btn-lg" 
                        href="{{route('profiles.edit', ['profile'=>$user->id])}}">
                        {{__('web.edit_profile')}}</a>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
@endsection