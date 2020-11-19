

 <div id="available_devices" class="page__container">
    <div class="page-section">
        <div class="row">
			<?php if(!empty($meeting_data)) { ?>
	              <?php $meeting_id = urlencode(base64_encode($meeting_data['meeting_id'])); ?>
                <?php $customer_id = urlencode(base64_encode($meeting_data['customer_id'])); ?>
                <?php $attendee_id = urlencode(base64_encode($meeting_data['attendee_id'])); ?>
                <?php $isMeetingHost = $meeting_data['isMeetingHost']; ?>

                  <input type="hidden" id="meeting_value" data-value="<?php echo $meeting_id.'_'.$attendee_id.'_'.$customer_id.'_'.$isMeetingHost; ?>" name="">

	            
                    
                    <!-- Device management and preview screen -->

                    <div id="flow-devices" class="flow">
                      <div class="container">
                        <form id="form-devices">
                          <h1 class="h3 mb-3 font-weight-normal text-center">Select devices</h1>
                          <div class="row mt-3">
                            <div class="col-12 col-sm-8">
                              <label for="audio-input block">Microphone</label>
                              <select id="audio-input" class="custom-select" style="width:100%"></select>
                            </div>
                            <div class="text-center col-sm-4 d-sm-block">
                              <label>Preview</label>
                              <div class="w-100 progress" style="margin-top:0.75rem">
                                <div id="audio-preview" class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </div>
                          </div>
                          <div class="row mt-3">
                            <div class="col-12 col-sm-8">
                              <label for="video-input block">Camera</label>
                              <select id="video-input" class="custom-select" style="width:100%"></select>
                            </div>
                            <!-- <div id="video-list">

                            </div> -->
                            <div id="video-preview" class="col-sm-4 text-center d-sm-block" style="max-width: 250px;max-height: 60px;border-radius:8px;">
                              
                            </div>
                          </div>
                          <div class="row mt-3">
                            <div class="col-12 col-sm-8">
                              <select id="video-input-quality" class="custom-select" style="width:100%">
                                <option value="360p">360p (nHD) @ 15 fps (600 Kbps max)</option>
                                <option value="540p" selected>540p (qHD) @ 15 fps (1.4 Mbps max)</option>
                                <option value="720p">720p (HD) @ 15 fps (1.4 Mbps max)</option>
                              </select>
                            </div>
                          </div>
                          <div class="row mt-3">
                            <div class="col-12 col-sm-8">
                              <label for="audio-output block">Speaker</label>
                              <select id="audio-output" class="custom-select" style="width:100%"></select>
                            </div>
                            <div class="col-sm-4">
                              <button id="button-test-sound" class="btn btn-outline-secondary btn-block h-50 d-sm-block" style="margin-top:2rem">Test</button>
                            </div>
                          </div>

                          <div class="row mt-3">
                            <div class="col-lg">
                              <button id="join_meeting" class="btn btn-lg btn-primary btn-block" type="submit">Join</button>
                            </div>
                          </div>
                         <!--  <div class="row mt-3">
                            <div class="col-lg">
                              <p>Ready to join meeting <b><span id="info-meeting"></span></b> as <b><span id="info-name"></span></b>.</p>
                            </div>
                          </div> -->
                        </form>
                      <!--   <div id="progress-join" class="w-100 progress progress-hidden">
                          <div class="w-100 progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div> -->
                      </div>
                    </div>

                    <!-- In-meeting screen -->
 
                    <div id="flow-meeting" class="flow" style="left:0;top:0;bottom:55px;right:0; display:none;">
                     
                      <div class="p-2 d-none d-sm-block align-items-end" style="position:fixed;right:0;bottom:0;left:0;">
                        <div class="row align-items-end">
                          <div class="col">
                            <div id="chime-meeting-id" class="text-muted"></div>
                            <div id="desktop-attendee-id" class="text-muted"></div>
                          </div>
                          <div class="col d-none d-lg-block">
                            <div id="video-uplink-bandwidth" class="text-muted text-right"></div>
                            <div id="video-downlink-bandwidth" class="text-muted text-right"></div>
                          </div>
                        </div>
                      </div>
                      <audio id="meeting-audio" style="display:none"></audio>
                      <div id="meeting-container" class="container-fulid h-100" style="display:flex; flex-flow:column">
                        <div class="row mb-3 mb-lg-0" style="flex: unset;">
                          <div class="col-12 col-lg-3 order-1 order-lg-1 text-center text-lg-left">
                            <div id="meeting-id" class="navbar-brand text-muted m-0 m-lg-2"></div>
                            <div id="mobile-chime-meeting-id" class="text-muted d-block d-sm-none" style="font-size:0.65rem;"></div>
                            <div id="mobile-attendee-id" class="text-muted d-block d-sm-none mb-2" style="font-size:0.65rem;"></div>
                          </div>
                          <div class="col-8 col-lg-6 order-2 order-lg-2 text-left text-lg-center">
                            <div class="btn-group mx-1 mx-xl-2 my-2" role="group" aria-label="Toggle microphone">
                              <button id="button-microphone" type="button" class="btn btn-success" title="Toggle microphone">
                                <i class="material-icons icon--left">mic</i>
                                <!-- ${require('../../node_modules/open-iconic/svg/microphone.svg').default} -->
                              </button>
                              <div class="btn-group" role="group">
                                <button id="button-microphone-drop" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Select microphone"></button>
                                <div id="dropdown-menu-microphone" class="dropdown-menu dropdown-menu-right" aria-labelledby="button-microphone-drop" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">
                                  <a class="dropdown-item" href="#">Default microphone</a>
                                </div>
                              </div>
                            </div>
                            <div class="btn-group mx-1 mx-xl-2 my-2" role="group" aria-label="Toggle camera">
                              <button id="button-camera" type="button" class="btn btn-success" title="Toggle camera">
                                <i class="material-icons icon--left">camera_alt</i>
                                <!-- ${require('../../node_modules/open-iconic/svg/video.svg').default} -->
                              </button>
                              <div class="btn-group" role="group">
                                <button id="button-camera-drop" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Select camera"></button>
                                <div id="dropdown-menu-camera" class="dropdown-menu dropdown-menu-right" aria-labelledby="button-camera-drop" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">
                                  <a class="dropdown-item" href="#">Default camera</a>
                                </div>
                              </div>
                            </div>
                            <div class="btn-group mx-1 mx-xl-2 my-2" role="group" aria-label="Toggle content share">
                              <button id="button-content-share" type="button" class="btn btn-success" title="Toggle content share">
                                <i class="material-icons icon--left">screen_share</i>
                                <!-- ${require('../../node_modules/open-iconic/svg/camera-slr.svg').default} -->
                              </button>
                              <div class="btn-group" role="group">
                                <button id="button-content-share-drop" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Select content to share"></button>
                                <div id="dropdown-menu-content-share" class="dropdown-menu dropdown-menu-right" aria-labelledby="button-content-share-drop" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">
                                  <a id="dropdown-item-content-share-screen-capture" class="dropdown-item" href="#">Screen Capture...</a>
                                  <a id="dropdown-item-content-share-screen-test-video" class="dropdown-item" href="#">Test Video</a>
                                  <a id="dropdown-item-content-share-file-item" class="dropdown-item" href="#"><input id="content-share-item" type="file"></a>
                                </div>
                              </div>
                            </div>
                            <button id="button-pause-content-share" type="button" class="btn btn-success mx-1 mx-xl-2 my-2" title="Pause and unpause content share">
                              <i class="material-icons icon--left">pause</i>
                              <!-- ${require('../../node_modules/open-iconic/svg/media-pause.svg').default} -->
                            </button>
                            <div class="btn-group mx-1 mx-xl-2 my-2" role="group" aria-label="Toggle speaker">
                              <button id="button-speaker" type="button" class="btn btn-success" title="Toggle speaker">
                                <i class="material-icons icon--left">volume_up</i>
                                <!-- ${require('../../node_modules/open-iconic/svg/volume-low.svg').default} -->
                              </button>
                              <div class="btn-group" role="group">
                                <button id="button-speaker-drop" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Select speaker"></button>
                                <div id="dropdown-menu-speaker" class="dropdown-menu dropdown-menu-right" aria-labelledby="button-speaker-drop" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">
                                  <a class="dropdown-item" href="#">Default speaker</a>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-4 col-lg-3 order-3 order-lg-3 text-right text-lg-right">
                            <button id="button-meeting-leave" type="button" class="btn btn-outline-success mx-1 mx-xl-2 my-2 px-4" title="Leave meeting">
                              <i class="material-icons icon--left">reply</i>
                              <!-- ${require('../../node_modules/open-iconic/svg/account-logout.svg').default} -->
                            </button>
                            <button id="button-meeting-end" type="button" class="btn btn-outline-danger mx-1 mx-xl-2 my-2 px-4" title="End meeting">
                              <i class="material-icons icon--left">exit_to_app</i>
                              <!-- ${require('../../node_modules/open-iconic/svg/power-standby.svg').default} -->
                            </button>
                          </div>
                        </div>
                        <div id="roster-tile-container" class="row flex-sm-grow-1 overflow-hidden h-100" style="flex: unset;">
                            <div class="col-lg-9">
                                    <div class="player embed-responsive-item">
                                        <div class="player__content">
                                            <div id="video-list-hosting" class="py-16pt text-center">
                                   
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-lg-3">
                                <div id="video-list" class="py-16pt text-center">
                                   
                                </div>
                            </div>
                          <video id="content-share-video" crossOrigin="anonymous" style="display:none"></video>
                        </div>
                      </div>

                      
                    </div>
               
				
			<?php } ?>
            

        </div>

    </div>
</div> 

<script type="text/javascript">
    var create_meeting_for_online = "<?php echo site_url('create_meeting'); ?>";
    var get_meeting_details = "<?php echo site_url('meeting_details'); ?>";
    var get_attendee_details = "<?php echo site_url('attendee_details'); ?>";
</script>
<!-- // END Page Content