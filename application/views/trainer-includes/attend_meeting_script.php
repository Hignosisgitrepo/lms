<script type="text/javascript">
  $( ".attend_meeting" ).click(function(e) {
    $this = $(this);
    var that = this;
    var id_value = $this.data('value');
    $data_value = $this.data('value').split("_");
    var training_master_id = $data_value[0];
    var training_section_id = $data_value[1];
    var training_section_detail_id = $data_value[2];
    var meeting_id = $data_value[3];
    $.ajax({
        url: "<?php echo site_url('create_attendees'); ?>",
        type: "POST",
        data:{
            training_master_id : training_master_id,
            training_section_id : training_section_id,
            training_section_detail_id : training_section_detail_id,
            meeting_id : meeting_id,
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
              $(that).prop('disabled', true);
              $(that).html("Attendance created");  
              toastr.success(response.message, 'Well Done!');
              window.setTimeout(function(){location.reload()},3000)
            }else{
              toastr.warning(response.message, 'Opps!');
            }
        }
    });
  });

  $( ".start_meeting" ).click(function(e) {
    $this = $(this);
    var that = this;
    var id_value = $this.data('value');
    $data_value = $this.data('value').split("_");
    var meeting_id = $data_value[0];
    var attendee_id = $data_value[1];
    var customer_id = $data_value[2];
    alert(meeting_id);
    // $.ajax({
    //     url: "<?php echo site_url('start_meeting'); ?>",
    //     type: "POST",
    //     data:{
    //         meeting_id : meeting_id,
    //         attendee_id : attendee_id,
    //         customer_id : customer_id,
    //     },
    //     success: function(data, response){
    //         response = JSON.parse(data);

    //         toastr.options = {
    //           "closeButton": false,
    //           "debug": false,
    //           "newestOnTop": false,
    //           "progressBar": false,
    //           "positionClass": "toast-top-right",
    //           "preventDuplicates": false,
    //           "onclick": null,
    //           "showDuration": "300",
    //           "hideDuration": "500",
    //           "timeOut": "2000",
    //           "extendedTimeOut": "1000",
    //           "showEasing": "swing",
    //           "hideEasing": "linear",
    //           "showMethod": "fadeIn",
    //           "hideMethod": "fadeOut"
    //         }

    //         if(response != "" && response.success == 1){
    //           $(that).prop('disabled', true);
    //           $(that).html("Attendance created");  
    //           toastr.success(response.message, 'Well Done!');
    //         }else{
    //           toastr.warning(response.message, 'Opps!');
    //         }
    //     }
    // });
  });
 
</script>