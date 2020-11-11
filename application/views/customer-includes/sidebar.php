<?php 
    $company = setting('config_company_name', 'config');
    $company_name = $company->value;
    $logo_img = setting('config_logo', 'config');
    $logo = $logo_img->value;
    $icon_img = setting('config_icon', 'config');
    $icon = $icon_img->value;
?>
</div>
<!-- // END drawer-layout__content -->

            <!-- Drawer -->

            <div class="mdk-drawer js-mdk-drawer"
                 id="default-drawer">
                <div class="mdk-drawer__content">
                    <div class="sidebar sidebar-dark-pickled-bluewood sidebar-left"
                         data-perfect-scrollbar>

                        <a href="<?php echo base_url(); ?>"
                           class="sidebar-brand ">
                            <!-- <img class="sidebar-brand-icon" src="<?php echo base_url('assets/common/images/illustration/student/128/white.svg'); ?>" alt="Luma"> -->

                            <span class="avatar avatar-xl sidebar-brand-icon h-auto">

                                <span class="avatar-title rounded bg-primary"><img src="<?php echo $this->config->item('default_url'); ?>/assets/image/<?php echo $logo; ?>"
                                         class="img-fluid"
                                         alt="logo" /></span>

                            </span>

                            <span><?php echo $company_name; ?></span>
                        </a>

                        <div class="sidebar-heading">Student</div>
                        <ul class="sidebar-menu">

                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button"
                                   href="<?php echo base_url(); ?>dashboard">
                                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">home</span>
                                    <span class="sidebar-menu-text">Home</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button"
                                   href="<?php echo base_url(); ?>coming-soon">
                                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">local_library</span>
                                    <span class="sidebar-menu-text">Browse Courses</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button"
                                   href="<?php echo base_url(); ?>mycourses">
                                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">search</span>
                                    <span class="sidebar-menu-text">My Courses</span>
                                </a>
                            </li>

                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button"
                                   href="<?php echo site_url(); ?>online-meeting-attendees-list">
                                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">face</span>
                                    <span class="sidebar-menu-text">Online Classes</span>
                                </a>
                            </li>


                        <!-- // END Sidebar Content -->

                    </div>
                </div>
            </div>

            <!-- // END Drawer -->

        </div>

        <!-- // END Drawer Layout -->