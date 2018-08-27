@include('components.header')
<script>
    var baseUrl='{{asset('/')}}';
</script>
@include('components.nav')
@yield('content')
@include('components.footer')

