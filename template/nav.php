
<?php
    $dashLink = '';
    $dashName = "Dashboard";
    $dashIcon = "ni ni-dashboard-fill";
    if($userType == 'admin'){
        $dashLink = 'vc/admin/dashboard';
    }
    else if($userType == 'superagent'){
        $dashLink = 'vc/superagent/dashboard';
    }
    else if($userType == 'nlrc'){
        $dashLink = "vc/nlrc/dashboard";
    }
    else if($userType == 'influencer'){
        $dashLink = "vc/influencer/dashboard";
    }
?>
<div class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-sidebar-brand">
            <a href="<?php echo base_url($dashLink); ?>" class="logo-link nk-sidebar-logo">
                <img src="<?php echo base_url('assets/nairaboom_logo_light.png'); ?>" alt="logo" style="width: 120px;height: 300px;" class="logo-light logo-img ml-2">
                <img src="<?php echo base_url('assets/nairaboom_logo_light.png'); ?>" alt="logo" style="width: 100px;height: 50px;" class="logo-dark logo-img ml-4">
            </a>
        </div>
        <div class="nk-menu-trigger mr-n2">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
            <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
        </div>
    </div><!-- .nk-sidebar-element -->

    <div class="nk-sidebar-element">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                <ul class="nk-menu">
                    <li class="nk-menu-item">
                        <a href="<?php echo base_url($dashLink); ?>" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon <?php echo $dashIcon; ?>"></em></span>
                            <span class="nk-menu-text"><?php echo $dashName; ?></span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    
                    <!-- begin admin section -->
                    <?php if($userType == 'admin'){  ?>
                        <?php 
                          if(isset($canView)){
                            foreach ($canView as $key => $value): ?>
                           <?php 
                               $state='';
                                if ($canView[$key]['state']===0) {
                                 continue;
                               }
                        ?>
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon <?php echo $value['class']; ?>"></em></span>
                            <span class="nk-menu-text"><?php echo $key; ?></span>
                        </a>
                        <ul class="nk-menu-sub">
                            <?php foreach ($value['children'] as $label =>$link): ?>
                            <li class="nk-menu-item">
                                <a href="<?php echo base_url($link); ?>" class="nk-menu-link"><span class="nk-menu-text"><?php echo $label; ?></span></a>
                            </li>
                            <?php endforeach; ?>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    <?php endforeach; } ?>

                    <?php } ?>
                    <!-- end admin section -->

                    <!-- this start super agent section -->
                    <?php if($userType == 'superagent'): ?>
                        <li class="nk-menu-item">
                            <a href="<?php echo base_url('vc/superagent/agent_network'); ?>" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-user-list"></em></span>
                                <span class="nk-menu-text">My Agents Network</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item">
                            <a href="<?php echo base_url('vc/superagent/request_report'); ?>" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-report"></em></span>
                                <span class="nk-menu-text">Request Report</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item">
                            <a href="<?php echo base_url('vc/superagent/wallet'); ?>" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-wallet-out"></em></span>
                                <span class="nk-menu-text">My Wallet</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item">
                            <a href="<?php echo base_url('vc/superagent/notices'); ?>" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-notice"></em></span>
                                <span class="nk-menu-text">Notices</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item">
                            <a href="<?php echo base_url('vc/superagent/profile'); ?>" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-user-alt"></em></span>
                                <span class="nk-menu-text">Profile</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item">
                            <a href="<?php echo base_url('logout'); ?>" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-signout"></em></span>
                                <span class="nk-menu-text">Logout</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                    <?php endif; ?>
                    <!-- this end the super agent section -->

                    <!-- this start NLRC section -->
                    <?php if($userType == 'nlrc'): ?>
                        
                    <?php endif; ?>

                    <?php if($userType == 'influencer'): ?>
                        <li class="nk-menu-item">
                            <a href="<?php echo base_url('vc/influencer/profile'); ?>" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-user-alt"></em></span>
                                <span class="nk-menu-text">Profile</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item">
                            <a href="<?php echo base_url('vc/influencer/wallet'); ?>" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-wallet-out"></em></span>
                                <span class="nk-menu-text">My Wallet</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item">
                            <a href="<?php echo base_url('logout'); ?>" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-signout"></em></span>
                                <span class="nk-menu-text">Logout</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                    <?php endif; ?>
                    <!-- this end the NLRC section -->

                </ul><!-- .nk-menu -->
            </div><!-- .nk-sidebar-menu -->
        </div><!-- .nk-sidebar-content -->
    </div><!-- .nk-sidebar-element -->
</div>
<!-- sidebar @e -->