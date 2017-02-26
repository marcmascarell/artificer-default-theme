<section class="sidebar">

  <ul class="sidebar-menu">
    @foreach ($menu as $menuItem)
      <li class="{{ ($menuItem['route'] == Route::currentRouteName()) ? 'active' : '' }}">
        <a href="{{ URL::route($menuItem['route']) }}">
          {!! $menuItem['icon'] !!}
          <span>
              {{ $menuItem['title'] }}
          </span>
        </a>
      </li>
    @endforeach

    <li class="treeview {{ isset($model) ? 'active' : '' }}">
      <a href="#">
        <i class="fa fa-th"></i>
        <span>Models</span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>

      <ul class="treeview-menu">

        @foreach ($models as $model)

          @if ( ! $model->settings()->hidden)
            <li class="{{ ('admin.model.all' == Route::currentRouteName() && Route::current()->getParameter('slug') == $model->route) ? 'active' : '' }}">
              <a href="{{ route('admin.model.all', ['slug' => $model->route]) }}">
                <i class="fa fa-angle-right"></i>
                <span>{{ $model->settings()->title }}</span>
              </a>
            </li>
          @endif

        @endforeach
      </ul>
    </li>

  </ul>
</section>
<!-- /.sidebar -->