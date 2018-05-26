<div class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-devider"></li>
                <!-- <li class="nav-label">Home</li> -->
                <li class="<?php echo active('dashboard'); ?>"> <a href="<?php echo url('admin/dashboard'); ?>"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span></a></li>                        
                <li class="<?php echo active('users'); ?>"> <a href="<?php echo url('admin/users'); ?>"><i class="fa fa-users"></i><span class="hide-menu">Users</span></a></li>                        
                <li class="<?php echo active('logs'); ?>"> <a href="<?php echo url('admin/logs'); ?>"><i class="fa fa-folder"></i><span class="hide-menu">Logs</span></a></li>                       
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</div>
