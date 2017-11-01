<section class="sidebar">
    <ul class="sidebar-menu">
        <el-menu default-active="1"
                 :default-openeds="['1']"
                 theme="dark">

            @foreach ($menu as $menuItem)
                <el-menu-item index="0">
                    <a href="{{ URL::route($menuItem['route']) }}" target="{{ $menuItem['target'] ?? null }}">
                        <i class="{{ $menuItem['icon'] }}" style="margin-right: .4em"></i>

                        <span slot="title">
                            {{ $menuItem['title'] }}
                        </span>
                    </a>
                </el-menu-item>
            @endforeach


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