<nav id="sidebar" role="navigation" data-step="2" data-intro="Template has <b>many navigation styles</b>" data-position="right" class="navbar-default navbar-static-side">
    <div class="sidebar-collapse menu-scroll">
        <ul id="side-menu" class="nav">

            <div class="clearfix"></div>
            <li class="active"><a href="<? echo base_url().$this->session->userdata('user') ?>"><i class="fa fa-tachometer fa-fw">
                        <div class="icon-bg bg-orange"></div>
                    </i><span class="menu-title">Dashboard</span></a></li>

            <!--<li><a href="<? echo base_url().$this->session->userdata('user'); ?>/add_admin_view"><i class="fa fa-plus fa-fw">
                        <div class="icon-bg bg-pink"></div>
                    </i><span class="menu-title">Add Admin</span></a>

            </li>
            <li><a href="<? echo base_url().$this->session->userdata('user'); ?>/admininfo_view"><i class="fa fa-desktop fa-fw">
                        <div class="icon-bg bg-pink"></div>
                    </i><span class="menu-title">Admin List</span></a>

            </li>-->

            <li><a href="<? echo base_url().'superadmin/user_check_view' ?>"><i class="fa fa-database fa-cloud">
                        <div class="icon-bg bg-red"></div>
                    </i><span class="menu-title">New Registraion</span></a>

            </li>
            <li><a href="<? echo base_url().$this->session->userdata('user'); ?>/number_search_view/0"><i class="fa fa-send-o fa-fw">
                        <div class="icon-bg bg-green"></div>
                    </i><span class="menu-title">Edit Registration</span></a>
            </li>
           <!-- <li><a href="<?/* echo base_url().$this->session->userdata('user'); */?>/report_view"><i class="fa fa-exclamation fa-fw">
                        <div class="icon-bg bg-green"></div>
                    </i><span class="menu-title">View Report</span></a>
            </li>-->



        </ul>
    </div>
</nav>