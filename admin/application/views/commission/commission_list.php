<!-- Header Layout Content -->
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
                        <h2 class="mb-0"><?php echo $text_list; ?></h2>

                        <ol class="breadcrumb p-0 m-0">
                            <li class="breadcrumb-item"><a href="<?php echo base_url().'dashboard'; ?>"><?php echo $text_dashboard; ?></a></li>

                            <li class="breadcrumb-item active">

                                <?php echo $pageTitle; ?>

                            </li>

                        </ol>

                    </div>
                </div>

                <div class="row"
                     role="tablist">
                    <div class="col-auto">
                     
                      <?php $b64_cid = urlencode(base64_encode($c_id)); ?>
                        <a href="<?php echo base_url().'add-commission/'.$b64_cid; ?>" class="btn btn-outline-secondary"><?php echo $text_add;  ?></a>
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

                <div class="table-responsive"
                     data-toggle="lists"
                     data-lists-sort-by="js-lists-values-commisionname"
                     data-lists-values='["js-lists-values-commisionname"]'>

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
                                       data-sort="js-lists-values-commissionname"><?php echo $text_trainer_name; ?></a>
                                </th>
                               
                                <th>
                                    <a href="javascript:void(0)"
                                       class="sort"
                                       data-sort="js-lists-values-platformcommission"><?php echo $text_platform_commission; ?></a>
                                </th>

                                <th>
                                    <a href="javascript:void(0)"
                                       class="sort"
                                       data-sort="js-lists-values-startdate"><?php echo $text_commission_start_date; ?></a>
                                </th>


                                <th>
                                    <a href="javascript:void(0)"
                                       class="sort"
                                       data-sort="js-lists-values-startdate"><?php echo $text_status; ?></a>
                                </th>

                            </tr>
                        </thead>
                        <tbody class="list"
                               id="search">
                            <?php if(!empty($commission)) { ?>
                              <?php foreach($commission as $res): ?>
                                <tr>

                                    <td>

                                        <div class="d-flex flex-column">
                                            <p class="mb-0"><strong class="js-lists-values-commissionname"><?php echo $res['first_name']; ?> <?php echo $res['last_name']; ?> </strong></p>
                                        </div>

                                    </td>

                                    <td>

                                        <div class="d-flex flex-column">
                                            <p class="mb-0"><strong class="js-lists-values-platformcommission"><?php echo $res['platform_commission']; ?> </strong></p>
                                        </div>

                                    </td>

                                    <td>

                                        <div class="d-flex flex-column">
                                            <p class="mb-0"><strong class="js-lists-values-startdate"><?php echo $res['commission_start_date']; ?> </strong></p>
                                        </div>

                                    </td>
                                   
                                    
                                    <td>
                                    <div class="d-flex flex-column">
                                    <?php if($res['status']==1){ ?>
                                            <p class="mb-0"><strong class="js-lists-values-status">Active </strong></p>
                                    <?php }else{ ?>
                                        <p class="mb-0"><strong class="js-lists-values-status">Deactive </strong></p>
                                    <?php } ?>
                                        </div>
                                    </td>
                                   
                                </tr>
                              <?php endforeach; ?>
                            <?php } else { ?>
                              <tr><td colspan="7"><?php echo $text_no_data; ?></td></tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
</div>

</div>