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
                    <div class="sidebar sidebar-black-dodger-blue sidebar-left"
                         data-perfect-scrollbar>

                       

                        <a href="<?php echo base_url(); ?>"
                           class="sidebar-brand ">
                            <!-- <img class="sidebar-brand-icon" src="<?php echo $this->config->item('default_url'); ?>/assets/common/images/illustration/teacher/128/white.svg" alt="Luma"> -->

                            <span class="avatar avatar-xl sidebar-brand-icon h-auto">

                                <span class="avatar-title rounded bg-primary"><img src="<?php echo $this->config->item('default_url'); ?>/assets/image/<?php echo $logo; ?>"
                                     alt="logo"
                                     class="img-fluid" /></span>

                            </span>

                            <span><?php echo $company_name; ?></span>
                        </a>

                        <div class="sidebar-heading">Instructor</div>
                        <ul class="sidebar-menu">

                            <li class="sidebar-menu-item active">
                                <a class="sidebar-menu-button"
                                   href="<?php echo site_url(); ?>trainer-dashboard">
                                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">school</span>
                                    <span class="sidebar-menu-text">Instructor Dashboard</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button"
                                   href="<?php echo site_url(); ?>training-list">
                                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">post_add</span>
                                    <span class="sidebar-menu-text">Add Courses</span>
                                </a>
                            </li>

                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button"
                                   href="<?php echo site_url(); ?>course-list">
                                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">import_contacts</span>
                                    <span class="sidebar-menu-text">Manage Courses</span>
                                </a>
                            </li>

                           <!--  <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button"
                                   href="<?php echo site_url(); ?>online-meeting-attendees-list">
                                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">face</span>
                                    <span class="sidebar-menu-text">Online Classes</span>
                                </a>
                            </li>

                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button"
                                   href="<?php echo site_url(); ?>coming-soon">
                                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">mail_outline</span>
                                    <span class="sidebar-menu-text">Communication</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button"
                                   href="<?php echo site_url(); ?>coming-soon">
                                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">trending_up</span>
                                    <span class="sidebar-menu-text">Performance</span>
                                </a>
                            </li>-->
                        </ul>

                        <!-- // END Sidebar Content -->

                    </div>
                </div>
            </div>

            <!-- // END Drawer -->

        </div>

        <!-- // END Drawer Layout -->