@extends( 'layouts.plantilla' )

@section('contenido')

    <div class="container bg-light mx-auto text-center">

        <h2 class="text-primary my-4">Ingrese su usuario y contraseña</h2>

        @if( session('menssage') )
        <div class="alert alert-danger">
            {{ session('menssage') }}
        </div>
        @endif

        <form action="" method="POST">
            @csrf

            <input class="my-2" name="email" type="email" placeholder="ejemplo@mail.com">
            <br>
            <input class="my-2" name="password" type="password" placeholder="contraseña">
            <br>
            <button class="btn btn-primary my-2">Ingresar</button>
        </form>
    </div>

@endsection
