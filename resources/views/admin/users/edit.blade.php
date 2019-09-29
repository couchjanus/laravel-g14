@extends('layouts.admin')
<!-- Breadcrumbs-->
@section('breadcrumb')
  @include('layouts.partials.admin._breadcrumb', ['title' => $title, 'url'=>'admin/users', 'back'=>true])
@endsection

@section('content')
    <div class="w-full mx-auto">
    <div class="bg-white shadow-md rounded my-6">
        <form class="w-full" method="POST" action="{{route('admin.users.update', $user->id)}}">
            @csrf
            @method('put')
            <div class="flex flex-wrap mx-3 mb-6">
                <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-name">
                    User Name
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-name" name="name" type="text" value="{{ $user->name }}">
                </div>
            </div>
            <div class="flex flex-wrap mx-3 mb-6">
                <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">
                    User Email
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-email" name="email" type="email" value="{{$user->email}}">
                </div>
            </div>
            <div class="flex flex-wrap mx-3 mb-6">
                <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                    User Password
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" name="password" type="password" value="{{$user->password}}">
                </div>
            </div>
            <div class="md:flex md:items-center mb-2 mt-2 mx-auto">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">Update</button>
            </div>
        </form>
    </div>
    </div>   
@endsection
