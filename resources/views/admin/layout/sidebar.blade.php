<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            @can('system-auth')
            <li class="treeview active">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>系统管理</span>
                    <span class="pull-right-container"></span>
                </a>

                <ul class="treeview-menu">
                    <li><a href="/admin/permission"><i class="fa fa-circle-o"></i> 权限管理</a></li>
                    <li><a href="/admin/user"><i class="fa fa-circle-o"></i> 用户管理</a></li>
                    <li><a href="/admin/role"><i class="fa fa-circle-o"></i> 角色管理</a></li>
                </ul>
            @endcan
            </li>

            @can('post-auth')
            <li class="active treeview">
                <a href="/admin/post">
                    <i class="fa fa-dashboard"></i> <span>文章管理</span>`
                </a>
            </li>
                @endcan
             @can('topic-auth')
            <li class="active treeview">
                <a href="/admin/topics">
                    <i class="fa fa-dashboard"></i> <span>专题管理</span>
                </a>
            </li>
                @endcan
                @can('notice-auth')
            <li class="active treeview">
                <a href="/admin/notices">
                    <i class="fa fa-dashboard"></i> <span>通知管理</span>
                </a>
            </li>
                    @endcan
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>