
   <?php $user  = isset($data['session']) ? $data['session'] : array(); $userrole = $user['userType'];?>
<section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info" >
                <div class="info-container" style="padding-top: 48px" >
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #E91E63" >&nbsp;</div>
                    <div class="email" style="color: #E91E63">&nbsp;</div>
                    <div class="btn-group user-helper-dropdown">
                        <a href="<?php echo base_url('logout'); ?>">   <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="color: #E91E63">power_settings_new</i></a>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="<?php echo base_url('logout'); ?>"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header bg-pink" ><?= getval($user, 'email') ?></li>
                    <li class="header">MAIN NAVIGATION</li>
                     <?php
        $activeMenu = getActiveMenu();
        $Css = '';
        if (isset($activeMenu)) {
            $Css = $activeMenu == Pages::page_admin_home ? 'active' : '';
        }
        ?>
                    <li class="<?php echo $Css ?>">
                        <a href="<?php echo base_url('adl-home'); ?>">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    
                  
                   
                     
                    
                     
                
                  
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
             <div class="legal">
                <div class="copyright"> Test admin
                    &copy; 2020 <a href="javascript:void(0);"></a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
</section>