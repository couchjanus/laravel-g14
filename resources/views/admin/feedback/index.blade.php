@extends('layouts.admin')

<!-- Breadcrumbs-->
@section('breadcrumb')
  @include('layouts.partials.admin._breadcrumb', ['title' => $title])
@endsection

@section('content')
<div class="w-11/12 mx-auto">
  <div class="bg-white shadow-md rounded my-6">
    <table> 
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Message</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
    
      <tbody>
        @forelse($feedbacks as $feedback)
        <tr>
            <th scope="row">{{ $feedback->id  }}</th>
            <td>{{ $feedback->name }}</td>
            <td>{{ $feedback->email }}</td>
            <td>{{ $feedback->message }}</td>
            <td>
                <a href="{{ action('Admin\FeedbackController@destroy', $feedback->id) }}" class="bg-red-300 hover:bg-red-500">
                    Delete
                </a>
            </td>
        </tr>
        @empty
            <tr class="table-warning">
                <td class="text-center" colspan="5">
                    There are no feedbacks yet.
                </td>
            </tr>
        @endforelse

      </tbody>
    </table>
    {{ $feedbacks->links() }}
  </div>
</div>
@endsection
