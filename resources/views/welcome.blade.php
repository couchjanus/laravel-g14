@extends('layouts.app')

@section('title')
   Welcome
@endsection

{{--Page--}}
@section('content')
<h1>Hello There</h1>

<div id="root">
  <!-- In a default Laravel root, Vue will render inside an #root div -->
  <!-- Components will go here -->

  <ais-instant-search
    :search-client="searchClient"
    index-name="{{ (new App\Post)->searchableAs() }}"
  >
    <ais-search-box placeholder="Search articles..."></ais-search-box>

    <ais-hits>
      <template slot="item" slot-scope="{ item }">
        <div>
          <h1>@{{ item.title }}</h1>
          <h4>@{{ item.content }}</h4>
        </div>
      </template>
    </ais-hits>
  </ais-instant-search>
</div>

<script>
new Vue({
  data: function() {
    return {
      searchClient: algoliasearch(
        '{{ config('scout.algolia.id') }}',
        '{{ Algolia\ScoutExtended\Facades\Algolia::searchKey(App\Post::class) }}',
      ),
    };
  },
  el: '#root',
});
</script>

@endsection
