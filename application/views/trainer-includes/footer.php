<?php 
   $company = setting('config_company_name', 'config');
   $company_name = $company->value;
   $logo_img = setting('config_logo', 'config');
   $logo = $logo_img->value;
   $icon_img = setting('config_icon', 'config');
   $icon = $icon_img->value;
   ?>
  <!-- Footer -->

                <div class=" border-top-2 mt-auto">
                    <div class="container page__container page-section d-flex flex-column">
                        <p class="text-70 brand mb-24pt">
                            <img class="brand-icon"
                             src="<?php echo $this->config->item('default_url'); ?>/assets/image/<?php echo $logo; ?>"
                             width="30"
                             alt="<?php echo $company_name; ?>"> <?php echo $company_name; ?>
                        </p>
                        <p class="measure-lead-max text-50 small mr-8pt"><?php echo $company_name; ?> is a beautifully crafted user interface for modern Education Platforms, including Courses & Tutorials, Video Lessons, Student and Teacher Dashboard, Curriculum Management, Earnings and Reporting, ERP, HR, CMS, Tasks, Projects, eCommerce and more.</p>
                        <p class="mb-8pt d-flex">
                            <a href=""
                               class="text-70 text-underline mr-8pt small">Terms</a>
                            <a href=""
                               class="text-70 text-underline small">Privacy policy</a>
                        </p>
                        <p class="text-50 small mt-n1 mb-0">Copyright 2019 &copy; All rights reserved.</p>
                    </div>
                </div>

                <!-- // END Footer -->

                 <script src="<?php echo $this->config->item('default_url'); ?>/assets/common/vendor/jquery.min.js"></script>

        <!-- Bootstrap -->
        <script src="<?php echo $this->config->item('default_url'); ?>/assets/common/vendor/popper.min.js"></script>
        <script src="<?php echo $this->config->item('default_url'); ?>/assets/common/vendor/bootstrap.min.js"></script>

        <!-- Perfect Scrollbar -->
        <script src="<?php echo $this->config->item('default_url'); ?>/assets/common/vendor/perfect-scrollbar.min.js"></script>

        <!-- DOM Factory -->
        <script src="<?php echo $this->config->item('default_url'); ?>/assets/common/vendor/dom-factory.js"></script>

        <!-- MDK -->
        <script src="<?php echo $this->config->item('default_url'); ?>/assets/common/vendor/material-design-kit.js"></script>

        <!-- App JS -->
        <script src="<?php echo $this->config->item('default_url'); ?>/assets/common/js/app.js"></script>

        <!-- Preloader -->
        <script src="<?php echo $this->config->item('default_url'); ?>/assets/common/js/preloader.js"></script>

        <!-- Global Settings -->
        <script src="<?php echo $this->config->item('default_url'); ?>/assets/common/js/settings.js"></script>

        <!-- Moment.js -->
        <script src="<?php echo $this->config->item('default_url'); ?>/assets/common/vendor/moment.min.js"></script>
        <script src="<?php echo $this->config->item('default_url'); ?>/assets/common/vendor/moment-range.js"></script>

        <!-- Chart.js -->
        <script src="<?php echo $this->config->item('default_url'); ?>/assets/common/vendor/Chart.min.js"></script>

        <!-- UI Charts Page JS -->
        <script src="<?php echo $this->config->item('default_url'); ?>/assets/common/js/chartjs-rounded-bar.js"></script>
        <script src="<?php echo $this->config->item('default_url'); ?>/assets/common/js/chartjs.js"></script>

        <!-- Chart.js Samples -->
        <script src="<?php echo $this->config->item('default_url'); ?>/assets/common/js/page.instructor-dashboard.js"></script>

        <!-- List.js -->
        <script src="<?php echo $this->config->item('default_url'); ?>/assets/common/vendor/list.min.js"></script>
        <script src="<?php echo $this->config->item('default_url'); ?>/assets/common/js/list.js"></script>

        <!-- select2.js -->
        <script src="<?php echo $this->config->item('default_url'); ?>/assets/common/vendor/select2/select2.min.js"></script>

        <script src="<?php echo $this->config->item('default_url'); ?>/assets/common/vendor/daterangepicker.js"></script>

        <!-- toaster -->
        <script src="<?php echo $this->config->item('default_url'); ?>/assets/common/vendor/toastr.min.js"></script>
        <script src="<?php echo $this->config->item('default_url'); ?>/assets/common/js/toastr.js"></script>

        <script src="<?php echo $this->config->item('default_url'); ?>/assets/common/js/aws/app.js"></script>
        
    </body>

</html>