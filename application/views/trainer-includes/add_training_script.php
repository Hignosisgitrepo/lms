<script src="JavaScript/jquery-1.10.2.js" type="text/javascript"></script> 



        <script type="text/javascript">
			$(document).ready(function() {
				

				$("#price_after_discount1").html('0');
				$("#commission_value1").html('0');
				var ccy=$('#currencies').val();
				var dd;
				if(ccy==1){
					dd="GBP";
				}else if(ccy==2){
					dd="USD";
				}else{
					dd="INR";
				}
				$("#final_currency").html(dd);
				$("#final_currency1").html(dd);
				$('#currencies').on('change', '', function (e) {
					var c=$(this).val();
					if(c==1){
					dd="GBP";
				}else if(c==2){
					dd="USD";
				}else{
					dd="INR";
				}
					$("#final_currency").html(dd);
					$("#final_currency1").html(dd);
				});

				$(".days_select").select2({'width':'100%'});
				$("#no_of_session").val(0);
				$("#text_final_approve").hide();
				$("#text_final_reject").hide();
				$("#discount").keyup(function(){
					var discount=$(this).val();
					var price=$("#price").val();
					var platform_commission=$("#platform_commission").val();
					var platform=platform_commission;
					var minimum_commission=$("#minimum_commission_value").val();

					if(discount.length!=0){
						
						var price_after_discount=price-((price*discount)/100);
						var commission_value=(price_after_discount*platform)/100;
						$("#price_after_discount1").html(price_after_discount);
						$("#commission_value1").html(commission_value);
						$("#price_after_discount").val(price_after_discount);
						$("#commission_value").val(commission_value);

						var final_price=price_after_discount-((price_after_discount*platform)/100);
						var final;
						if(final_price>=minimum_commission){
							final=final_price;
							
							$("#text_final_approve").hide();
							$("#text_final_reject").show();
							$('#text_final').hide();
							$("#final_price2").html(final);
						}else{
							final=final_price-minimum_commission;
							
							$("#text_final_approve").show();
							$("#text_final_reject").hide();
							$('#text_final').hide();
							$("#final_price1").html(minimum_commission);
						}
					//	var final_price1 = document.getElementById("final_price1");
						
						
						$("#final_price").val(final);

					}else{
						$("#price_after_discount1").html('0');
						$("#commission_value1").html('0');
						$("#price_after_discount").val('');
						$("#final_price1").html('');
						$("#final_price").val('');
						$("#commission_value").val('');
						$("#text_final_approve").hide();
						$("#text_final_reject").hide();
						$('#text_final').show();
					}
				});
			
			});


			
			$('#training_type').change(function(){ 
				// $(".days_select").select2().show();;
				var data_value = $("#training_type option:selected").attr('data-value');

			    if(data_value == "Online"){
			    	$('#online_section').removeClass('hide');
					$('#datepicker').val('');
			    }

			    if(data_value == "Offline" || data_value == undefined){
			    	$('#online_section').addClass('hide');
			    }
			});

			$('#datepicker').daterangepicker({
				singleDatePicker: true,
				timePicker: false,
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
			      format: 'MM/DD/YYYY'
			    }

			}, function(start, end, label) {
				
				 $('#start_date').val(start.format('YYYY-MM-DD'));
				 //$('#start_time').val(start.format('hh:mm A'));
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
//concepts

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
						var program_level = $("#program_level").val();
					  	var course_category = $("#course_category option:selected").val();
					  	var training_type = $("#training_type option:selected").val();
					  	var currencies = $("#currencies option:selected").val();
					  	var price = $("#price").val();
						  var discount = $("#discount").val();
						  var price_after_discount = $("#price_after_discount").val();
						  var platform_commission = $("#platform_commission").val();
						  var final_price = $("#final_price").val();
						var days_selected = $('.days_select').val();
					  	var course_duration = $("#course_duration").val();
					  	var session_duration = $("#session_duration").val();
					  	var no_of_session = $("#no_of_session").val();
					  	var start_date = $("#start_date").val();
						  var start_hour = $("#start_hour").val();
					  	var start_time = $("#start_time").val();
						  var time_zone = $("#time_zone").val();

					  	var data_value = $("#submit_basic_details").data('value');

					 	$.ajax({
					    	url: add_trainer_basic_details,
					    	type: "POST",
					    	data:{
					     	  	training_name : training_name,
								training_description : training_description,
								program_level : program_level,
								
					   	    	course_category : course_category,
					    	    training_type : training_type,
					    	    currencies : currencies,
					    	    price : price,
								discount : discount,
								price_after_discount : price_after_discount,
								platform_commission : platform_commission,
								final_price : final_price,

					    	    days_selected : days_selected,
					    	    course_duration : course_duration,
					   	    	session_duration : session_duration,
					    	    no_of_session : no_of_session,
					    	    start_date : start_date,
								start_hour: start_hour,  
					    	    start_time : start_time,  
								time_zone:time_zone
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
									$('#submit_basic_details').prop('disabled', true);
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

//c sub


			(function() {
			  'use strict';
			  window.addEventListener('load', function() {
			    // Fetch all the forms we want to apply custom Bootstrap validation styles to
			    var forms = document.getElementsByClassName('concept_form');
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
			            var concepts = [];
			            var concept_counter = 1;
			            $(".concept_name").each(function(){
					        var concept_name = $("#concept_name_"+concept_counter).val();
					        concepts.push(concept_name);
					        concept_counter++;
					    });

			            var sort_orders = [];
			            var sort_counter = 1;
					    $(".sort_order").each(function(){
					        var sort_order = $("#sort_order_"+sort_counter).val();
					        sort_orders.push(sort_order);
					        sort_counter++;
					    });

			             
			        	var concept_name = concepts;
					  	var sort_order = sort_orders;
					  	var data_value = $("#submit_concept").data('value');

					 	$.ajax({
					    	url: add_trainer_concept_info,
					    	type: "POST",
					    	data:{
					     	  	training_master_id : training_master_id,
					   	    	concept_name : concept_name,
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
					            	// $('#concept_alert').removeClass('hide');
					            	$('#next_button_'+data_value).removeClass('disabled');

					            	var tabs ='';
					            	var tabs_content ='';
					            	jQuery.each(response.training_concept_data, function(sort_order, val ) {
					            		var active = '';
					             	    var hide = '';
					            	    var show = '';

							            tabs +='<div class="accordion js-accordion accordion--boxed " id="#concept_content_'+sort_order+'" data-domfactory-upgraded="accordion">';
                                    tabs +='<div class="accordion__item">';
                                        tabs += '<a href="#" class="accordion__toggle collapsed" data-toggle="collapse" data-target="#concept_content_'+sort_order+'" data-parent="#concept_content_'+sort_order+'" aria-expanded="false">';
                                             tabs += '<span class="flex">'+val.concept_name+'</span>';
                                             tabs += '<span class="accordion__toggle-icon material-icons">keyboard_arrow_down</span>';
                                         tabs += '</a>';
                                         tabs += '<div class="accordion__menu collapse" id="concept_content_'+sort_order+'" style="">';
                                            tabs += ' <div class="accordion__menu-link">';
                                               tabs += '<div class="tab-pane concept_details_nav fade show" data_value = "'+sort_order+'" id="concept_content_'+val.training_concept_id+'" role="tabpanel" aria-labelledby="concept_content_'+val.training_concept_id+'-tab" style="width: inherit;">';
                                                        tabs +='<input type="hidden" id="hidden_concept_id" data-value = '+val.training_concept_id+' class="form-control hidden_concept_id" value ="'+val.training_concept_id+'"/>';
                                                        tabs += '<div class="">';
                                                        tabs +='<form action="#"  name="concept_details_form_'+sort_order+'"  data-value="'+sort_order+'" id="concept_details_form_'+sort_order+'" class="concept_details_form_'+sort_order+'" p_t_10" novalidate>'
                                                            tabs += '<div class="form-group row">';
                                                                tabs += '<label class="col-lg-3 col-form-label"><?php echo $text_concept_Name; ?></label>';
                                                                tabs += '<div class="col-lg-9">';
                                                                    tabs += '<input type="text" name="concept_details_name" data-value = '+ sort_order +'_'+ sort_order +' id="concept_details_name_'+ sort_order +'_'+ sort_order +'" class="form-control concept_details_name" required >';
                                                                    tabs +='<div id="" class="error_duplication hide dup_concept_alert_'+ sort_order +'_'+ sort_order +'">';
                                                                        tabs +='Duplicate value';
                                                                    tabs +='</div>';
                                                                    tabs += '<div class="invalid-feedback">';
                                                                    tabs += 'Please provide valid <?php echo $text_concept_Name; ?>.';
                                                                    tabs += '</div>';
                                                                tabs += '</div>';
                                                            tabs += '</div>';

                                                            tabs += '<div class="form-group row">';
                                                                tabs += '<label class="col-lg-3 col-form-label"><?php echo $text_sort_order; ?></label>';
                                                                tabs += '<div class="col-lg-9">';
                                                                    tabs += '<input type="text" name="concept_details_sort_order" data-value = '+ sort_order +'_'+ sort_order +' id="concept_details_sort_order_'+ sort_order +'_'+ sort_order +'" class="form-control concept_details_sort_order" placeholder="Integer only" required onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;">';
                                                                    tabs +='<div id="" class="error_duplication hide dup_concept_sort_alert_'+ sort_order +'_'+ sort_order +'">';
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
                                                                    tabs += '<input name="concept_details_file" id="concept_details_file_'+ sort_order +'" class="form-control " type="file" accept="video/*">';
                                                                  
                                                                    tabs+='<div id="concept_details_file_error_'+ sort_order +'" class="error_duplication hide dup_sort_alert_'+ sort_order +'">';
                                                                        tabs+='Please select video file';
                                                                    tabs+='</div>';
                                                                tabs += '</div>';
                                                            tabs += '</div>';
                                                            tabs += '<div id="concept_progress_'+ sort_order +'" class="progress progress-xs hide">';
                                                                tabs += '<div id="concept_details_progress_'+ sort_order +'" class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100">';
                                                                    tabs += ' </div>';
                                                            tabs += '</div>';

                                                            tabs+='<div id="concept_details_file_success_'+ sort_order +'" class="successfully_upload hide">';
                                                                tabs+='Successfully Uploaded';
                                                            tabs+='</div>';

                                                            tabs+='<div id="concept_details_file_uerror_'+ sort_order +'" class="error_duplication hide">';
                                                                tabs+='Upload Field';
                                                            tabs+='</div>';

                                                        tabs += '</form>';

                                                            tabs +='<div class="text-right">';
                                                                tabs +='<button type="submit" onclick="addconcept_details('+ sort_order +', '+val.training_concept_id+', event)" data-value="'+ sort_order +'" id="concept_details_form_button_'+ sort_order +'" class="btn btn-primary concept_details_form" data-style="expand-right">Submit</button>';
                                                            tabs +='</div>';

                                                            tabs +='<div class="total_new_concept_details_main" id="new_concept_details_'+ sort_order +'">';
                                                        
                                                            tabs +='</div>';

                                                            tabs +='<div class="text-left">';
                                                                tabs +='<button type="button" data-value="'+ sort_order +'" class="add_concept_details btn btn-primary" ">Add concept</button>';
                                                            tabs +='</div>';
                                                        tabs += '</div>';
                                                    tabs += '</div>';
                                            tabs += '</div>';
                                       tabs += '</div>';
                                    tabs += '</div>';
                                    
                                tabs += '</div>';
									});

									$('#concept_list_content').append(tabs);

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



//c sub

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


			
   
			function addConcept() {
				var training_concept_id=0;
				document.getElementById("newBtn").disabled = true;

				html = '<div class="form-group row" id="concept-row' + training_concept_id + '">';
				html +='<div class="col"><label>Concept Name</label>';

				html += '<input type="hidden"  class="form-control" id="training_concept_id';
				html +=training_concept_id;
				html +='" value="0"/></div>';

				html += '<div class="col"><input type="text"  placeholder="Concept Name" class="form-control" id="concept_name';
				html +=training_concept_id;
				html +='"/></div>';

			    html += '<div class="col"><button type="button" id="deleteBtn';
				html +=training_concept_id;
				html +='" onclick="deleteNew(\''+ training_concept_id +'\');" data-toggle="tooltip" class="btn btn-danger"><i class="fa fa-minus-circle"></i>';
				html +='</button>&nbsp;&nbsp;<button type="button" id="saveBtn';
				html +=training_concept_id;
				html +='" onclick="saveNew(\''+ training_concept_id +'\');" data-toggle="tooltip" class="btn btn-success"><i class="fa fa-save"></i></button>';

				html += '</div></div>';
				$('#concept').append(html);
				
				
				
			}
			
			function addSection() {
				var training_section_id=0;
				document.getElementById("newBtnsection").disabled = true;

				
				html = '<div class="form-group" id="section-row' + training_section_id + '">';
				html +='<label>Section Name</label>';

				html += '<input type="hidden"  class="form-control" id="training_section_id';
				html +=training_section_id;
				html +='" value="0"/>';

				html += '<input type="text"  placeholder="section Name" class="form-control" id="section_name';
				html +=training_section_id;
				html +='"/>';
				html +='<br><label>Sort Order</label>';
				html += '<input type="number"  placeholder="Sort Order" class="form-control" id="sort_order';
				html +=training_section_id;
				html +='"/>';

			    html += '<br><button type="button" id="deleteBtnsection';
				html +=training_section_id;
				html +='" onclick="deleteNewsection(\''+ training_section_id +'\');" data-toggle="tooltip" class="btn btn-danger"><i class="fa fa-minus-circle"></i>';
				html +='</button>&nbsp;&nbsp;<button type="button" id="saveBtnsection';
				html +=training_section_id;
				html +='" onclick="saveNewsection(\''+ training_section_id +'\');" data-toggle="tooltip" class="btn btn-success"><i class="fa fa-save"></i></button>';

				html += '</div>';
				
				
				$('#section').append(html);
				
				
				
			}
			
			
			
			function deleteNew(training_concept_id){
				var training_master_id = $("#training_master_id").data('value');
				
		var r = confirm('Are you sure?');
		if (r == true) {
			if(training_concept_id == 0){
				$('#concept-row'+ training_concept_id).remove();
			} else {
				$.ajax({
					type: 'post',
					url: '<?php echo base_url(); ?>Trainer_Add_Courses/training_concept/deleteConcept',
					data: { training_concept_id: training_concept_id},
					dataType: 'json',				
					success: function(json){
						$("#err_add").html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Deleted Successfully!</div>').show('fast').delay(5000).hide('fast');
						getConceptData(training_master_id);
					},
					error: function (xhr, ajaxOptions, thrownError) {
						alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
					}	
				});
			}
			$('#concept-row'+ training_concept_id).remove();
			document.getElementById('newBtn').disabled = false;
		} else {
			return false;
		}
	}
			function saveData(training_concept_id) {
				document.getElementById('concept_name'+training_concept_id).disabled = true;
				document.getElementById('deleteBtn'+training_concept_id).disabled = true;
				document.getElementById('saveBtn'+training_concept_id).disabled = true;
				document.getElementById('newBtn').disabled = false;
			}
			
			
			function saveNew(training_concept_id) {
				
				var training_master_id = $("#training_master_id").data('value');
			
				var concept_name = document.getElementById("concept_name" + training_concept_id).value;
				$.ajax({
					url: '<?php echo base_url(); ?>Trainer_Add_Courses/training_concept/saveConcept',
					method: 'POST',
					data: { concept_name: concept_name,training_master_id:training_master_id, training_concept_id: training_concept_id},
					dataType: 'json',	
					success: function(json){
						if(json['success']) {
							$("#err_add").html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + json['success'] + '</div>').show('fast').delay(5000).hide('fast');
						//	window.location = url_path;
							getConceptData(training_master_id);
							saveData(training_concept_id);
						} else {
							if(json['err_empty']) {
								$("#err_add").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + json['err_empty'] + '</div>').show('fast').delay(5000).hide('fast');
							}
						}
						//window.location = 'index.php?route=common/test/success&quiz_id='+ quiz_customer_id;						
					},
					error: function (xhr, ajaxOptions, thrownError) {
						alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
					}
				});
			}




			function getConceptData(training_master_id){
				var training_master_id = $("#training_master_id").data('value');
				
				$.ajax({
					type: 'post',
					url: '<?php echo base_url(); ?>Trainer_Add_Courses/training_concept/getConcept',
					data: {training_master_id: training_master_id},
					dataType: 'json',				
					success: function(json){
						
						if(json) {
							
							
							var html = '';
							for (var i = 0; i < json.length; i++) {
								html += '<div class="form-group row"  id="concept-row' + json[i]['training_concept_id'] + '">';
								html +='<div class="col"><label >Concept Name</label>';
								html += '<input type="hidden"  class="form-control" id="training_concept_id';
								html +=json[i]['training_concept_id'];
								html +='" value="';
								html +=json[i]['training_concept_id'];
								html +='"  /></div>';

								html += '<div class="col"><input type="text"  placeholder="Concept Name" class="form-control" id="concept_name';
								html +=json[i]['training_concept_id'];
								html +='" value="';
								html +=json[i]['concept_name'];
								html +='" disabled /></div>';


							
								
								
								html += '<div class="col"><button type="button" id="deleteBtn';
								html +=json[i]['training_concept_id'];
								html +='" onclick="deleteNew(\''+ json[i]['training_concept_id'] +'\');" data-toggle="tooltip" class="btn btn-danger"><i class="fa fa-minus-circle"></i>';
								html +='</button>&nbsp;&nbsp;';
								
								html +='<button type="button" id="editBtn';
								html +=json[i]['training_concept_id'];
								html +='" onclick="editData(\''+ json[i]['training_concept_id'] +'\');" data-toggle="tooltip" class="btn btn-success"><i class="fa fa-edit"></i>';
								html +='</button>&nbsp;&nbsp;';
								html +='<button type="button" id="saveBtn';
								html +=json[i]['training_concept_id'];
								html +='" onclick="saveNew(\''+ json[i]['training_concept_id'] +'\');" data-toggle="tooltip" class="btn btn-success"><i class="fa fa-save"></i></button>';

								html += '</div></div>';
							}
							
						}
						if (html){
							document.getElementById("concept").innerHTML = "";
							$("#concept").append(html);
						}
					}
				});
			}
			
		
			function editData(training_concept_id){
				document.getElementById('concept_name' + training_concept_id).disabled = false;
				document.getElementById('editBtn' + training_concept_id).disabled = true;
				document.getElementById('saveBtn' + training_concept_id).disabled = false;
				document.getElementById('newBtn').disabled = true;
			}

			function editNew(){
				document.getElementById('newBtn').disabled = true;
				var training_concept_id = 0;
				
				html = '<div id="concept-row' + concept_row + '">';
				html += '<input type="hidden"  class="form-control" id="training_concept_id';
				html +=training_concept_id;
				html +='" value="0"/>"';

				html += '<input type="text"  placeholder="Concept Name" class="form-control" id="concept_name';
				html +=training_concept_id;
				html +='"/>"';

			}
			
			
			function deleteNewsection(training_section_id){
				var training_master_id = $("#training_master_id").data('value');
				
		var r = confirm('Are you sure?');
		if (r == true) {
			if(training_section_id == 0){
				$('#section-row'+ training_section_id).remove();
			} else {
				$.ajax({
					type: 'post',
					url: '<?php echo base_url(); ?>Trainer_Add_Courses/training_section/deletesection',
					data: { training_section_id: training_section_id},
					dataType: 'json',				
					success: function(json){
						$("#err_add").html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Deleted Successfully!</div>').show('fast').delay(5000).hide('fast');
						getsectionData(training_master_id);
					},
					error: function (xhr, ajaxOptions, thrownError) {
						alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
					}	
				});
			}
			$('#section-row'+ training_section_id).remove();
			document.getElementById('newBtnsection').disabled = false;
		} else {
			return false;
		}
	}
	
		
			function saveDatasection(training_section_id) {
				document.getElementById('sort_order'+training_section_id).disabled = true;
				document.getElementById('section_name'+training_section_id).disabled = true;
				document.getElementById('deleteBtnsection'+training_section_id).disabled = true;
				document.getElementById('saveBtnsection'+training_section_id).disabled = true;
				document.getElementById('newBtnsection').disabled = false;
			}
			
			
			function saveNewsection(training_section_id) {
				
				var training_master_id = $("#training_master_id").data('value');
			
				var section_name = document.getElementById("section_name" + training_section_id).value;
				
				var sort_order = document.getElementById("sort_order" + training_section_id).value;
				
				$.ajax({
					url: '<?php echo base_url(); ?>Trainer_Add_Courses/training_section/savesection',
					method: 'POST',
					data: { section_name: section_name,sort_order:sort_order,training_master_id:training_master_id, training_section_id: training_section_id},
					dataType: 'json',	
					success: function(json){
						if(json['success']) {
							$("#err_add").html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + json['success'] + '</div>').show('fast').delay(5000).hide('fast');
						//	window.location = url_path;
							getsectionData(training_master_id);
							saveDatasection(training_section_id);
						} else {
							if(json['err_empty']) {
								$("#err_add").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + json['err_empty'] + '</div>').show('fast').delay(5000).hide('fast');
							}
						}
						//window.location = 'index.php?route=common/test/success&quiz_id='+ quiz_customer_id;						
					},
					error: function (xhr, ajaxOptions, thrownError) {
						alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
					}
				});
			}




			function getsectionData(training_master_id){
				var training_master_id = $("#training_master_id").data('value');
				
				$.ajax({
					type: 'post',
					url: '<?php echo base_url(); ?>Trainer_Add_Courses/training_section/getsection',
					data: {training_master_id: training_master_id},
					dataType: 'json',				
					success: function(json){
						
						if(json) {
						
							var html = '';
							for (var i = 0; i < json.length; i++) {
								html += '<div  id="section-row' + json[i]['training_section_id'] + '">';
								html +='<div class="col"><label >section Name</label></div>';
								html += '<input type="hidden"  class="form-control" id="training_section_id';
								html +=json[i]['training_section_id'];
								html +='" value="';
								html +=json[i]['training_section_id'];
								html +='"  />';

								html += '<input type="text"  placeholder="section Name" class="form-control section_form" id="section_name';
								html +=json[i]['training_section_id'];
								html +='" value="';
								html +=json[i]['section_name'];
								html +='" disabled />';
								html +='<br><div class="col"><label >Sort Order</label></div>';
								html += '<input type="number"  placeholder="Sort Order" class="form-control" id="sort_order';
								html +=json[i]['training_section_id'];
								html +='" value="';
								html +=json[i]['sort_order'];
								html +='" disabled />';

								html += '<br><button type="button" id="deleteBtnsection';
								html +=json[i]['training_section_id'];
								html +='" onclick="deleteNewsection(\''+ json[i]['training_section_id'] +'\');" data-toggle="tooltip" class="btn btn-danger"><i class="fa fa-minus-circle"></i>';
								html +='</button>&nbsp;&nbsp;';
								
								html +='<button type="button" id="editBtnsection';
								html +=json[i]['training_section_id'];
								html +='" onclick="editDatasection(\''+ json[i]['training_section_id'] +'\');" data-toggle="tooltip" class="btn btn-success"><i class="fa fa-edit"></i>';
								html +='</button>&nbsp;&nbsp;';
								html +='<button type="button" id="saveBtnsection';
								html +=json[i]['training_section_id'];
								html +='" onclick="saveNewsection(\''+ json[i]['training_section_id'] +'\');" data-toggle="tooltip" class="btn btn-success"><i class="fa fa-save"></i></button>';

								html += '</div>';
							}
							
						}
						if (html){
							document.getElementById("section").innerHTML = "";
							$("#section").append(html);
							getSectionDetails();

						
						}
					}
				});
			}
			
		
			function editDatasection(training_section_id){
				document.getElementById('section_name' + training_section_id).disabled = false;
					document.getElementById('sort_order' + training_section_id).disabled = false;
				document.getElementById('editBtnsection' + training_section_id).disabled = true;
				document.getElementById('saveBtnsection' + training_section_id).disabled = false;
				document.getElementById('newBtnsection').disabled = true;
			}

			function editNewsection(){
				document.getElementById('newBtnsection').disabled = true;
				var training_section_id = 0;
				
				html = '<div id="section-row' + section_row + '">';
				html += '<input type="hidden"  class="form-control" id="training_section_id';
				html +=training_section_id;
				html +='" value="0"/>"';

				html += '<input type="text"  placeholder="section Name" class="form-control" id="section_name';
				html +=training_section_id;
				html +='"/>"';

			}
			
			
			function getSectionDetails(){
				var training_master_id = $("#training_master_id").data('value');
				
				$.ajax({
					type: 'post',
					url: '<?php echo base_url(); ?>Trainer_Add_Courses/training_section/getsectionDetails',
					data: {training_master_id: training_master_id},
					dataType: 'json',				
					success: function(json){

						var tabs ='';
		var tabs_content ='';
		jQuery.each(json.training_section_data, function(sort_order, val ) {
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


								tabs+= '<div class="form-group row">';
			        			tabs+= '<label class="col-lg-3 col-form-label"><?php echo $text_video_time; ?></label>';
			        			tabs+= '<div class="col-lg-9">';
			        				tabs+= '<input type="text"  name="section_details_video_time" data-value = '+ $data_value +'_'+ sort_order +' id="section_details_video_time_'+ $data_value +'_'+ sort_order +'" class="form-control section_details_video_time" required >';
			        				tabs+='<div id="" class="hide '+ $data_value +'_'+ sort_order +'">';
										
									tabs+='</div>';
			        				tabs+= '<div class="invalid-feedback">';
			        					tabs+= 'Please provide valid <?php echo $text_video_time; ?>.';
			        				tabs+= '</div>';
			        			tabs+= '</div>';
			        			tabs+= '</div>';


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


					
					}
				});
			}	
        </script>
		
	