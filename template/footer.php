<!-- footer @s -->
                <div class="nk-footer">
                    <div class="container-fluid">
                        <div class="nk-footer-wrap">
                            <div class="nk-footer-copyright"> &copy;
                            <script>
                              document.write(new Date().getFullYear());
                            </script>
                            Nairaboom. Machine Push NIG.LTD. All Rights Reserved | Powered by
                            <a href="https://codefixbug.com" target="_blank" class="footer-link fw-bolder">Codefixbug Limited.</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->

    <!-- this is for the change password -->
    <div class="row">
      <div id="myModalPassword" class="modal fade animated" role="dialog">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title">Change your password</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                  </div>
                  <div class="modal-body">
                    <!-- this is the notification section -->
                        <div id="data_notify"></div> 
                      <!-- end notification -->
                      <form action="<?php echo base_url('vc/changePassword'); ?>" method="post" role="form" id="form_change_password" name="form_change_password">
                        <div class="form-group mb-3">
                            <label for="current_password">Current Password</label>
                            <input class="form-control" type="password" required name="current_password" id="current_password" placeholder="Enter your current password">
                        </div>
                        <div class="form-group">
                          <label for="password">New Password</label>
                            <div class="form-control-wrap">
                                <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                </a>
                                <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="Enter your password">
                            </div>
                        </div><!-- .foem-group -->

                        <div class="form-group">
                          <label for="password">Confirm Password</label>
                            <div class="form-control-wrap">
                                <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch" data-target="confirm_password">
                                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                </a>
                                <input type="password" class="form-control form-control-lg" name="confirm_password" id="confirm_password" placeholder="Enter your password again">
                            </div>
                        </div><!-- .foem-group -->
                        <div class="form-group">
                          <button class="btn btn-primary">Update</button>
                        </div>
                        <input type="hidden" name="isajax">
                      </form>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-dark" id="close" data-dismiss="modal">Close
                      </button>
                  </div>
              </div>
          </div>
      </div>
    </div>

    <!-- Core JS files -->
    <script src="<?php echo base_url('assets/private/js/bundle.js'); ?>"></script>
    <script src="<?php echo base_url('assets/private/js/scripts.js'); ?>"></script>
    <!-- /core JS files -->
    <script src="<?php echo base_url('assets/public/lib/toastr/toastr.min.js'); ?>"></script>

    <?php if(@$userType == 'admin'): ?>
    <!-- <script src="<?php // echo base_url('assets/public/lib/datatables/datatables.min.js'); ?>"></script> -->
    <!-- <script src="<?php // echo base_url('assets/public/lib/datatables/extensions/jszip/jszip.min.js'); ?>"></script> -->
    <!-- <script src="<?php // echo base_url('assets/public/lib/datatables/extensions/buttons.min.js'); ?>"></script> -->
    <?php endif; ?>
    
    <script src="<?php echo base_url('assets/custom.js'); ?>"></script>
    <!-- /theme JS files -->
    <script type="text/javascript">
      $(document).ready(function(){
        var data_notify = $('#data_notify');
        $('#form_change_password').submit(function(e){
          e.preventDefault();
          var password = $('#password').val(),
              confirm_password = $('#confirm_password').val(),
              current_password = $('#current_password').val();

              if(password == '' || confirm_password == '' || password == ''){
                  data_notify.html('<p class="alert alert-danger" style="width:100%;margin:0 auto;">All Field is required...</p>');
                  return false;
              }
              else if(password != confirm_password ){
                data_notify.html('<p class="alert alert-danger" style="width:100%;margin:0 auto;">New password must match Confirm password...</p>');
                return false;
              }else{
                submitAjaxForm($(this));
              }
        });

        // this is for dark/light theme
        let themeState = false;
        if(localStorage.getItem('nairaboom-app-theme') !== null){
          let themeColor = JSON.parse(localStorage.getItem('nairaboom-app-theme'));
          if(themeColor == 0){
            $('li[data-theme-color=1] a').addClass('dark-switch active');
            $("body").addClass('dark-mode active')
          }else{
            $('li[data-theme-color=1] a').addClass('dark-switch');
          }
        }

        $('li[data-theme-color=1] a').click(function(e){
          e.preventDefault();
          if(localStorage.getItem('nairaboom-app-theme') !== null){
            let statetheme = JSON.parse(localStorage.getItem('nairaboom-app-theme'));
            themeState = statetheme == 0 ? true : false;
          }
          // if nairaboom-app-theme is 1, dark mode is active,else not active
          if(themeState){
            localStorage.setItem('nairaboom-app-theme', JSON.stringify('1'));
          }else{
            localStorage.setItem('nairaboom-app-theme', JSON.stringify('0'));
          }
        });
      })
    </script>
</body>
</html>