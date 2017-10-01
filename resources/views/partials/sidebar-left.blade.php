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

    {{--<li class="treeview {{ isset($model) ? 'active' : '' }}">--}}
      {{--<a href="#">--}}
        {{--<i class="fa fa-th"></i>--}}
        {{--<span>Models</span>--}}
        {{--<i class="fa fa-angle-left pull-right"></i>--}}
      {{--</a>--}}

      {{--<ul class="treeview-menu">--}}
      {{--</ul>--}}
    {{--</li>--}}

          <el-menu default-active="1"
                   :default-openeds="['1']"
                   theme="dark">
            <el-submenu index="1">
              <template slot="title">
                <i class="fa fa-th" style="margin-right: .4em"></i> Models
              </template>
                @foreach ($models as $key => $model)
                  <router-link :to="{name: 'index', params: {model: '{{ $model['slug'] }}'}}">
                    <el-menu-item index="1-{{ $key }}">{{ $model['title'] }}</el-menu-item>
                  </router-link>
                @endforeach
            </el-submenu>
          </el-menu>

        {{--@foreach ($models as $model)--}}

          {{--@if ( ! $model->settings()->hidden)--}}
            {{--<li class="{{ ('admin.model.all' == Route::currentRouteName() && Route::current()->getParameter('slug') == $model->route) ? 'active' : '' }}">--}}
              {{--<a href="{{ route('admin.model.all', ['slug' => $model->route]) }}">--}}
                {{--<i class="fa fa-angle-right"></i>--}}
                {{--<span>{{ $model->settings()->title }}</span>--}}
              {{--</a>--}}
            {{--</li>--}}
          {{--@endif--}}

        {{--@endforeach--}}


  </ul>
</section>
<!-- /.sidebar -->