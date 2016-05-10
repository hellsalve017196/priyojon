<div id="header-topbar-option-demo" class="page-header-topbar">
    <nav id="topbar" role="navigation" style="margin-bottom: 0;" data-step="3" class="navbar navbar-default navbar-static-top">
        <div class="navbar-header">
            <button type="button" data-toggle="collapse" data-target=".sidebar-collapse" class="navbar-toggle"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            <a id="logo" href="index.html" class="navbar-brand"><span class="fa fa-rocket"></span><span class="logo-text">Aparajito</span><span style="display: none" class="logo-text-icon">µ</span></a></div>
        <div class="topbar-main"><a id="menu-toggle" href="#" class="hidden-xs"><i class="fa fa-bars"></i></a>


            <div class="news-update-box hidden-xs"><span class="text-uppercase mrm pull-left text-white">News:</span>
                <ul id="news-update" class="ticker list-unstyled">
                    <li>Welcome to Banglalink Prijonyon Admin Panel </li>

                </ul>
            </div>
            <?  $user = $this->session->userdata('log_data')  ?>
            <ul class="nav navbar navbar-top-links navbar-right mbn">

                <li class="dropdown topbar-user"><a data-hover="dropdown" href="#" class="dropdown-toggle"><img src="<? echo base_url(); ?>files/images/avatar/profile-pic.png" alt="" class="img-responsive img-circle">&nbsp;<span class="hidden-xs"><? echo $this->session->userdata('user') ?></span>&nbsp;<span class="caret"></span></a>
                    <ul class="dropdown-menu dropdown-user pull-right">
                        <li><a href="<? echo base_url() ?>superadmin/updating_self/"><i class="fa fa-calendar"></i>Change username or password</a></li>
                        <li><a href="<? echo base_url() ?>login/get_out"><i class="fa fa-calendar"></i>Logout</a></li>
                    </ul>
                </li>
                <!--
                <li id="topbar-chat" class="hidden-xs"><a href="javascript:void(0)" data-step="4" data-intro="&lt;b&gt;Form chat&lt;/b&gt; keep you connecting with other coworker" data-position="left" class="btn-chat"><i class="fa fa-comments"></i><span class="badge badge-info">3</span></a></li>-->
            </ul>
        </div>
    </nav>
    <!--BEGIN MODAL CONFIG PORTLET-->
    <div id="modal-config" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">
                        ×</button>
                    <h4 class="modal-title">
                        Modal title</h4>
                </div>
                <div class="modal-body">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eleifend et nisl eget
                        porta. Curabitur elementum sem molestie nisl varius, eget tempus odio molestie.
                        Nunc vehicula sem arcu, eu pulvinar neque cursus ac. Aliquam ultricies lobortis
                        magna et aliquam. Vestibulum egestas eu urna sed ultricies. Nullam pulvinar dolor
                        vitae quam dictum condimentum. Integer a sodales elit, eu pulvinar leo. Nunc nec
                        aliquam nisi, a mollis neque. Ut vel felis quis tellus hendrerit placerat. Vivamus
                        vel nisl non magna feugiat dignissim sed ut nibh. Nulla elementum, est a pretium
                        hendrerit, arcu risus luctus augue, mattis aliquet orci ligula eget massa. Sed ut
                        ultricies felis.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">
                        Close</button>
                    <button type="button" class="btn btn-primary">
                        Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <ul class="list-inline item-details">
                <li><a href="http://themifycloud.com">Admin templates</a></li>
                <li><a href="http://themescloud.org">Bootstrap themes</a></li>
            </ul>
        </div>
    </div>
    <!--END MODAL CONFIG PORTLET-->
</div>

<div id="wrapper">