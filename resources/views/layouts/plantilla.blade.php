@include( 'layouts.header' )
{{-- @include( 'layouts.nav' ) --}}

    <main class="container-fluid">
        @yield('contenido')
        @yield('contenidox')

    </main>

@include( 'layouts.footer' )
