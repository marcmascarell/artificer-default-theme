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
    </ul>
</section>
<!-- /.sidebar -->