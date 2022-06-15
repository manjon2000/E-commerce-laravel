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

        @foreach ($tienda as $store)
        
        
            {!!Form::model($store, ['method'=>'PUT', 'url'=>'/stores/'.$store->id])!!}
                @csrf

                <div class="mb-3">
                    <label for="" class="form-label">Nombre de la tienda</label>
                    <input type="text" name="nameStore" class="form-control" value="{{$store->name}}">
                </div>
                @error('nameStore')
                    <div class="alert alert-danger w-25 text-center shadow">
                        Campo requerido
                    </div>
                @enderror
                <div class="mb-3">
                    <label for="" class="form-label">Direccion de la tienda</label>
                    <input type="text" name="addressStore" class="form-control" value="{{$store->address}}" >
                </div>
                @error('addressStore')
                    <div class="alert alert-danger w-25 text-center shadow">
                        Campo requerido
                    </div>
                @enderror
                <div class="mb-3">
                    <label for="" class="form-label">Correo electronico de la tienda</label>
                    <input type="email" name="emailStore" value="{{$store->email}}" class="form-control">
                </div>
                @error('emailStore')
                    <div class="alert alert-danger w-25 text-center shadow">
                        Tiene que ser un email valido, y es requerido.
                    </div>
                @enderror
                <div class="mb-3">
                    <label for="" class="form-label">Telefono de la tienda</label>
                    <input type="tel" name="telStore" value="{{$store->phone_number}}"" class="form-control">
                </div>

                @error('telStore')
                    <div class="alert alert-danger w-25 text-center shadow">
                        El campo es requerido, tiene que contener mas de 6 digitos.
                    </div>
                @enderror

                

                <div class="mb-3">
                    <label for="" class="form-label">Horario de la tienda (Inicio)</label>
                    <input type="time" value="{{$store->schedule_start}}" placeholder="+34" class="form-control" name="timeStart">
                </div>
                @error('timeStart')
                    <div class="alert alert-danger w-25 text-center shadow">
                        El campo es requerido, tiene que contener maximo  5 digitos.
                    </div>
                @enderror
                
                <div class="mb-3">
                    <label for="" class="form-label">Horario de la tienda (Fin)</label>
                    <input type="time" value="{{$store->schedule_end}}" placeholder="+34" class="form-control" name="timeEnd">
                </div>
                @error('timeEnd')
                    <div class="alert alert-danger w-25 text-center shadow">
                        El campo es requerido, tiene que contener maximo  5 digitos.
                    </div>
                @enderror 

                <div class="mb-3 mt-3">
                    <button type="submit" class="btn btn-outline-primary px-5 w-50">Crear tienda</button>
                </div>
        
            {!!Form::close()!!}
        @endforeach


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
