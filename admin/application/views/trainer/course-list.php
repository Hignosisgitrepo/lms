<!-- Header Layout Content -->
<div class="mdk-header-layout__content">
<!-- Drawer Layout -->
<div class="mdk-drawer-layout js-mdk-drawer-layout"
   data-push
   data-responsive-width="992px">
<!-- Drawer Layout Content -->
<div class="mdk-drawer-layout__content page-content">
<div class="pt-32pt">
   <div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
      <div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">
         <div class="mb-24pt mb-sm-0 mr-sm-24pt">
            <h1 class="h2 mb-0"><?php echo $text_list; ?></h1>
            <ol class="breadcrumb p-0 m-0">
               <li class="breadcrumb-item"><a href="<?php echo base_url().'dashboard'; ?>"><?php echo $text_dashboard; ?></a></li>
               <li class="breadcrumb-item"><a href="<?php echo base_url().'trainers'; ?>"><?php echo $text_trainerlist; ?></a></li>
               <li class="breadcrumb-item active"><?php echo $pageTitle; ?></li>
            </ol>
         </div>
      </div>
      <div class="row"
         role="tablist">
         <div class="col-auto">
            <a href="<?php echo base_url().'trainers'; ?>" data-toggle="tooltip" title="Back" class="btn btn-white"><i class="fa fa-reply"></i></a>
         </div>
      </div>
   </div>
</div>
<div class="container page__container page-section">
   <div class="row mb-32pt">
      <div class="col-lg-12 d-flex align-items-center">
         <div class="flex"
            style="max-width: 100%">
            <div class="card m-0">
               <?php if($trainings) { ?>
               <?php foreach($trainings as $training) { ?>
               <div class="card" title="What u'll learn?" data-placement="bottom" data-toggle="popover" data-trigger="hover" data-content="
                  <?php $ctr = 1; ?>
                  <?php foreach($training['concepts'] as $concept) { ?>
                  <?php echo $ctr . '. ' . $concept->concept_name; ?><br>
                  <?php $ctr++; ?>
                  <?php } ?>
                  ">
                  <div class="list-group list-group-flush" style="cursor: -webkit-grab; cursor: grab;">
                     <div class="list-group-item p-3">
                        <div class="row align-items-start">
                           <div class="col-md-9 mb-8pt mb-md-0">
                              <div class="media align-items-center">
                                 <div class="media-left mr-12pt">
                                    <a onclick="viewTraining('<?php echo $training['b64_tmid']; ?>');">
                                    <img src="<?php echo $this->config->item('default_url'); ?>/assets/common/images/paths/angular_40x40@2x.png" width="150" height="100" alt="<?php echo $training['training_name']; ?>" class="rounded">
                                    </a>
                                 </div>
                                 <div class="d-flex flex-column media-body media-middle">
                                    <a onclick="viewTraining('<?php echo $training['b64_tmid']; ?>');" class="card-title"><?php echo $training['training_name']; ?></a>
                                    <small class="text-muted"><?php echo $training['training_description']; ?></small>
                                    <p class="flex text-50 lh-1 mb-0"><small>By <a><?php echo $training['trainer_name']; ?></a></small></p>
                                    <div class="d-flex align-items-center mb-8pt justify-content-center" style="justify-content: left!important;">
                                       <div class="d-flex align-items-center mr-8pt">
                                          <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                          <p class="flex text-50 lh-1 mb-0"><small><?php echo $training['course_duration']; ?>Hrs</small></p>
                                       </div>
                                       <div class="d-flex align-items-center">
                                          <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                          <p class="flex text-50 lh-1 mb-0"><small><?php echo $training['no_of_sessions']; ?> sessions</small></p>
                                       </div>
                                       <div class="d-flex align-items-center">
                                          <span class="material-icons icon-16pt text-50 mr-4pt">assessment</span>
                                          <p class="flex text-50 lh-1 mb-0"><small><?php echo $training['program_level_name']; ?></small></p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-auto d-flex flex-column align-items-center justify-content-center">
                              <?php if($training['discount'] != 0) { ?>
                              <h5 class="m-0"><?php echo $training['price_after_discount']; ?></h5>
                              <p class="lh-1 mb-0"><small class="text-70"><strike><?php echo $training['price']; ?></strike></small></p>
                              <?php } else { ?>
                              <h5 class="m-0"><?php echo $training['price']; ?></h5>
                              <?php } ?>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <?php } ?>
               <?php }  else { ?>
               No course available!
               <?php } ?>
            </div>
         </div>
      </div>
   </div>
</div>