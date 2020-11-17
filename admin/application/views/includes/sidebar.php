</div>
                    <!-- // END drawer-layout__content -->

                    <!-- Drawer -->

                    <div class="mdk-drawer js-mdk-drawer"
                         id="default-drawer">
                        <div class="mdk-drawer__content top-navbar">
                            <div class="sidebar sidebar-dark-pickled-bluewood sidebar-left sidebar-p-t"
                                 data-perfect-scrollbar>

                                <!-- Sidebar Content -->

                                <div class="sidebar-heading"><?php echo $user_group; ?></div>
                                <ul class="sidebar-menu">
									<?php foreach($menus as $menu) { ?>
									  <?php if ($menu['href']) { ?>
										<li class="sidebar-menu-item <?php if($this->uri->segment(1)== $menu['short']){echo "active";}?>">
											<a class="sidebar-menu-button"
											   href="<?php echo $menu['href']; ?>">
												<span class="material-icons sidebar-menu-icon sidebar-menu-icon--left"><?php echo $menu['icon']; ?></span>
												<?php echo $menu['name']; ?>
											</a>
										</li>
									  <?php } else if($menu['children']) { ?>
										<li class="sidebar-menu-item">
											<a class="sidebar-menu-button js-sidebar-collapse"
											   data-toggle="collapse"
											   href="#<?php echo $menu['id']; ?>">
												<span class="material-icons sidebar-menu-icon sidebar-menu-icon--left"><?php echo $menu['icon']; ?></span>
												<?php echo $menu['name']; ?>
												<span class="ml-auto sidebar-menu-toggle-icon"></span>
											</a>
											<ul class="sidebar-submenu collapse sm-indent"
												id="<?php echo $menu['id']; ?>">
												<?php foreach ($menu['children'] as $children) { ?>
													<li class="sidebar-menu-item <?php if($this->uri->segment(1)==$children['short']){echo "active";}?>">
														<a class="sidebar-menu-button"
														   href="<?php echo $children['href']; ?>">

															<span class="sidebar-menu-text"><?php echo $children['name']; ?></span>
														</a>
													</li>
												<?php } ?>
											</ul>
										</li>
									  <?php } ?>
									<?php } ?>
                                </ul>
                                <!-- // END Sidebar Content -->
                            </div>
                        </div>
                    </div>

                    <!-- // END Drawer -->

                </div>
                <!-- // END drawer-layout -->

            </div>
            <!-- // END Header Layout Content -->

        </div>
        <!-- // END Header Layout -->

        <!-- jQuery -->
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

        <!-- App Settings (safe to remove) -->
        <!-- <script src="<?php echo $this->config->item('default_url'); ?>/assets/common/js/app-settings.js"></script> -->
		
		
		<script>
			$(window).on('load', function() {
				changeCity();
				changeCurrency();
			});
		</script>

		<script type="text/javascript"><!--
			function changeCurrency() {
				var currency_id = document.getElementById("config_currency").value;
				if(currency_id){
					$.ajax({
						type:'POST',
						url:'<?php echo base_url(); ?>common/common/getCurrency',
						data:{currency_id: currency_id},
						dataType: 'json',
						success:function(json){
							document.getElementById("currency_symbol").value = json['currency_symbol'];

						},
						error: function (xhr, ajaxOptions, thrownError) {
							alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
						}
					});
				}
			}
		//--></script>
		<script>
			function changeCity() {
				var state_id = document.getElementById("config_state").value;
				if(state_id){
					$.ajax({
						type:'POST',
						url:'<?php echo base_url(); ?>common/common/getCity',
						data:{state_id: state_id},
						dataType: 'json',
						success:function(json){
							html = '<option value=""><?php echo $text_select; ?></option>';

							if (json['city'] && json['city'] != '') {
								for (i = 0; i < json['city'].length; i++) {
									html += '<option value="' + json['city'][i]['id'] + '">' + json['city'][i]['name'] + '</option>';
									if (json['city'][i]['id'] == '<?php echo $config_city; ?>') {
										html += '<option value="' + json['city'][i]['id'] + '" selected="selected">' + json['city'][i]['name'] + '</option>';
									}
								}
							} else {
								html += '<option value="0" selected="selected"><?php echo $text_none; ?></option>';
							}
							$('select[name=\'config_city\']').html(html);

						},
						error: function (xhr, ajaxOptions, thrownError) {
							alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
						}
					});
				}
			}
		</script>
		<script type="text/javascript"><!--
			$('select[name=\'config_country\']').on('change', function() {
				var country_id = $(this).val();
				if(country_id){
					$.ajax({
						type:'POST',
						url:'<?php echo base_url(); ?>common/common/getState',
						data:{country_id: country_id},
						dataType: 'json',
						success:function(json){
							console.log(json['states']);
							html = '<option value=""><?php echo $text_select; ?></option>';
							if (json['states'] && json['states'] != '') {
								for (i = 0; i < json['states'].length; i++) {
									html += '<option value="' + json['states'][i]['id'] + '">' + json['states'][i]['name'] + '</option>';
									if (json['states'][i]['id'] == '<?php echo $config_state; ?>') {
										html += '<option value="' + json['states'][i]['id'] + '" selected="selected">' + json['states'][i]['name'] + '</option>';
									}
								}
							} else {
								html += '<option value="0" selected="selected"><?php echo $text_none; ?></option>';
							}

							$('select[name=\'config_state\']').html(html);
							
							document.getElementById("config_city").value = '';

						},
						error: function (xhr, ajaxOptions, thrownError) {
							alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
						}
					});
				}
			});
			$('select[name=\'config_country\']').trigger('change');
		//--></script>
    </body>

</html>