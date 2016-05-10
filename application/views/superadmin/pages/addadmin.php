<div id="tab-general">
    <div class="panel panel-green">
        <div class="panel-heading"><?php echo $page_title ;?></div>
        <div class="col-lg-12">
        <div class="panel-heading">

                                            <div class="panel-body pan">
                                         
                                                <form id="add_admin" action="<? echo base_url() ?>superadmin/admin_insert" method="post" data-parsley-validate>
                                                <div class="form-body pal">
                                                     <div id="res"></div>
                                                     <div class="form-group">
                                                        <div class="input-icon right">
                                                            <i class="fa fa-user"></i>
                                                            <input required id="name" name="a_fullname" type="text" placeholder="Full Name" class="form-control"  /></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-icon right">
                                                            <i class="fa fa-user"></i>
                                                            <input required id="username" name="a_username" type="text" placeholder="Username" class="form-control" /></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-icon right">
                                                            <i class="fa fa-lock"></i>
                                                            <input required id="password" name="a_password" type="password" placeholder="Password" class="form-control" /></div>
                                                    </div>
                                                   
                                                    <hr />
                                                    
                                                    <div class="form-group">
                                                        <select required class="form-control" id="role" name="a_role">
                                                            <option>Role</option>
                                                            <option value="0">Admin</option>
                                                            <option value="1">Customer Care</option>
                                                            <option value="2">Finance</option>
                                                            <option value="2">Distributor</option>
                                                        </select></div>
                                                  
                                                </div>
                                                <div class="text-left pal">
                                                    <button type="submit" name="submit" value="Insert" class="btn btn-primary btn-block">
                                                        Add</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    
                       
        <script type="text/javascript">
                $("#add_admin").on("submit",function(e) {
                        function zn(data) {
                                $.ajax({
                                url:'<? echo base_url() ?>superadmin/admin_insert/',
                                method:'POST',
                                data:{ 'admin' : JSON.stringify(data) },
                                success:function(flag) {
                                    
                                    if(flag == '1')
                                    {
                                        window.location = '<? echo base_url().$this->session->userdata('user'); ?>/admininfo_view';
                                    }
                                    else
                                    {
                                        $("#res").html("network error");
                                    }

                                    $('#input[type="text"]').val("");

                                }
                            });
                        }


                        form = $(this).serializeArray();
                        data = {};
                        flag = false;

                        for(i=0;i<form.length;i++)
                        {
                            data[form[i]['name']] = form[i]['value'];
                        }

                        zn(data);

                        e.preventDefault();
                });
        </script>
</div>