@extends('adminlte::page')

@section('title', 'E-commerce - Categories')

@section('content_header')
    <h1 class="card card-body p-3"> Tiendas | {{ __('web.list') }}</h1>
@stop

@section('content')



    <div class="card card-body p-3">

        <div class="mb-5">
            <a class="btn btn-primary px-5 shadow rounded" href="{{ route('stores.index') }}">{{ __('web.return') }}</a>
        </div>

        <form action="{{ route('stores.store') }}" method="post" class="mb-5">

            @csrf
            
            <div class="mb-3">
                <label for="" class="form-label">Nombre de la tienda</label>
                <input type="text" name="nameStore" class="form-control" placeholder="Game ª">
            </div>
            @error('nameStore')
                <div class="alert alert-danger w-25 text-center shadow">
                    Campo requerido
                </div>
            @enderror
            <div class="mb-3">
                <label for="" class="form-label">Direccion de la tienda</label>
                <input type="text" name="addressStore" class="form-control" placeholder="C/ plaza de los caidos, 45">
            </div>
            @error('addressStore')
                <div class="alert alert-danger w-25 text-center shadow">
                    Campo requerido
                </div>
            @enderror
            <div class="mb-3">
                <label for="" class="form-label">Correo electronico de la tienda</label>
                <input type="email" name="emailStore" placeholder="example@dominio.es" class="form-control">
            </div>
            @error('emailStore')
                <div class="alert alert-danger w-25 text-center shadow">
                    Tiene que ser un email valido, y es requerido.
                </div>
            @enderror
            <div class="mb-3">
                <label for="" class="form-label">Telefono de la tienda</label>
                <input type="tel" name="telStore" placeholder="+34" class="form-control">
            </div>

            @error('telStore')
                <div class="alert alert-danger w-25 text-center shadow">
                    El campo es requerido, tiene que contener mas de 6 digitos.
                </div>
            @enderror


            <!-- Pais -->
            <div class="mb-3">
                <label for="country" class="form-label">{{__('web.country_title')}}</label>
                    <select name="country_select" class="form-control country_value">
                        <option selected>{{__('web.country_title')}}</option>
                        @foreach($countries as $country)
                            <option value="{{$country->id}}">{{$country->name}}</option>
                        @endforeach
                    </select>
                    <input type="hidden" name="country_value" class="value_country_input" value="0">
                    
            </div>
            <!-- Ciudad -->
            <div  class="mb-3">
                <label for="city" style="display:none;" class="form-label  city-label">{{__('web.city_title')}}</label>
                <select style="display:none;" name="city_es" class="form-control city-select-es">
                            @foreach($citiesspains as $cityspain)
                                <option value="{{$cityspain->id}}">{{$cityspain->name}}</option>
                            @endforeach
                </select>
                
            
                <select style="display:none;" name="city_fr" class="form-control  city-select-fr">
                            @foreach($citiesfrances as $cityfrance)
                                <option value="{{$cityfrance->id}}">{{$cityfrance->name}}</option>
                            @endforeach
                </select>
            </div>


            <div class="mb-3">
                <label for="" class="form-label">Horario de la tienda (Inicio)</label>
                <input type="time" placeholder="+34" class="form-control" name="timeStart">
            </div>
            @error('timeStart')
                <div class="alert alert-danger w-25 text-center shadow">
                    El campo es requerido, tiene que contener maximo  5 digitos.
                </div>
            @enderror
            
            <div class="mb-3">
                <label for="" class="form-label">Horario de la tienda (Fin)</label>
                <input type="time" placeholder="+34" class="form-control" name="timeEnd">
            </div>
            @error('timeEnd')
                <div class="alert alert-danger w-25 text-center shadow">
                    El campo es requerido, tiene que contener maximo  5 digitos.
                </div>
            @enderror

            <div class="mb-3 mt-5">
                <button type="submit" class="btn btn-outline-primary px-5 w-50">Crear tienda</button>
            </div>
        
        </form>


    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(function(){
        $('.country_value').change(function(){
            $value= $(this).val();
            $('.value_country_input').val($value);
            if($('.value_country_input').val() == 1){
                $('.city-select-fr').css('display', 'none');
                $('.city-label').css('display', '');
                $('.city-select-es').css('display', '');

            } else {
                $('.city-select-es').css('display', 'none');
                $('.city-label').css('display', '');
                $('.city-select-fr').css('display', '');
                
            }
        });
    });
</script>
@stop
