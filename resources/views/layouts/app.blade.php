@extends('layouts.front')

@section('title')
   Blog Post Title
@endsection

@section('styles')
    <!-- Custom styles for this template -->
@endsection

@section('navigation')
    @include('layouts.partials.frontend._navigation')
@endsection

{{--Page--}}
@section('page')
    <main role="main" class="container">
        <div class="row">
            <div class="col-md-12">
                @yield('content')
            </div><!-- /.blog-main -->
        </div><!-- /.row -->
    </main><!-- /.container -->
@endsection

@section('footer')
       @include('layouts.partials.frontend._footer') 
@endsection

{{--Scripts--}}
@section('scripts')
    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace()
    </script>
@endsection
