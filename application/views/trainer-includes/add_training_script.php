<!--         <script type="text/javascript">
			$(document).ready(function() {
				$(".days_select").select2({'width':'100%'});
				$("#no_of_session").val(0);
			});

			$('#training_type').change(function(){ 
				// $(".days_select").select2().show();;
				var data_value = $("#training_type option:selected").attr('data-value');

			    if(data_value == "Online"){
			    	$('#online_section').removeClass('hide');
			    }

			    if(data_value == "Offline" || data_value == undefined){
			    	$('#online_section').addClass('hide');
			    }
			});

			$('#datepicker').daterangepicker({
				singleDatePicker: true,
				timePicker: true,
				minDate: new Date(),
			    autoApply: true,
			    opens: "center",
			    drops: "up",
			    isInvalidDate: function(date) {
			    	var days = ['0','1','2','3','4','5','6'];
			    	var selected = $('.days_select').val();
			    	var non_selected_days = [];
			      	$.each( days, function( key, value ) {
			      	  var not_in_array = jQuery.inArray(value, selected);
			      	  if(not_in_array == '-1'){
			      	  	non_selected_days.push(value);
			      	  }
			      	 
					});

					for(var ii = 0; ii < non_selected_days.length; ii++){
					    if (date.days() == non_selected_days[ii]){
					      return true;
					    } 
					}
				},
				locale: {
			      format: 'MM/DD/YYYY hh:mm A'
			    }

			}, function(start, end, label) {
				 $('#start_date').val(start.format('YYYY-MM-DD'));
				 $('#start_time').val(start.format('hh:mm A'));
			  // console.log('New date range selected: ' + start.format('YYYY-MM-DD hh:mm A') );
			});

			$("#session_duration").keyup(function(){
		       var course_duration = $("#course_duration").val();
		       var session_duration = $("#session_duration").val();

		       var no_of_session = Math.ceil(course_duration/session_duration);

		       if(session_duration == ''){
		       	$("#no_of_session").val(0);
		       } else {
		       	$("#no_of_session").val(no_of_session);
		       }
		    });

			$('.next_button').bind('click', function(e){
				$this = $(this);
		    	$data_value = $this.data('value');

		    	$('#tab_'+ ($data_value) + '_content').removeClass('show active');
		    	$('#tab_'+ ($data_value)).removeClass('active');

		    	$('#tab_'+ ($data_value + 1) + '_content').addClass('show active');
		    	$('#tab_'+ ($data_value+1)).addClass('active');

			});

			$('.pervious_button').bind('click', function(e){
				$this = $(this);
		    	$data_value = $this.data('value');

		    	$('#tab_'+ ($data_value) + '_content').removeClass('show active');
		    	$('#tab_'+ ($data_value)).removeClass('active');

		    	$('#tab_'+ ($data_value-1) + '_content').addClass('show active');
		    	$('#tab_'+ ($data_value-1)).addClass('active');

			});

			$('.add_section').bind('click', function(e){
				$this = $(this);
		    	$data_value = $this.data('value');

		    	$tabs ='<div class="row section section_'+ ($data_value+1) +'">';
			    	$tabs+= '<div class="col-xl-12 card">';
			        	$tabs+= '<div class="card-body">';
			        		$tabs+= '<div class="form-group row">';
			        			$tabs+= '<label class="col-lg-3 col-form-label"><?php echo $text_Section_Name; ?></label>';
			        			$tabs+= '<div class="col-lg-9">';
			        				$tabs+= '<input type="text" data-value = '+ ($data_value+1) +' id="section_name_'+ ($data_value+1) +'" class="form-control section_name" required >';
			        				$tabs+='<div id="" class="error_duplication hide dup_section_alert_'+ ($data_value+1) +'">';
										$tabs+='Duplicate value';
									$tabs+='</div>';
			        				$tabs+= '<div class="invalid-feedback">';
			        					$tabs+= 'Please provide valid <?php echo $text_Section_Name; ?>.';
			        				$tabs+= '</div>';
			        			$tabs+= '</div>';
			        		$tabs+= '</div>';

			        		$tabs+= '<div class="form-group row">';
			        			$tabs+= '<label class="col-lg-3 col-form-label"><?php echo $text_sort_order; ?></label>';
			        			$tabs+= '<div class="col-lg-9">';
			        				$tabs+= '<input type="text" data-value = '+ ($data_value+1) +' id="sort_order_'+ ($data_value+1) +'" class="form-control sort_order" placeholder="Integer only" required onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;">';
			        				$tabs+='<div id="" class="error_duplication hide dup_sort_alert_'+ ($data_value+1) +'">';
										$tabs+='Duplicate value';
									$tabs+='</div>';
			        				$tabs+= '<div class="invalid-feedback">';
			        					$tabs+= 'Please provide valid <?php echo $text_sort_order; ?>.';
			        				$tabs+= '</div>';
			        			$tabs+= '</div>';
			        		$tabs+= '</div>';

			        		$tabs+='<div class="text-right">';
								$tabs+='<button type="button" data-value="'+ ($data_value+1) +'" id="remove_section_'+ ($data_value+1) +'" class="btn btn-danger remove_section">Remove</button>';
							$tabs+='</div>';

			        	$tabs+= '</div>';
			        $tabs+= '</div>';
			    $tabs+= '</div>';

		        $('#new_section').append($tabs);

		        $('.add_section').data('value', $data_value+1); 
			});

		    $(document).on("click",".remove_section",function(e) {
		        $this = $(this);
		    	$data_value = $this.data('value');
		    	$('.section_' + $data_value).remove();

		    	var section_counter = 1;
		    	$('.section').each(function(){
		    		$('.section_name').attr('id', 'section_name_' + section_counter);
			        section_counter++;
			    });

			   
		    	$('.section').each(function(){
		    		$('.sort_order').attr('id', 'sort_order_' + sort_counter);
			        sort_counter++;
			    });

		    });

		    $(document).on("change",".sort_order",function(e) {
		    	  var $this = $(this),
			      val = $this.val();

			      var data_value = $this.data('value');
			      
				  var barcodes = $('.sort_order').not($this).map(function() {
				    return $(this).val();
				  }).get();
				  
				  if (barcodes.indexOf(val) > -1) {
				  	$('#sort_order_'+data_value).val('');
				    $('.dup_sort_alert_'+data_value).removeClass('hide').show('fast').delay(3000).hide('fast');
				  } else {
				  	$('.dup_sort_alert_'+data_value).addClass('hide');
				  }
		    });

		    $(document).on("change",".section_name",function(e) {
		    	  var $this = $(this),
			      val = $this.val();

			      var data_value = $this.data('value');
			      
				  var barcodes = $('.section_name').not($this).map(function() {
				    return $(this).val();
				  }).get();
				  
				  if (barcodes.indexOf(val) > -1) {
				  	$('#section_name_'+data_value).val('');
				    $('.dup_section_alert_'+data_value).removeClass('hide').show('fast').delay(3000).hide('fast');
				  } else {
				  	$('.dup_section_alert_'+data_value).addClass('hide');
				  }
		    });

		    $(document).on("change",".section_details_name",function(e) {
		    	  var $this = $(this),
			      val = $this.val();

			      var data_value = $this.data('value');
			      
				  var barcodes = $('.section_details_name').not($this).map(function() {
				    return $(this).val();
				  }).get();
				  
				  if (barcodes.indexOf(val) > -1) {
				  	$('#section_details_name_'+data_value).val('');
				    $('.dup_section_alert_'+data_value).removeClass('hide').show('fast').delay(3000).hide('fast');
				  } else {
				  	$('.dup_section_alert_'+data_value).addClass('hide');
				  }
		    });

		    $(document).on("change",".section_details_sort_order",function(e) {
		    	  var $this = $(this),
			      val = $this.val();

			      var data_value = $this.data('value');
			      
				  var barcodes = $('.section_details_sort_order').not($this).map(function() {
				    return $(this).val();
				  }).get();
				  
				  if (barcodes.indexOf(val) > -1) {
				  	$('#section_details_sort_order_'+data_value).val('');
				    $('.dup_sort_alert_'+data_value).removeClass('hide').show('fast').delay(3000).hide('fast');
				  } else {
				  	$('.dup_sort_alert_'+data_value).addClass('hide');
				  }
		    });

			(function() {
			  'use strict';
			  window.addEventListener('load', function() {
			    // Fetch all the forms we want to apply custom Bootstrap validation styles to
			    var forms = document.getElementsByClassName('basic_form');
			    // Loop over them and prevent submission
			    var validation = Array.prototype.filter.call(forms, function(form) {
			      form.addEventListener('submit', function(event) {
			        if (form.checkValidity() === false) {
			          event.preventDefault();
			          event.stopPropagation();
			        } else {
			        	event.preventDefault();
			            event.stopPropagation();

			        	var training_name = $("#training_name").val();
						var training_description = $("#training_description").val();
						var program_level = $("#program_level").val();
						var course_category = $("#course_category option:selected").val();
					  	var training_type = $("#training_type option:selected").val();
					  	var currencies = $("#currencies option:selected").val();
					  	var price = $("#price").val();
						var days_selected = $('.days_select').val();
					  	var course_duration = $("#course_duration").val();
					  	var session_duration = $("#session_duration").val();
					  	var no_of_session = $("#no_of_session").val();
					  	var start_date = $("#start_date").val();
					  	var start_time = $("#start_time").val();


					  	var data_value = $("#submit_basic_details").data('value');

					 	$.ajax({
					    	url: add_trainer_basic_details,
					    	type: "POST",
					    	data:{
					     	  	training_name : training_name,
					   	    	course_category : course_category,
					    	    training_type : training_type,
					    	    currencies : currencies,
					    	    price : price,
					    	    days_selected : days_selected,
					    	    course_duration : course_duration,
					   	    	session_duration : session_duration,
					    	    no_of_session : no_of_session,
					    	    start_date : start_date,
					    	    start_time : start_time,  
					     	},
					        success: function(data, response){
					            response = JSON.parse(data);

					            toastr.options = {
								  "closeButton": false,
								  "debug": false,
								  "newestOnTop": false,
								  "progressBar": false,
								  "positionClass": "toast-top-right",
								  "preventDuplicates": false,
								  "onclick": null,
								  "showDuration": "300",
								  "hideDuration": "500",
								  "timeOut": "2000",
								  "extendedTimeOut": "1000",
								  "showEasing": "swing",
								  "hideEasing": "linear",
								  "showMethod": "fadeIn",
								  "hideMethod": "fadeOut"
								}

					            if(response != "" && response.success == 1){

					            	toastr.success(response.message, 'Well Done!');
					            	$('#next_button_'+data_value).removeClass('disabled');
					            	$('.training_master_id').data('value', response.training_master_id);
					            }else{
					            	toastr.warning(response.message, 'Opps!');
					            }
					        }
				  		});
			        }
			        form.classList.add('was-validated');
			      }, false);
			    });
			  }, false);
			})();

			$('#section_list_tab a').on('click', function (e) {
			  e.preventDefault()
			  $(this).tab('show')
			});

			(function() {
			  'use strict';
			  window.addEventListener('load', function() {
			    // Fetch all the forms we want to apply custom Bootstrap validation styles to
			    var forms = document.getElementsByClassName('section_form');
			    // Loop over them and prevent submission
			    var validation = Array.prototype.filter.call(forms, function(form) {
			      form.addEventListener('submit', function(event) {
			        if (form.checkValidity() === false) {
			          event.preventDefault();
			          event.stopPropagation();
			        } else {
			        	event.preventDefault();
			            event.stopPropagation();

			            var training_master_id = $("#training_master_id").data('value');
			            var sections = [];
			            var section_counter = 1;
			            $(".section_name").each(function(){
					        var section_name = $("#section_name_"+section_counter).val();
					        sections.push(section_name);
					        section_counter++;
					    });

			            var sort_orders = [];
			            var sort_counter = 1;
					    $(".sort_order").each(function(){
					        var sort_order = $("#sort_order_"+sort_counter).val();
					        sort_orders.push(sort_order);
					        sort_counter++;
					    });

			             
			        	var section_name = sections;
					  	var sort_order = sort_orders;
					  	var data_value = $("#submit_section").data('value');

					 	$.ajax({
					    	url: add_trainer_section_info,
					    	type: "POST",
					    	data:{
					     	  	training_master_id : training_master_id,
					   	    	section_name : section_name,
					    	    sort_order : sort_order,  
					     	},
					        success: function(data, response){
					            response = JSON.parse(data);

					            toastr.options = {
								  "closeButton": false,
								  "debug": false,
								  "newestOnTop": false,
								  "progressBar": false,
								  "positionClass": "toast-top-right",
								  "preventDuplicates": false,
								  "onclick": null,
								  "showDuration": "300",
								  "hideDuration": "500",
								  "timeOut": "2000",
								  "extendedTimeOut": "1000",
								  "showEasing": "swing",
								  "hideEasing": "linear",
								  "showMethod": "fadeIn",
								  "hideMethod": "fadeOut"
								}

					            if(response != "" && response.success == 1){
					            	toastr.success(response.message, 'Well Done!');
					            	// $('#section_alert').removeClass('hide');
					            	$('#next_button_'+data_value).removeClass('disabled');

					            	var tabs ='';
					            	var tabs_content ='';
					            	jQuery.each(response.training_section_data, function(sort_order, val ) {
					            		var active = '';
					             	    var hide = '';
					            	    var show = '';

							            tabs +='<div class="accordion js-accordion accordion--boxed " id="#section_content_'+sort_order+'" data-domfactory-upgraded="accordion">';
                                    tabs +='<div class="accordion__item">';
                                        tabs += '<a href="#" class="accordion__toggle collapsed" data-toggle="collapse" data-target="#section_content_'+sort_order+'" data-parent="#section_content_'+sort_order+'" aria-expanded="false">';
                                             tabs += '<span class="flex">'+val.section_name+'</span>';
                                             tabs += '<span class="accordion__toggle-icon material-icons">keyboard_arrow_down</span>';
                                         tabs += '</a>';
                                         tabs += '<div class="accordion__menu collapse" id="section_content_'+sort_order+'" style="">';
                                            tabs += ' <div class="accordion__menu-link">';
                                               tabs += '<div class="tab-pane section_details_nav fade show" data_value = "'+sort_order+'" id="section_content_'+val.training_section_id+'" role="tabpanel" aria-labelledby="section_content_'+val.training_section_id+'-tab" style="width: inherit;">';
                                                        tabs +='<input type="hidden" id="hidden_section_id" data-value = '+val.training_section_id+' class="form-control hidden_section_id" value ="'+val.training_section_id+'"/>';
                                                        tabs += '<div class="">';
                                                        tabs +='<form action="#"  name="section_details_form_'+sort_order+'"  data-value="'+sort_order+'" id="section_details_form_'+sort_order+'" class="section_details_form_'+sort_order+'" p_t_10" novalidate>'
                                                            tabs += '<div class="form-group row">';
                                                                tabs += '<label class="col-lg-3 col-form-label"><?php echo $text_Section_Name; ?></label>';
                                                                tabs += '<div class="col-lg-9">';
                                                                    tabs += '<input type="text" name="section_details_name" data-value = '+ sort_order +'_'+ sort_order +' id="section_details_name_'+ sort_order +'_'+ sort_order +'" class="form-control section_details_name" required >';
                                                                    tabs +='<div id="" class="error_duplication hide dup_section_alert_'+ sort_order +'_'+ sort_order +'">';
                                                                        tabs +='Duplicate value';
                                                                    tabs +='</div>';
                                                                    tabs += '<div class="invalid-feedback">';
                                                                    tabs += 'Please provide valid <?php echo $text_Section_Name; ?>.';
                                                                    tabs += '</div>';
                                                                tabs += '</div>';
                                                            tabs += '</div>';

                                                            tabs += '<div class="form-group row">';
                                                                tabs += '<label class="col-lg-3 col-form-label"><?php echo $text_sort_order; ?></label>';
                                                                tabs += '<div class="col-lg-9">';
                                                                    tabs += '<input type="text" name="section_details_sort_order" data-value = '+ sort_order +'_'+ sort_order +' id="section_details_sort_order_'+ sort_order +'_'+ sort_order +'" class="form-control section_details_sort_order" placeholder="Integer only" required onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;">';
                                                                    tabs +='<div id="" class="error_duplication hide dup_section_sort_alert_'+ sort_order +'_'+ sort_order +'">';
                                                                        tabs +='Duplicate value';
                                                                    tabs +='</div>';
                                                                    tabs += '<div class="invalid-feedback">';
                                                                        tabs += 'Please provide valid <?php echo $text_sort_order; ?>.';
                                                                    tabs += '</div>';
                                                                tabs += '</div>';
                                                            tabs += '</div>';

															$tabs+= '<div class="form-group row">';
																$tabs+= '<label class="col-lg-3 col-form-label"><?php echo $text_video_time; ?></label>';
																$tabs+= '<div class="col-lg-9">';
																	$tabs+= '<input type="text"  name="section_details_video_time" data-value = '+ $data_value +'_'+ sort_counter +' id="section_details_video_time_'+ $data_value +'_'+ sort_counter +'" class="form-control section_details_video_time" required >';
																	$tabs+='<div id="" class="hide '+ $data_value +'_'+ sort_counter +'">';
																		
																	$tabs+='</div>';
																	$tabs+= '<div class="invalid-feedback">';
																		$tabs+= 'Please provide valid <?php echo $text_video_time; ?>.';
																	$tabs+= '</div>';
																$tabs+= '</div>';
															$tabs+= '</div>';

                                                            tabs += '<div class="form-group row">';
                                                                tabs += '<label class="col-lg-3 col-form-label">Upload</label>';
                                                                tabs += '<div class="col-lg-9">';
                                                                    tabs += '<input name="section_details_file" id="section_details_file_'+ sort_order +'" class="form-control " type="file" accept="video/*">';
                                                                  
                                                                    tabs+='<div id="section_details_file_error_'+ sort_order +'" class="error_duplication hide dup_sort_alert_'+ sort_order +'">';
                                                                        tabs+='Please select video file';
                                                                    tabs+='</div>';
                                                                tabs += '</div>';
                                                            tabs += '</div>';
                                                            tabs += '<div id="section_progress_'+ sort_order +'" class="progress progress-xs hide">';
                                                                tabs += '<div id="section_details_progress_'+ sort_order +'" class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100">';
                                                                    tabs += ' </div>';
                                                            tabs += '</div>';

                                                            tabs+='<div id="section_details_file_success_'+ sort_order +'" class="successfully_upload hide">';
                                                                tabs+='Successfully Uploaded';
                                                            tabs+='</div>';

                                                            tabs+='<div id="section_details_file_uerror_'+ sort_order +'" class="error_duplication hide">';
                                                                tabs+='Upload Field';
                                                            tabs+='</div>';

                                                        tabs += '</form>';

                                                            tabs +='<div class="text-right">';
                                                                tabs +='<button type="submit" onclick="addsection_details('+ sort_order +', event)" data-value="'+ sort_order +'" id="section_details_form_button_'+ sort_order +'" class="btn btn-primary section_details_form" data-style="expand-right">Submit</button>';
                                                            tabs +='</div>';

                                                            tabs +='<div class="total_new_section_details_main" id="new_section_details_'+ sort_order +'">';
                                                        
                                                            tabs +='</div>';

                                                            tabs +='<div class="text-left">';
                                                                tabs +='<button type="button" data-value="'+ sort_order +'" class="add_section_details btn btn-primary" ">Add Section</button>';
                                                            tabs +='</div>';
                                                        tabs += '</div>';
                                                    tabs += '</div>';
                                            tabs += '</div>';
                                       tabs += '</div>';
                                    tabs += '</div>';
                                    
                                tabs += '</div>';
									});

									$('#section_list_content').append(tabs);

					            }else{
					            	toastr.warning(response.message, 'Opps!');
					            }
					        }
				  		});
			        }
			        form.classList.add('was-validated');
			      }, false);
			    });
			  }, false);
			})();

			$(document).on("click",".add_section_details",function(e) {
				$this = $(this);
		    	$data_value = $this.data('value');

		    	sort_counter = 2;
		    	$(".total_new_section_details").each(function(){
			        sort_counter++;
			    });

			    $tabs ='<form action="#" name="section_details_form_'+ $data_value +'_'+ sort_counter +'" data-value="'+ $data_value +'_'+ sort_counter +'" id="section_details_form_'+ $data_value +'_'+ sort_counter +'" class="section_details_form_'+ $data_value +'_'+ sort_counter +'" novalidate>';

		    	$tabs+='<div class="row total_new_section_details section_details_'+ $data_value +'_'+ sort_counter +'">';
			    	$tabs+= '<div class="col-xl-12 ">';
			    		$tabs+= '<hr>';
			        	$tabs+= '<div class="">';
			        		$tabs+= '<div class="form-group row">';
			        			$tabs+= '<label class="col-lg-3 col-form-label"><?php echo $text_Section_Name; ?></label>';
			        			$tabs+= '<div class="col-lg-9">';
			        				$tabs+= '<input type="text"  name="section_details_name" data-value = '+ $data_value +'_'+ sort_counter +' id="section_details_name_'+ $data_value +'_'+ sort_counter +'" class="form-control section_details_name" required >';
			        				$tabs+='<div id="" class="error_duplication hide dup_section_alert_'+ $data_value +'_'+ sort_counter +'">';
										$tabs+='Duplicate value';
									$tabs+='</div>';
			        				$tabs+= '<div class="invalid-feedback">';
			        					$tabs+= 'Please provide valid <?php echo $text_Section_Name; ?>.';
			        				$tabs+= '</div>';
			        			$tabs+= '</div>';
			        		$tabs+= '</div>';

			        		$tabs+= '<div class="form-group row">';
			        			$tabs+= '<label class="col-lg-3 col-form-label"><?php echo $text_sort_order; ?></label>';
			        			$tabs+= '<div class="col-lg-9">';
			        				$tabs+= '<input type="text" name="section_details_sort_order" data-value = '+ $data_value +'_'+ sort_counter +' id="section_details_sort_order_'+ $data_value +'_'+ sort_counter +'" class="form-control section_details_sort_order" placeholder="Integer only" required onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;">';
			        				$tabs+='<div id="" class="error_duplication hide dup_sort_alert_'+ $data_value +'_'+ sort_counter +'">';
										$tabs+='Duplicate value';
									$tabs+='</div>';
			        				$tabs+= '<div class="invalid-feedback">';
			        					$tabs+= 'Please provide valid <?php echo $text_sort_order; ?>.';
			        				$tabs+= '</div>';
			        			$tabs+= '</div>';
			        		$tabs+= '</div>';

			        		$tabs+= '<div class="form-group row">';
			        			$tabs+= '<label class="col-lg-3 col-form-label">Upload</label>';
			        			$tabs+= '<div class="col-lg-9">';
			        				$tabs+= '<input name="section_details_file" class="form-control" id="section_details_file_'+ $data_value +'_'+ sort_counter +'" type="file" accept="video/*">';
			        				$tabs+='<div id="section_details_file_error_'+ $data_value +'_'+ sort_counter +'" class="error_duplication hide dup_sort_alert_'+ $data_value +'_'+ sort_counter +'">';
										$tabs+='Please select video file';
									$tabs+='</div>';
			        			$tabs+= '</div>';
			        		$tabs+= '</div>';
			        		$tabs += '<div id="section_progress_'+ $data_value +'_'+ sort_counter +'" class="progress progress-xs hide">';
			        			$tabs += '<div id="section_details_progress_'+ $data_value +'_'+ sort_counter +'" class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100">';
			        				$tabs += ' </div>';
			        		$tabs += '</div>';

			        		$tabs+='<div id="section_details_file_success_'+ $data_value +'_'+ sort_counter +'" class="successfully_upload hide">';
								$tabs+='Successfully Uploaded';
							$tabs+='</div>';

							$tabs+='<div id="section_details_file_uerror_'+ $data_value +'_'+ sort_counter +'" class="error_duplication hide">';
								$tabs+='Upload Field';
							$tabs+='</div>';

			        		$tabs +='<div class="text-right">';
								
							$tabs +='</div>';

			        		$tabs+='<div class="text-right">';
								$tabs+='<button type="button" data-value="'+ $data_value +'_'+ sort_counter +'" id="remove_section_'+ $data_value +'_'+ sort_counter +'" class="btn btn-danger remove_section_details">Remove</button> &nbsp;';


								$tabs +='<button type="submit"  onclick="addsection_details(\''+ $data_value +'_'+ sort_counter +'\', event)" data-value="'+ $data_value +'_'+ sort_counter +'" id="section_details_form_button_'+ $data_value +'_'+ sort_counter +'" class="btn btn-primary section_details_form">Submit</button>';
							$tabs+='</div>';

			        	$tabs+= '</div>';
			        $tabs+= '</div>';
			    $tabs+= '</div>';

		        $('#new_section_details_'+$data_value).append($tabs);
			});

			$(document).on("click",".remove_section_details",function(e) {
		        $this = $(this);
		    	$data_value = $this.data('value');

		    	$('.section_details_form_' + $data_value).remove();

		    });

		    function addsection_details(id,e) {

		    	event.preventDefault();

		     	var file_check = document.getElementById('section_details_file_'+id).value;

		   		if(file_check == ''){
		   			$('#section_details_file_error_'+id).removeClass('hide').show('fast').delay(3000).hide('fast');
		   		} else {
		   			var section_id = $("#hidden_section_id").data('value');
		  
					var fd = new FormData();
					fd.append("section_id", section_id);
		    
					jQuery.each($('#section_details_file_'+id)[0].files, function(i, file) {
					    fd.append("file_", file);
					});

					var other_data = $('#section_details_form_'+id).serializeArray();
					$.each(other_data,function(key,input){
					    fd.append(input.name,input.value);
					});

					$('#section_progress_'+id).removeClass('hide');
					$('#section_details_form_button_'+id).addClass('hide');

					$.ajax({

					   url: add_trainer_section_details_info,
					   method: 'POST',
					   data: fd,			   
		               processData: false,
		  			   contentType: false,
		  			   xhr: function () {
					        var xhr = $.ajaxSettings.xhr();
					        xhr.upload.onprogress = function (e) {
					            // For uploads
					            if (e.lengthComputable) {
					            	for (var i = 1; i <= 50; i++) {
					            		var percentComplete = (e.loaded / e.total) * i;
					            	}
					                $('#section_details_progress_'+id).attr('aria-valuenow', percentComplete).css('width', percentComplete+'%');
					            }
					        };
					        return xhr;
					    },

					    success: function (data) {
					    	toastr.options = {
							  "closeButton": false,
							  "debug": false,
							  "newestOnTop": false,
							  "progressBar": false,
							  "positionClass": "toast-top-right",
							  "preventDuplicates": false,
							  "onclick": null,
							  "showDuration": "300",
							  "hideDuration": "500",
							  "timeOut": "2000",
							  "extendedTimeOut": "1000",
							  "showEasing": "swing",
							  "hideEasing": "linear",
							  "showMethod": "fadeIn",
							  "hideMethod": "fadeOut"
							}

					    	response = JSON.parse(data);

					            if(response != "" && response.success == 1){
					            	toastr.success(response.message, 'Well Done!');
					            	// $('#section_details_file_success_'+id).removeClass('hide');
					            	$('#remove_section_'+id).addClass('hide');
					        		$('#section_details_progress_'+id).attr('aria-valuenow', 100).css('width', 100+'%');


					            } else {
					            	toastr.success(response.message, 'Opps!');
					            	// $('#section_details_file_uerror_'+id).removeClass('hide');
					            	$('#section_details_progress_'+id).attr('aria-valuenow', 0).css('width', 0+'%');
					            	$('#section_progress_'+id).addClass('hide');
					            	$('#section_details_form_button_'+id).removeClass('hide');
					            }
					    	
					    }
				    });
		   		}
		    }
        </script> -->
<script type="text/javascript">
	$(document).ready(function() {
		$(".days_select").select2({'width':'100%'});
		$("#no_of_session").val(0);
	});

	$('#training_type').change(function(){ 
		// $(".days_select").select2().show();;
		var data_value = $("#training_type option:selected").attr('data-value');

	    if(data_value == "Online"){
	    	$('#online_section').removeClass('hide');
	    }

	    if(data_value == "Offline" || data_value == undefined){
	    	$('#online_section').addClass('hide');
	    }
	});

	$('#datepicker').daterangepicker({
		singleDatePicker: true,
		timePicker: true,
		minDate: new Date(),
	    autoApply: true,
	    opens: "center",
	    drops: "up",
	    isInvalidDate: function(date) {
	    	var days = ['0','1','2','3','4','5','6'];
	    	var selected = $('.days_select').val();
	    	var non_selected_days = [];
	      	$.each( days, function( key, value ) {
	      	  var not_in_array = jQuery.inArray(value, selected);
	      	  if(not_in_array == '-1'){
	      	  	non_selected_days.push(value);
	      	  }
	      	 
			});

			for(var ii = 0; ii < non_selected_days.length; ii++){
			    if (date.days() == non_selected_days[ii]){
			      return true;
			    } 
			}
		},
		locale: {
	      format: 'MM/DD/YYYY hh:mm A'
	    }

	}, function(start, end, label) {
		 $('#start_date').val(start.format('YYYY-MM-DD'));
		 $('#start_time').val(start.format('hh:mm A'));
	  // console.log('New date range selected: ' + start.format('YYYY-MM-DD hh:mm A') );
	});

	$("#session_duration").keyup(function(){
       var course_duration = $("#course_duration").val();
       var session_duration = $("#session_duration").val();

       var no_of_session = Math.ceil(course_duration/session_duration);

       if(session_duration == ''){
       	$("#no_of_session").val(0);
       } else {
       	$("#no_of_session").val(no_of_session);
       }
    });

	$('.next_button').bind('click', function(e){
		$this = $(this);
    	$data_value = $this.data('value');

    	$('#tab_'+ ($data_value) + '_content').removeClass('show active');
    	$('#tab_'+ ($data_value)).removeClass('active');

    	$('#tab_'+ ($data_value + 1) + '_content').addClass('show active');
    	$('#tab_'+ ($data_value+1)).addClass('active');

	});

	$('.pervious_button').bind('click', function(e){
		$this = $(this);
    	$data_value = $this.data('value');

    	$('#tab_'+ ($data_value) + '_content').removeClass('show active');
    	$('#tab_'+ ($data_value)).removeClass('active');

    	$('#tab_'+ ($data_value-1) + '_content').addClass('show active');
    	$('#tab_'+ ($data_value-1)).addClass('active');

	});

	$('.add_concept').bind('click', function(e){
		$this = $(this);
    	$data_value = $this.data('value');

    	$tabs ='<div class="row concept concept_'+ ($data_value+1) +'">';
	    	$tabs+= '<div class="col-xl-12 card">';
	        	$tabs+= '<div class="card-body">';
	        		$tabs+= '<div class="form-group row">';
	        			$tabs+= '<label class="col-lg-3 col-form-label"><?php echo $text_concept_Name; ?></label>';
	        			$tabs+= '<div class="col-lg-9">';
	        				$tabs+= '<input type="text" data-value = '+ ($data_value+1) +' id="concept_name_'+ ($data_value+1) +'" class="form-control concept_name" required >';
	        				$tabs+='<div id="" class="error_duplication hide dup_concept_alert_'+ ($data_value+1) +'">';
								$tabs+='Duplicate value';
							$tabs+='</div>';
	        				$tabs+= '<div class="invalid-feedback">';
	        					$tabs+= 'Please provide valid <?php echo $text_concept_Name; ?>.';
	        				$tabs+= '</div>';
	        			$tabs+= '</div>';
	        		$tabs+= '</div>';


	        		$tabs+='<div class="text-right">';
						$tabs+='<button type="button" data-value="'+ ($data_value+1) +'" id="remove_concept_'+ ($data_value+1) +'" class="btn btn-danger remove_concept"><i class="fa fa-minus-circle"></i></button>';
					$tabs+='</div>';

	        	$tabs+= '</div>';
	        $tabs+= '</div>';
	    $tabs+= '</div>';

        $('#new_concept').append($tabs);

        $('.add_concept').data('value', $data_value+1); 

	});

    $(document).on("click",".remove_concept",function(e) {
        $this = $(this);
    	$data_value = $this.data('value');
    	$('.concept_' + $data_value).remove();

    	var concept_counter = 1;
    	$('.concept').each(function(){
    		$('.concept_name').attr('id', 'concept_name_' + concept_counter);
	        concept_counter++;
	    });

    });

    $(document).on("change",".concept_name",function(e) {
    	  var $this = $(this),
	      val = $this.val();

	      var data_value = $this.data('value');
	      
		  var barcodes = $('.concept_name').not($this).map(function() {
		    return $(this).val();
		  }).get();
		  
		  if (barcodes.indexOf(val) > -1) {
		  	$('#concept_name_'+data_value).val('');
		    $('.dup_concept_alert_'+data_value).removeClass('hide').show('fast').delay(3000).hide('fast');
		  } else {
		  	$('.dup_concept_alert_'+data_value).addClass('hide');
		  }
    });

	//concepts
	$('.add_section').bind('click', function(e){
		$this = $(this);
    	$data_value = $this.data('value');

    	$tabs ='<div class="row section section_'+ ($data_value+1) +'">';
	    	$tabs+= '<div class="col-xl-12 card">';
	        	$tabs+= '<div class="card-body">';
	        		$tabs+= '<div class="form-group row">';
	        			$tabs+= '<label class="col-lg-3 col-form-label"><?php echo $text_Section_Name; ?></label>';
	        			$tabs+= '<div class="col-lg-9">';
	        				$tabs+= '<input type="text" data-value = '+ ($data_value+1) +' id="section_name_'+ ($data_value+1) +'" class="form-control section_name" required >';
	        				$tabs+='<div id="" class="error_duplication hide dup_section_alert_'+ ($data_value+1) +'">';
								$tabs+='Duplicate value';
							$tabs+='</div>';
	        				$tabs+= '<div class="invalid-feedback">';
	        					$tabs+= 'Please provide valid <?php echo $text_Section_Name; ?>.';
	        				$tabs+= '</div>';
	        			$tabs+= '</div>';
	        		$tabs+= '</div>';

	        		$tabs+= '<div class="form-group row">';
	        			$tabs+= '<label class="col-lg-3 col-form-label"><?php echo $text_sort_order; ?></label>';
	        			$tabs+= '<div class="col-lg-9">';
	        				$tabs+= '<input type="text" data-value = '+ ($data_value+1) +' id="sort_order_'+ ($data_value+1) +'" class="form-control sort_order" placeholder="Integer only" required onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;">';
	        				$tabs+='<div id="" class="error_duplication hide dup_sort_alert_'+ ($data_value+1) +'">';
								$tabs+='Duplicate value';
							$tabs+='</div>';
	        				$tabs+= '<div class="invalid-feedback">';
	        					$tabs+= 'Please provide valid <?php echo $text_sort_order; ?>.';
	        				$tabs+= '</div>';
	        			$tabs+= '</div>';
	        		$tabs+= '</div>';

	        		$tabs+='<div class="text-right">';
						$tabs+='<button type="button" data-value="'+ ($data_value+1) +'" id="remove_section_'+ ($data_value+1) +'" class="btn btn-danger remove_section">Remove</button>';
					$tabs+='</div>';

	        	$tabs+= '</div>';
	        $tabs+= '</div>';
	    $tabs+= '</div>';

        $('#new_section').append($tabs);

        $('.add_section').data('value', $data_value+1); 
	});

    $(document).on("click",".remove_section",function(e) {
        $this = $(this);
    	$data_value = $this.data('value');
    	$('.section_' + $data_value).remove();

    	var section_counter = 1;
    	$('.section').each(function(){
    		$('.section_name').attr('id', 'section_name_' + section_counter);
	        section_counter++;
	    });

	   
    	$('.section').each(function(){
    		$('.sort_order').attr('id', 'sort_order_' + sort_counter);
	        sort_counter++;
	    });

    });

    $(document).on("change",".sort_order",function(e) {
    	  var $this = $(this),
	      val = $this.val();

	      var data_value = $this.data('value');
	      
		  var barcodes = $('.sort_order').not($this).map(function() {
		    return $(this).val();
		  }).get();
		  
		  if (barcodes.indexOf(val) > -1) {
		  	$('#sort_order_'+data_value).val('');
		    $('.dup_sort_alert_'+data_value).removeClass('hide').show('fast').delay(3000).hide('fast');
		  } else {
		  	$('.dup_sort_alert_'+data_value).addClass('hide');
		  }
    });

    $(document).on("change",".section_name",function(e) {
    	  var $this = $(this),
	      val = $this.val();

	      var data_value = $this.data('value');
	      
		  var barcodes = $('.section_name').not($this).map(function() {
		    return $(this).val();
		  }).get();
		  
		  if (barcodes.indexOf(val) > -1) {
		  	$('#section_name_'+data_value).val('');
		    $('.dup_section_alert_'+data_value).removeClass('hide').show('fast').delay(3000).hide('fast');
		  } else {
		  	$('.dup_section_alert_'+data_value).addClass('hide');
		  }
    });

    $(document).on("change",".section_details_name",function(e) {
    	  var $this = $(this),
	      val = $this.val();

	      var data_value = $this.data('value');
	      
		  var barcodes = $('.section_details_name').not($this).map(function() {
		    return $(this).val();
		  }).get();
		  
		  if (barcodes.indexOf(val) > -1) {
		  	$('#section_details_name_'+data_value).val('');
		    $('.dup_section_alert_'+data_value).removeClass('hide').show('fast').delay(3000).hide('fast');
		  } else {
		  	$('.dup_section_alert_'+data_value).addClass('hide');
		  }
    });

    $(document).on("change",".section_details_sort_order",function(e) {
    	  var $this = $(this),
	      val = $this.val();

	      var data_value = $this.data('value');
	      
		  var barcodes = $('.section_details_sort_order').not($this).map(function() {
		    return $(this).val();
		  }).get();
		  
		  if (barcodes.indexOf(val) > -1) {
		  	$('#section_details_sort_order_'+data_value).val('');
		    $('.dup_sort_alert_'+data_value).removeClass('hide').show('fast').delay(3000).hide('fast');
		  } else {
		  	$('.dup_sort_alert_'+data_value).addClass('hide');
		  }
    });

	(function() {
	  'use strict';
	  window.addEventListener('load', function() {
	    // Fetch all the forms we want to apply custom Bootstrap validation styles to
	    var forms = document.getElementsByClassName('basic_form');
	    // Loop over them and prevent submission
	    var validation = Array.prototype.filter.call(forms, function(form) {
	      form.addEventListener('submit', function(event) {
	        if (form.checkValidity() === false) {
	          event.preventDefault();
	          event.stopPropagation();
	        } else {
	        	event.preventDefault();
	            event.stopPropagation();

	        	var training_name = $("#training_name").val();
	        	var training_description = $("#training_description").val();
			  	var course_category = $("#course_category option:selected").val();
			  	var program_level = $("#program_level option:selected").val();
			  	var training_type = $("#training_type option:selected").val();
			  	var currencies = $("#currencies option:selected").val();
			  	var price = $("#price").val();
				var days_selected = $('.days_select').val();
			  	var course_duration = $("#course_duration").val();
			  	var session_duration = $("#session_duration").val();
			  	var no_of_session = $("#no_of_session").val();
			  	var start_date = $("#start_date").val();
			  	var start_time = $("#start_time").val();


			  	var data_value = $("#submit_basic_details").data('value');

			 	$.ajax({
			    	url: add_trainer_basic_details,
			    	type: "POST",
			    	data:{
			     	  	training_name : training_name,
			     	  	training_description : training_description,
			   	    	course_category : course_category,
			   	    	program_level : program_level,
			    	    training_type : training_type,
			    	    currencies : currencies,
			    	    price : price,
			    	    days_selected : days_selected,
			    	    course_duration : course_duration,
			   	    	session_duration : session_duration,
			    	    no_of_session : no_of_session,
			    	    start_date : start_date,
			    	    start_time : start_time,  
			     	},
			        success: function(data, response){
			            response = JSON.parse(data);

			            toastr.options = {
						  "closeButton": false,
						  "debug": false,
						  "newestOnTop": false,
						  "progressBar": false,
						  "positionClass": "toast-top-right",
						  "preventDuplicates": false,
						  "onclick": null,
						  "showDuration": "300",
						  "hideDuration": "500",
						  "timeOut": "2000",
						  "extendedTimeOut": "1000",
						  "showEasing": "swing",
						  "hideEasing": "linear",
						  "showMethod": "fadeIn",
						  "hideMethod": "fadeOut"
						}

			            if(response != "" && response.success == 1){

			            	toastr.success(response.message, 'Well Done!');
			            	$('#next_button_'+data_value).removeClass('disabled');
			            	$('.training_master_id').data('value', response.training_master_id);
			            }else{
			            	toastr.warning(response.message, 'Opps!');
			            }
			        }
		  		});
	        }
	        form.classList.add('was-validated');
	      }, false);
	    });
	  }, false);
	})();

	$('#section_list_tab a').on('click', function (e) {
	  e.preventDefault()
	  $(this).tab('show')
	});

	(function() {
	  'use strict';
	  window.addEventListener('load', function() {
	    // Fetch all the forms we want to apply custom Bootstrap validation styles to									
	    var forms = document.getElementsByClassName('section_form');
	    // Loop over them and prevent submission
	    var validation = Array.prototype.filter.call(forms, function(form) {
	      form.addEventListener('submit', function(event) {
	        if (form.checkValidity() === false) {
	          event.preventDefault();
	          event.stopPropagation();
	        } else {
	        	event.preventDefault();
	            event.stopPropagation();

	            var training_master_id = $("#training_master_id").data('value');
	            var sections = [];
	            var section_counter = 1;
	            $(".section_name").each(function(){
			        var section_name = $("#section_name_"+section_counter).val();
			        sections.push(section_name);
			        section_counter++;
			    });

	            var sort_orders = [];
	            var sort_counter = 1;
			    $(".sort_order").each(function(){
			        var sort_order = $("#sort_order_"+sort_counter).val();
			        sort_orders.push(sort_order);
			        sort_counter++;
			    });

	             
	        	var section_name = sections;
			  	var sort_order = sort_orders;
			  	var data_value = $("#submit_section").data('value');

			 	$.ajax({
			    	url: add_trainer_section_info,
			    	type: "POST",
			    	data:{
			     	  	training_master_id : training_master_id,
			   	    	section_name : section_name,
			    	    sort_order : sort_order,  
			     	},
			        success: function(data, response){
			            response = JSON.parse(data);

			            toastr.options = {
						  "closeButton": false,
						  "debug": false,
						  "newestOnTop": false,
						  "progressBar": false,
						  "positionClass": "toast-top-right",
						  "preventDuplicates": false,
						  "onclick": null,
						  "showDuration": "300",
						  "hideDuration": "500",
						  "timeOut": "2000",
						  "extendedTimeOut": "1000",
						  "showEasing": "swing",
						  "hideEasing": "linear",
						  "showMethod": "fadeIn",
						  "hideMethod": "fadeOut"
						}

			            if(response != "" && response.success == 1){
			            	toastr.success(response.message, 'Well Done!');
			            	// $('#section_alert').removeClass('hide');
			            	$('#next_button_'+data_value).removeClass('disabled');

			            	var tabs ='';
			            	var tabs_content ='';
			            	jQuery.each(response.training_section_data, function(sort_order, val ) {
			            		var active = '';
			             	    var hide = '';
			            	    var show = '';

					            tabs +='<div class="accordion js-accordion accordion--boxed " id="#section_content_'+sort_order+'" data-domfactory-upgraded="accordion">';
                            tabs +='<div class="accordion__item">';
                                tabs += '<a href="#" class="accordion__toggle collapsed" data-toggle="collapse" data-target="#section_content_'+sort_order+'" data-parent="#section_content_'+sort_order+'" aria-expanded="false">';
                                     tabs += '<span class="flex">'+val.section_name+'</span>';
                                     tabs += '<span class="accordion__toggle-icon material-icons">keyboard_arrow_down</span>';
                                 tabs += '</a>';
                                 tabs += '<div class="accordion__menu collapse" id="section_content_'+sort_order+'" style="">';
                                    tabs += ' <div class="accordion__menu-link">';
                                       tabs += '<div class="tab-pane section_details_nav fade show" data_value = "'+sort_order+'" id="section_content_'+val.training_section_id+'" role="tabpanel" aria-labelledby="section_content_'+val.training_section_id+'-tab" style="width: inherit;">';
                                                tabs +='<input type="hidden" id="hidden_section_id" data-value = '+val.training_section_id+' class="form-control hidden_section_id" value ="'+val.training_section_id+'"/>';
                                                tabs += '<div class="">';
                                                tabs +='<form action="#"  name="section_details_form_'+sort_order+'"  data-value="'+sort_order+'" id="section_details_form_'+sort_order+'" class="section_details_form_'+sort_order+'" p_t_10" novalidate>'
                                                    tabs += '<div class="form-group row">';
                                                        tabs += '<label class="col-lg-3 col-form-label"><?php echo $text_Section_Name; ?></label>';
                                                        tabs += '<div class="col-lg-9">';
                                                            tabs += '<input type="text" name="section_details_name" data-value = '+ sort_order +'_'+ sort_order +' id="section_details_name_'+ sort_order +'_'+ sort_order +'" class="form-control section_details_name" required >';
                                                            tabs +='<div id="" class="error_duplication hide dup_section_alert_'+ sort_order +'_'+ sort_order +'">';
                                                                tabs +='Duplicate value';
                                                            tabs +='</div>';
                                                            tabs += '<div class="invalid-feedback">';
                                                            tabs += 'Please provide valid <?php echo $text_Section_Name; ?>.';
                                                            tabs += '</div>';
                                                        tabs += '</div>';
                                                    tabs += '</div>';

                                                    tabs += '<div class="form-group row">';
                                                        tabs += '<label class="col-lg-3 col-form-label"><?php echo $text_sort_order; ?></label>';
                                                        tabs += '<div class="col-lg-9">';
                                                            tabs += '<input type="text" name="section_details_sort_order" data-value = '+ sort_order +'_'+ sort_order +' id="section_details_sort_order_'+ sort_order +'_'+ sort_order +'" class="form-control section_details_sort_order" placeholder="Integer only" required onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;">';
                                                            tabs +='<div id="" class="error_duplication hide dup_section_sort_alert_'+ sort_order +'_'+ sort_order +'">';
                                                                tabs +='Duplicate value';
                                                            tabs +='</div>';
                                                            tabs += '<div class="invalid-feedback">';
                                                                tabs += 'Please provide valid <?php echo $text_sort_order; ?>.';
                                                            tabs += '</div>';
                                                        tabs += '</div>';
                                                    tabs += '</div>';

                                                    tabs += '<div class="form-group row">';
                                                        tabs += '<label class="col-lg-3 col-form-label">Upload</label>';
                                                        tabs += '<div class="col-lg-9">';
                                                            tabs += '<input name="section_details_file" id="section_details_file_'+ sort_order +'" class="form-control " type="file" accept="video/*">';
                                                          
                                                            tabs+='<div id="section_details_file_error_'+ sort_order +'" class="error_duplication hide dup_sort_alert_'+ sort_order +'">';
                                                                tabs+='Please select video file';
                                                            tabs+='</div>';
                                                        tabs += '</div>';
                                                    tabs += '</div>';
                                                    tabs += '<div id="section_progress_'+ sort_order +'" class="progress progress-xs hide">';
                                                        tabs += '<div id="section_details_progress_'+ sort_order +'" class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100">';
                                                            tabs += ' </div>';
                                                    tabs += '</div>';

                                                    tabs+='<div id="section_details_file_success_'+ sort_order +'" class="successfully_upload hide">';
                                                        tabs+='Successfully Uploaded';
                                                    tabs+='</div>';

                                                    tabs+='<div id="section_details_file_uerror_'+ sort_order +'" class="error_duplication hide">';
                                                        tabs+='Upload Field';
                                                    tabs+='</div>';

                                                tabs += '</form>';

                                                    tabs +='<div class="text-right">';
                                                        tabs +='<button type="submit" onclick="addsection_details('+ sort_order +', '+val.training_section_id+', event)" data-value="'+ sort_order +'" id="section_details_form_button_'+ sort_order +'" class="btn btn-primary section_details_form" data-style="expand-right">Submit</button>';
                                                    tabs +='</div>';

                                                    tabs +='<div class="total_new_section_details_main" id="new_section_details_'+ sort_order +'">';
                                                
                                                    tabs +='</div>';

                                                    tabs +='<div class="text-left">';
                                                        tabs +='<button type="button" data-value="'+ sort_order +'" class="add_section_details btn btn-primary" ">Add Section</button>';
                                                    tabs +='</div>';
                                                tabs += '</div>';
                                            tabs += '</div>';
                                    tabs += '</div>';
                               tabs += '</div>';
                            tabs += '</div>';
                            
                        tabs += '</div>';
							});

							$('#section_list_content').append(tabs);

			            }else{
			            	toastr.warning(response.message, 'Opps!');
			            }
			        }
		  		});
	        }
	        form.classList.add('was-validated');
	      }, false);
	    });
	  }, false);
	})();

	$(document).on("click",".add_section_details",function(e) {
		$this = $(this);
    	$data_value = $this.data('value');

    	sort_counter = 2;
    	$(".total_new_section_details").each(function(){
	        sort_counter++;
	    });

	    $tabs ='<form action="#" name="section_details_form_'+ $data_value +'_'+ sort_counter +'" data-value="'+ $data_value +'_'+ sort_counter +'" id="section_details_form_'+ $data_value +'_'+ sort_counter +'" class="section_details_form_'+ $data_value +'_'+ sort_counter +'" novalidate>';

    	$tabs+='<div class="row total_new_section_details section_details_'+ $data_value +'_'+ sort_counter +'">';
	    	$tabs+= '<div class="col-xl-12 ">';
	    		$tabs+= '<hr>';
	        	$tabs+= '<div class="">';
	        		$tabs+= '<div class="form-group row">';
	        			$tabs+= '<label class="col-lg-3 col-form-label"><?php echo $text_Section_Name; ?></label>';
	        			$tabs+= '<div class="col-lg-9">';
	        				$tabs+= '<input type="text"  name="section_details_name" data-value = '+ $data_value +'_'+ sort_counter +' id="section_details_name_'+ $data_value +'_'+ sort_counter +'" class="form-control section_details_name" required >';
	        				$tabs+='<div id="" class="error_duplication hide dup_section_alert_'+ $data_value +'_'+ sort_counter +'">';
								$tabs+='Duplicate value';
							$tabs+='</div>';
	        				$tabs+= '<div class="invalid-feedback">';
	        					$tabs+= 'Please provide valid <?php echo $text_Section_Name; ?>.';
	        				$tabs+= '</div>';
	        			$tabs+= '</div>';
	        		$tabs+= '</div>';

	        		$tabs+= '<div class="form-group row">';
	        			$tabs+= '<label class="col-lg-3 col-form-label"><?php echo $text_sort_order; ?></label>';
	        			$tabs+= '<div class="col-lg-9">';
	        				$tabs+= '<input type="text" name="section_details_sort_order" data-value = '+ $data_value +'_'+ sort_counter +' id="section_details_sort_order_'+ $data_value +'_'+ sort_counter +'" class="form-control section_details_sort_order" placeholder="Integer only" required onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;">';
	        				$tabs+='<div id="" class="error_duplication hide dup_sort_alert_'+ $data_value +'_'+ sort_counter +'">';
								$tabs+='Duplicate value';
							$tabs+='</div>';
	        				$tabs+= '<div class="invalid-feedback">';
	        					$tabs+= 'Please provide valid <?php echo $text_sort_order; ?>.';
	        				$tabs+= '</div>';
	        			$tabs+= '</div>';
	        		$tabs+= '</div>';

	        		$tabs+= '<div class="form-group row">';
	        			$tabs+= '<label class="col-lg-3 col-form-label">Upload</label>';
	        			$tabs+= '<div class="col-lg-9">';
	        				$tabs+= '<input name="section_details_file" class="form-control" id="section_details_file_'+ $data_value +'_'+ sort_counter +'" type="file" accept="video/*">';
	        				$tabs+='<div id="section_details_file_error_'+ $data_value +'_'+ sort_counter +'" class="error_duplication hide dup_sort_alert_'+ $data_value +'_'+ sort_counter +'">';
								$tabs+='Please select video file';
							$tabs+='</div>';
	        			$tabs+= '</div>';
	        		$tabs+= '</div>';
	        		$tabs += '<div id="section_progress_'+ $data_value +'_'+ sort_counter +'" class="progress progress-xs hide">';
	        			$tabs += '<div id="section_details_progress_'+ $data_value +'_'+ sort_counter +'" class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100">';
	        				$tabs += ' </div>';
	        		$tabs += '</div>';

	        		$tabs+='<div id="section_details_file_success_'+ $data_value +'_'+ sort_counter +'" class="successfully_upload hide">';
						$tabs+='Successfully Uploaded';
					$tabs+='</div>';

					$tabs+='<div id="section_details_file_uerror_'+ $data_value +'_'+ sort_counter +'" class="error_duplication hide">';
						$tabs+='Upload Field';
					$tabs+='</div>';

	        		$tabs +='<div class="text-right">';
						
					$tabs +='</div>';

	        		$tabs+='<div class="text-right">';
						$tabs+='<button type="button" data-value="'+ $data_value +'_'+ sort_counter +'" id="remove_section_'+ $data_value +'_'+ sort_counter +'" class="btn btn-danger remove_section_details">Remove</button> &nbsp;';


						$tabs +='<button type="submit"  onclick="addsection_details(\''+ $data_value +'_'+ sort_counter +'\', event)" data-value="'+ $data_value +'_'+ sort_counter +'" id="section_details_form_button_'+ $data_value +'_'+ sort_counter +'" class="btn btn-primary section_details_form">Submit</button>';
					$tabs+='</div>';

	        	$tabs+= '</div>';
	        $tabs+= '</div>';
	    $tabs+= '</div>';

        $('#new_section_details_'+$data_value).append($tabs);
	});

	$(document).on("click",".remove_section_details",function(e) {
        $this = $(this);
    	$data_value = $this.data('value');

    	$('.section_details_form_' + $data_value).remove();

    });

    function addsection_details(id, section_id, e) {

    	event.preventDefault();

     	var file_check = document.getElementById('section_details_file_'+id).value;

   		if(file_check == ''){
   			$('#section_details_file_error_'+id).removeClass('hide').show('fast').delay(3000).hide('fast');
   		} else {
			var fd = new FormData();
			fd.append("section_id", section_id);
    
			jQuery.each($('#section_details_file_'+id)[0].files, function(i, file) {
			    fd.append("file_", file);
			});

			var other_data = $('#section_details_form_'+id).serializeArray();
			$.each(other_data,function(key,input){
			    fd.append(input.name,input.value);
			});

			$('#section_progress_'+id).removeClass('hide');
			$('#section_details_form_button_'+id).addClass('hide');

			$.ajax({

			   url: add_trainer_section_details_info,
			   method: 'POST',
			   data: fd,			   
               processData: false,
  			   contentType: false,
  			   xhr: function () {
			        var xhr = $.ajaxSettings.xhr();
			        xhr.upload.onprogress = function (e) {
			            // For uploads
			            if (e.lengthComputable) {
			            	for (var i = 1; i <= 50; i++) {
			            		var percentComplete = (e.loaded / e.total) * i;
			            	}
			                $('#section_details_progress_'+id).attr('aria-valuenow', percentComplete).css('width', percentComplete+'%');
			            }
			        };
			        return xhr;
			    },

			    success: function (data) {
			    	toastr.options = {
					  "closeButton": false,
					  "debug": false,
					  "newestOnTop": false,
					  "progressBar": false,
					  "positionClass": "toast-top-right",
					  "preventDuplicates": false,
					  "onclick": null,
					  "showDuration": "300",
					  "hideDuration": "500",
					  "timeOut": "2000",
					  "extendedTimeOut": "1000",
					  "showEasing": "swing",
					  "hideEasing": "linear",
					  "showMethod": "fadeIn",
					  "hideMethod": "fadeOut"
					}

			    	response = JSON.parse(data);

			            if(response != "" && response.success == 1){
			            	toastr.success(response.message, 'Well Done!');
			            	// $('#section_details_file_success_'+id).removeClass('hide');
			            	$('#remove_section_'+id).addClass('hide');
			        		$('#section_details_progress_'+id).attr('aria-valuenow', 100).css('width', 100+'%');


			            } else {
			            	toastr.success(response.message, 'Opps!');
			            	// $('#section_details_file_uerror_'+id).removeClass('hide');
			            	$('#section_details_progress_'+id).attr('aria-valuenow', 0).css('width', 0+'%');
			            	$('#section_progress_'+id).addClass('hide');
			            	$('#section_details_form_button_'+id).removeClass('hide');
			            }
			    	
			    }
		    });
   		}
    }
</script>