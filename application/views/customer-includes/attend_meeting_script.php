<script type="text/javascript">
  $( ".attend_meeting" ).click(function(e) {
    alert("hi");
    $this = $(this);
    var that = this;
    var id_value = $this.data('value');
    $data_value = $this.data('value').split("_");
    var training_master_id = $data_value[0];
    var training_schedule_id = $data_value[1];
    var isMeetingHost = $data_value[2];
    var customer_id = $data_value[3];
    var meeting_id = $data_value[4];
    $.ajax({
        url: "<?php echo site_url('create_attendees'); ?>",
        type: "POST",
        data:{
            training_master_id : training_master_id,
            training_schedule_id : training_schedule_id,
            isMeetingHost : isMeetingHost,
            customer_id : customer_id,
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
              window.location.href = response.redirect;
            }else{
              toastr.warning(response.message, 'Opps!');
            }
        }
    });
  });
 
</script>