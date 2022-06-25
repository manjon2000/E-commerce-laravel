<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cart Products</title>
    <style>
        body
        {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif
        }
        .alert
        {
            width: 400px;
            height: max-content;
            padding: 10px 0px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            right: 10px;
            top: 10px;
            opacity: 0;
        }
        .alert p 
        {
            color: white;
        }
        .alert-success
        {
            background-color: #229954 ;
            transition: opacity ease-in-out 1s;
        }
        .opacity-show
        {
            opacity:  1 !important;
            transition: opacity ease-in-out 1s;
        }
    </style>
</head>
<body>
    <div class="alert alert-success">
        <p>Product Data is successfully Stored</p>
    </div>
    @if ( count($productos) > 0 && count($sizes) > 0 )



    @foreach ($productos as $producto)

        <div class="card-product">
        {{-- name product --}}
            <div class="name_product">
                <h1>{{$producto -> name}}</h1>
            </div> 
        {{-- name product --}}

        {{-- Select sizes --}}
            <select class="items">
                {{-- <option selected value="null">Seleciona una talla</option> --}}
                @foreach ($sizes as $size)
                    <option value="{{ $size -> 	id }}">{{ $size -> 	name_inferior }}</option>
                @endforeach
            </select>
        {{-- Select sizes --}}

        {{-- Input hidden id porduct --}}
            <input type="text" value="{{$producto -> id}}" id="idProduct" hidden>
            <input type="text" value="{{$producto -> category_id}}" id="idCategory" hidden>
        {{-- Input hidden id porduct --}}

        {{-- button add cart --}}
            @if (Auth::User())
                <button class="addtocart">Añadir al carrito</button>
                @else
                    <a href="{{route('login')}}">Añadir al carrito</a>
            @endif
        {{-- button add cart --}}

        </div>
    @endforeach 
      
            
       
        
           
              

    @endif



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function(){
            $('.addtocart').click(function(e){
                e.preventDefault();

                // Get value size to element
                const selectChild  = $(this.parentNode).children();
                console.log(selectChild[1].value);
                console.log(selectChild[2].value);

                // Ajax data
                $.ajax({
                    url: "{{  route('demoCartAjax')  }}",
                    method: 'POST',
                    data : {
                        "_token": "{{ csrf_token() }}",
                        "product": selectChild[2].value,
                        "size": selectChild[1].value,
                        "category": selectChild[3].value
                        
                    },
                    success : function(result, status)
                    {
                        if(status === 'success')
                        {
                            $('.alert-success').addClass('opacity-show');
                            setTimeout(() => {
                                $('.alert-success').removeClass('opacity-show');
                            }, 4000);
                        }

                    }
                });
            });
        });
    </script>
</body>
</html>