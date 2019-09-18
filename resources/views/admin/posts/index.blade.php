@extends('layouts.admin')

@section('content')
<div class="w-11/12 mx-auto">
  <div class="bg-white shadow-md rounded my-6">
    <table> 
      <thead>
        <tr>
          <th>Id</th>
          <th>Title</th>
          <th>Actions</th>
        </tr>
      </thead>
    
      <tbody>
      @foreach ($posts as $post)
        <tr>
          <td>{{$post->id}}</td>
          <td>{{$post->title}}</td>
          <td>
            <a href="#" class="bg-green-300 hover:bg-green-500">Edit</a>
            <a href="#" class="bg-blue-300 hover:bg-blue-500">View</a>
            <a href="#" class="bg-red-300 hover:bg-red-500">Delete</a>
          </td>
        </tr>
        <!-- /.blog-post -->
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
