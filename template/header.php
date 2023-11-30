<!DOCTYPE html>
<html lang="en" class="js">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Nairaboom">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Fav Icon  -->
    <link rel="icon" type="image/icon" href="<?php echo base_url('assets/nairaboom_favicon.ico'); ?>">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    
    <!-- Page Title  -->
    <title><?php $modelPage = (@$model) ? removeUnderscore(@$model) .' '. "Page" : ' Dashboard '; 
        echo getTitlePage($modelPage); ?></title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="<?php echo base_url('assets/private/css/dashlite.css'); ?>">
    <link href="<?php echo base_url('assets/public/lib/toastr/toastr.css'); ?>" rel="stylesheet" type="text/css">
    <link id="skin-default" rel="stylesheet" href="<?php echo base_url('assets/private/css/theme.css?ver=2.4.0'); ?>">

    <style>
      #notification{
          display: none;
          position: absolute;
          width: 50%;
          z-index: 4000;
      }
      .modal-dialog {
          margin-top: 15px ;
      }
      select{
        wdith:100%;
        display: block;
      }
        /* ------------------------------------------------------------------------------
            *
            *  # Chart styling
            *
            *  Charts base - container and sizing setup
            *
            * ---------------------------------------------------------------------------- */
        .chart-container {
          position: relative;
          width: 100%; }
          .chart-container.has-scroll {
            overflow-x: scroll;
            overflow-y: visible;
            max-width: 100%; }
          @media (max-width: 767.98px) {
            .chart-container {
              overflow-x: scroll;
              overflow-y: visible;
              max-width: 100%; } }

        .chart {
          position: relative;
          display: block;
          width: 100%; }
          .chart.has-minimum-width {
            min-width: 37.5rem; }

        .has-fixed-height {
          height: 400px; }

        .chart-pie {
          width: 100%;
          height: 400px;
          min-width: 31.25rem;}
    </style>
    <script type="text/javascript" src="<?php echo base_url('assets/public/js/jquery.min.js'); ?>"></script>
</head>

<?php
$userType = $webSessionManager->getCurrentUserProp('user_type');
$backgroundUrl = null;
// using this to check if superagent had changed their password upon first login
if(($userType == 'superagent' || $userType == 'nlrc' || $userType == 'influencer') && isset($hasChangePassword) && $hasChangePassword == 0){
    echo "<script>
      $(document).ready(function(){
           $('#myModalPassword').modal({
            backdrop: 'static',
             keyboard: false,
             show: true
          }); 
      });
   </script>";
}
?>

<?php 
if(@$model == 'dashboard' && ($userType == 'influencer' || $userType == 'nlrc')){
$urlLink = base_url('assets/bg_2.jpg');
$backgroundUrl = "background-image: url($urlLink)";

}?>
 
<body class="nk-body bg-lighter npc-general has-sidebar" style="<?= $backgroundUrl ?>">
    <div id="notification" class="alert alert-dismissable text-center"></div>
    <input type="hidden" value="<?php echo base_url(); ?>" id='baseurl'>
    
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">

            <?php if($userType != 'nlrc'): ?>
            <!-- sidebar @s -->
                <?php include_once ROOTPATH.'template/nav.php'; ?>
            <!-- sidebar @e -->
            <?php endif; ?>

            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <div class="nk-header nk-header-fixed is-light">
                    <div class="container-fluid">
                        <div class="nk-header-wrap">
                            <div class="nk-menu-trigger d-xl-none ml-n1">
                                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                            </div>
                            <div class="nk-header-brand d-xl-none" style="width:5rem;">
                                <a href="<?php echo base_url($dashLink); ?>" class="logo-link">
                                    <img src="<?php echo base_url('assets/nairaboom_logo.svg'); ?>" alt="" style="width: 400px;height: 60px;" class="logo-dark">
                                </a>
                            </div><!-- .nk-header-brand -->
                            <div class="nk-header-tools">
                                <ul class="nk-quick-nav">
                                    <li class="dropdown user-dropdown">
                                        <a href="#" class="dropdown-toggle mr-n1" data-toggle="dropdown">
                                            <div class="user-toggle">
                                                <div class="user-avatar sm">
                                                    <em class="icon ni ni-user-alt"></em>
                                                </div>
                                                <?php
                                                    $fullname = null;
                                                    if($webSessionManager->getCurrentUserProp('firstname')){
                                                        $firstname = $webSessionManager->getCurrentUserProp('firstname');
                                                        $lastname = ($webSessionManager->getCurrentUserProp('lastname')) ? $webSessionManager->getCurrentUserProp('lastname') : $webSessionManager->getCurrentUserProp('surname');  
                                                        $fullname = $firstname.' '.$lastname; 
                                                    }else{
                                                        $fullname = $webSessionManager->getCurrentUserProp('fullname');
                                                    }
                                                    $adminEmail = $webSessionManager->getCurrentUserProp('email');
                                                     
                                                ?>
                                                <div class="user-info d-none d-xl-block">
                                                    <div class="user-status user-status-active">
                                                    <?php
                                                        if($userType == 'admin'){
                                                            echo 'Administator';
                                                        }else if($userType == 'superagent'){
                                                            echo 'Superagent';
                                                        }else if($userType == 'nlrc'){
                                                            echo 'NLRC';
                                                        }else if($userType == 'influencer'){
                                                            echo "Influencer";
                                                        }
                                                    ?></div>
                                                    <div class="user-name dropdown-indicator"><?php echo $fullname; ?></div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                                <div class="user-card">
                                                    <div class="user-avatar">
                                                        <span><?php echo formatToNameLabel($fullname,true); ?></span>
                                                    </div>
                                                    <div class="user-info">
                                                        <span class="lead-text"><?php echo $fullname; ?></span>
                                                        <span class="sub-text"><?php echo $adminEmail; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a href="#" data-toggle='modal' data-target='#myModalPassword'><em class="icon ni ni-setting"></em><span>Change Password</span></a></li>
                                                    <li data-theme-color="1"><a class="dark-switch" href="#"><em class="icon ni ni-moon"></em><span>Dark Mode</span></a></li>
                                                </ul>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a href="<?php echo base_url('logout'); ?>"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- .nk-header-wrap -->
                    </div><!-- .container-fliud -->
                </div>
                <!-- main header @e -->