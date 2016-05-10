<div id="tab-general">
    <div class="panel panel-green">
        <div class="panel-heading"><? echo $page_title; ?></div>
        <div class="panel-body">
            <form id="init_info" role="form" method="POST" action="">
                <div class="form-group">
                    <label for="phone">Number:</label>
                    <input type="text" value="<? echo $num; ?>" class="form-control" id="MSISDN" name="phone" disabled="disabled">
                </div>

                <div class="form-group">
                    <label for="fullname">Insurance Coverage:</label>
                    <select class="form-control" name="INSURANCE_PACK">
                        <?
                            if(sizeof($i_pack) > 0)
                            {
                                foreach($i_pack as $i)
                                {
                                    ?>
                                    <option value="<? echo $i['ID'] ?>">
                                       (Insurance Type:<? echo $i['INSURANCE_TYPE'] ?>),
                                       (Insurance Value:<? echo $i['INSURANCE_VALUE'] ?>)
                                    </option>
                                    <?
                                }
                            }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="fullname">Registration Date:</label>
                    <input type="text" class="form-control" value="<? echo date('Y-m-d H:i:s',time()); ?>" name="REGISTRATION_DATE">
                </div>

                <div class="form-group">
                    <label for="fullname">Activation Date:</label>
                    <input type="text" class="form-control" id="activation_date" name="ACTIVATION_DATE">
                </div>

                <input type="submit" value="submit" class="btn btn-success"/>


                <div class="alert alert-danger" id="else" style="display:none">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong>Following number is not a priyojon account</strong>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {

    });

    $("#init_info").on('submit',function(e) {

        form = $(this).serializeArray();
        data = {};

        data['MSISDN'] = $("#MSISDN").val();
        for(i=0;i<form.length;i++)
        {
            data[form[i]['name']] = form[i]['value'];
        }

		//console.log(JSON.stringify(data));
		
       $.ajax({
            url:'<? echo base_url().$this->session->userdata('user'); ?>/submit_status_info/',
            method:'POST',
            data:{'init_user':JSON.stringify(data)},
            success:function(data) {
                if(data == '1')
                {
                    window.location = '<? echo base_url().$this->session->userdata('user'); ?>/success/0';
                }
            }
        });

        e.preventDefault();
    });
</script>