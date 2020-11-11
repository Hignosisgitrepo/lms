<div class="pt-32pt">
   <div class="container-fluid page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
      <div class="flex d-flex flex-column flex-sm-row align-items-center">
         <div class="mb-24pt mb-sm-0 mr-sm-24pt">
            <h2 class="mb-0"><?php echo $pageTitle; ?></h2>
            <ol class="breadcrumb p-0 m-0">
               <li class="breadcrumb-item"><a href="<?php echo base_url().'dashboard'; ?>"><?php echo $text_dashboard; ?></a></li>
               <li class="breadcrumb-item active">
                  <?php echo $text_list; ?>
               </li>
            </ol>
         </div>
      </div>
      <div class="row"
         role="tablist">
         <div class="col-auto">
            <a href="<?php echo base_url(); ?>add-map-training" class="btn btn-outline-secondary"><?php echo $text_add; ?></a>
         </div>
      </div>
   </div>
</div>
<!-- BEFORE Page Content -->
<!-- // END BEFORE Page Content -->
<!-- Page Content -->
<div id="successModal" style="display:none">
   <p id="success_div">
</div>
<div class="container page__container page-section">
   <div class="row mb-32pt">
      <div class="col-lg-12 d-flex align-items-center">
         <div class="flex"
            style="max-width: 100%">
            <div class="card m-0">
               <div class="table-responsive"
                  data-toggle="lists"
                  data-lists-sort-by="js-lists-values-categoryname"
                  data-lists-values='["js-lists-values-categoryname"]'>
                  <div class="card-header">
                     <div class="search-form">
                        <input type="text"
                           class="form-control search"
                           placeholder="Search ...">
                        <button class="btn"
                           type="button"><i class="material-icons">search</i></button>
                     </div>
                  </div>
                  <table class="table mb-0 thead-border-top-0 table-nowrap">
                     <thead>
                        <tr>
                           <th>
                              <a href="javascript:void(0)"
                                 class="sort"
                                 data-sort="js-lists-values-categoryname"><?php echo $entry_designation; ?></a>
                           </th>
                           <th>
                              <a href="javascript:void(0)"
                                 class="sort"
                                 data-sort="js-lists-values-categoryname">Training Name</a>
                           </th>
                        </tr>
                     </thead>
                     <tbody class="list"
                        id="search">
                        <?php if(!empty($training_mappings)) { ?>
                        <?php foreach($training_mappings as $res): ?>
                        <tr>
                           <td>
                              <div class="d-flex flex-column">
                                 <p class="mb-0"><strong class="js-lists-values-categoryname"><?php echo $res['designation_name']; ?> </strong></p>
                              </div>
                           </td>
                           <td>
                              <div class="d-flex flex-column">
                                 <p class="mb-0"><strong class="js-lists-values-categoryname">
                                 <?php foreach($res['training_deatils'] as $detail) { ?>
                                   <?php echo substr_replace($detail->training_name.', ', "", -1); ?>
                                 <?php } ?>
                                 </strong></p>
                              </div>
                           </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php } else { ?>
                        <tr>
                           <td colspan="7"><?php echo $text_no_data; ?></td>
                        </tr>
                        <?php } ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>