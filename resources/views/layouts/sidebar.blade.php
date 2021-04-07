<aside class="main-sidebar" id="sidebar-wrapper">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel" style="height: 60px;">
            <div class="pull-left image">
                <img src="{{ auth()->user()->image_path }}" class="img-responsive" alt="User Image" style="margin-top: 10px;" />
            </div>
            <div class="pull-left info">
                <p>{{ auth()->user()->username}}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            @include('layouts.menu')
        </ul>        
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>