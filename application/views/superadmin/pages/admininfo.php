<div id="tab-general">
    <div class="panel panel-green">
        <div class="panel-heading"><?php echo $page_title ;?></div>
        <div class="panel-body">
        <div class="col-lg-12">
                        <a href="<? echo base_url().$this->session->userdata('user'); ?>/add_admin_view" class="btn btn-warning">Back to Adding Admin</a><br><br>     
                                <?
                                    if(sizeof($name) > 0)
                                    {
                                ?>
                        <div id="admins">
                            <input class="search form-control" placeholder="Search" />    

                        <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Username</th>
                                        <th>Role</th> 
                                        <th>Edit</th>
                                        <th>Delete</th>  
                                    </tr>
                                    </thead>

                                    <tbody class="list">
                                   <?php 

                                   foreach($name as $post){?>
                                     <tr>
                                         <td class="full"><strong><?php echo $post->a_fullname;?></strong></td>
                                         <td class="usrname"><strong><?php echo $post->a_username;?></strong></td>
                                         <td class="role"><strong><?php echo $role[$post->a_role];?></strong></td>
                                         <td><a href="<? echo base_url().$this->session->userdata('user'); ?>/update_admin_view/<? echo $post->a_id; ?>" class="btn btn-success"><i class="fa fa-edit"></i></a></td>
                                         <td><a href="<? echo base_url().$this->session->userdata('user'); ?>/delete_admin/<? echo $post->a_id; ?>" class="btn btn-danger"><i class="fa fa-cut"></i></td>
                                      </tr>    
                                     <?php }
                                 }
                                 else
                                 {
                                    echo "<h1>Currently there are no admins</h1>";
                                 }

                                     ?> 
                                    </tbody>
                                </table>                    
                        </div>
                                
        </div>
        </div>
                    
<script type="text/javascript" src="<? echo base_url() ?>files/search/list.js"></script>                    
<script type="text/javascript">
    var opt = {
        valueNames:['full','usrname','role']
    }

    var adminList = new List('admins',opt);
</script>
       


           
