<nav id="sidebar" role="navigation" data-step="2" data-intro="Template has <b>many navigation styles</b>" data-position="right" class="navbar-default navbar-static-side">
    <div class="sidebar-collapse menu-scroll">
        <ul id="side-menu" class="nav">

            <div class="clearfix"></div>
            <li class="active"><a href="<? echo base_url().$this->session->userdata('user') ?>"><i class="fa fa-tachometer fa-fw">
                        <div class="icon-bg bg-orange"></div>
                    </i><span class="menu-title">Dashboard</span></a></li>
            <li><a href="<? echo base_url().$this->session->userdata('user'); ?>/add_admin_view"><i class="fa fa-plus fa-fw">
                        <div class="icon-bg bg-pink"></div>
                    </i><span class="menu-title">Add Admin</span></a>

            </li>
            <li><a href="<? echo base_url().$this->session->userdata('user'); ?>/admininfo_view"><i class="fa fa-desktop fa-fw">
                        <div class="icon-bg bg-pink"></div>
                    </i><span class="menu-title">Admin List</span></a>

            </li>
            <li><a href="<? echo base_url().'superadmin/user_check_view' ?>"><i class="fa fa-database fa-cloud">
                        <div class="icon-bg bg-red"></div>
                    </i><span class="menu-title">New Registraion</span></a>

            </li>
            <li><a href="<? echo base_url().$this->session->userdata('user'); ?>/number_search_view/0"><i class="fa fa-send-o fa-fw">
                        <div class="icon-bg bg-green"></div>
                    </i><span class="menu-title">Edit Registration</span></a>
            </li>
            <li><a href="<? echo base_url().$this->session->userdata('user'); ?>/report_view"><i class="fa fa-exclamation fa-fw">
                        <div class="icon-bg bg-green"></div>
                    </i><span class="menu-title">View Report</span></a>
            </li>
            <li><a href="<? echo base_url().$this->session->userdata('user'); ?>/gui_log_view"><i class="fa fa-anchor fa-fw">
                        <div class="icon-bg bg-green"></div>
                    </i><span class="menu-title">View Gui Log</span></a>
            </li>
           <!-- <li><a href="#"><i class="fa fa-th-list fa-fw">
                        <div class="icon-bg bg-blue"></div>
                    </i><span class="menu-title">CSV Upload</span></a>

            </li>-->

            <!-- </li>
             <li><a href="Forms.html"><i class="fa fa-edit fa-fw">
                 <div class="icon-bg bg-violet"></div>
             </i><span class="menu-title">Forms</span></a>

             </li>
             <li><a href="Tables.html"><i class="fa fa-th-list fa-fw">
                 <div class="icon-bg bg-blue"></div>
             </i><span class="menu-title">Tables</span></a>

             </li>
             <li><a href="DataGrid.html"><i class="fa fa-database fa-fw">
                 <div class="icon-bg bg-red"></div>
             </i><span class="menu-title">Data Grids</span></a>

             </li>
             <li><a href="Pages.html"><i class="fa fa-file-o fa-fw">
                 <div class="icon-bg bg-yellow"></div>
             </i><span class="menu-title">Pages</span></a>

             </li>
             <li><a href="Extras.html"><i class="fa fa-gift fa-fw">
                 <div class="icon-bg bg-grey"></div>
             </i><span class="menu-title">Extras</span></a>

             </li>
             <li><a href="Dropdown.html"><i class="fa fa-sitemap fa-fw">
                 <div class="icon-bg bg-dark"></div>
             </i><span class="menu-title">Multi-Level Dropdown</span></a>

             </li>
             <li><a href="Email.html"><i class="fa fa-envelope-o">
                 <div class="icon-bg bg-primary"></div>
             </i><span class="menu-title">Email</span></a>

             </li>
             <li><a href="Charts.html"><i class="fa fa-bar-chart-o fa-fw">
                 <div class="icon-bg bg-orange"></div>
             </i><span class="menu-title">Charts</span></a>

             </li>
             <li><a href="Animation.html"><i class="fa fa-slack fa-fw">
                 <div class="icon-bg bg-green"></div>
             </i><span class="menu-title">Animations</span></a></li>-->
        </ul>
    </div>
</nav>