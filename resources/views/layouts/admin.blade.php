@extends('layouts.master')

@section('meta')
   <!-- Custom meta for this template -->
   @include('layouts.partials.admin._meta')
@endsection

@section('styles')
   <!-- Custom styles for this template -->
   @include('layouts.partials.admin._styles')
@endsection

@section('navbar')
    @include('layouts.partials.admin._navbar')
@endsection

@section('main')                    
    <div class="main-c">
        <div class="main-wrap">
            <!-- Sidebar -->
            @include('layouts.partials.admin._sidebar')
        </div>

        <div class="main-cont">
            @yield('breadcrumb')
            @yield('content')
        </div>

    </div>
@endsection

@section('scripts')
    <!-- Custom scripts for this template -->
    @include('layouts.partials.admin._scripts')
@endsection
