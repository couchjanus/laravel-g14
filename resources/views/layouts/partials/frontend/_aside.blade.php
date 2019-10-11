<aside class="col-md-4 blog-sidebar">
        <div class="p-3 mb-3 bg-light rounded">
            <h4 class="font-italic">About</h4>
            <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
        </div>

        <div class="p-3">
            <h4 class="font-italic">Search the blog</h4>
            <form action="#" class="search-form"  action="{{ url('/search') }}" method="get">
              <div class="form-group">
                <input type="search" placeholder="What are you looking for?"  name="q" value="{{ request('q') }}">
                <button type="submit" class="submit"><i class="icon-search"></i>Go!</button>
              </div>
            </form>
        </div>

        <div class="p-3">
            <h4 class="font-italic">Elsewhere</h4>
            <ol class="list-unstyled">
            <li><a href="#">GitHub</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Facebook</a></li>
            </ol>
        </div>
    </aside><!-- /.blog-sidebar -->