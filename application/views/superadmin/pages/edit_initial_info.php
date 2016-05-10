<div id="tab-general">
    <div class="panel panel-green">
        <div class="panel-heading"><? echo $page_title; ?></div>
        <div class="panel-body">
            <form id="init_info" role="form" method="POST" action="">
                <div class="form-group">
                    <label for="phone">Number:</label>
                    <input type="text" value="<? echo $user_data['MSISDN'] ?>" class="form-control" readonly="true" name="MSISDN">
                </div>

                <div class="form-group">
                    <label for="fullname">Name:</label>
                    <input type="text" value="<? echo $user_data['NAME'] ?>" class="form-control" name="NAME">
                </div>

                <div class="form-group">
                    <label for="age">Age:</label>
                    <input type="text" class="form-control" value="<? echo $user_data['AGE'] ?>" name="AGE" onkeyup="age_validation(this)">
                    <p id="age_result"></p>
                </div>

             <!--   <div class="form-group">
                    <label for="age">Date of Birth:</label>
                    <input type="text" class="form-control" value="<? echo $user_data['DATEOFBIRTH'] ?>" name="DATEOFBIRTH">
                </div> -->

                <div class="form-group">
                    <label for="nid">National Id:</label>
                    <input type="text" class="form-control" value="<? echo $user_data['NID'] ?>" name="NID" onkeyup="nid_validation(this)">
                    <p id="nid_result"></p>
                </div>

                <div class="form-group">
                    <label for="nname">Nominee Name</label>
                    <input type="text" class="form-control" value="<? echo $user_data['nname'] ?>" name="nname" >
                </div>

                <div class="form-group">
                    <label for="nage">Nominee Age</label>
                    <input type="text" class="form-control" value="<? echo $user_data['nage'] ?>" name="nage" >
                </div>

              <!--  <div class="form-group">
                    <label for="nage">Nominee National Id:</label>
                    <input type="text" class="form-control" value="<? echo $user_data['nnid'] ?>" name="nnid" onkeyup="nid_validation_nominee(this)">
                    <p id="nid_result_2"></p>
                </div> -->

                <div class="form-group">
                    <label for="nrelation">Relation:</label>
                    <?

                    $rel = $relation;

                    ?>
                    <select name="nrelation">
                        <?
                        foreach($rel as $key=>$value)
                        {
                            ?>
                            <option <? if($user_data['nrelation'] == $value) { ?> selected <? } ?> value="<? echo $value ?>"><? echo $key ?></option>
                            <?
                        }

                        ?>
                    </select>

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
                                    <option <? if($user_data['INSURANCE_PACK'] == $i['ID']) { ?> selected <? } ?> value="<? echo $i['ID'] ?>">(Insurance Type:<? echo $i['INSURANCE_TYPE'] ?>),
                                        (Insurance Value:<? echo $i['INSURANCE_VALUE'] ?>)</option>
                                    <?

                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="fullname">Registration Date:</label>
                    <input type="text" class="form-control" value="<? echo $user_data['REGISTRATION_DATE'] ?>" readonly="true" name="REGISTRATION_DATE">
                </div>

                <div class="form-group">
                    <label for="fullname">Activation Date:</label>
                    <input type="text" class="form-control" value="<? echo $user_data['ACTIVATION_DATE'] ?>" id="activation_date" name="ACTIVATION_DATE">
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
    //age validation
    function age_validation(element)
    {
        if(parseInt(element.value) < 60)
        {
            $("#age_result").html("");
        }
        else
        {
            $("#age_result").html("Age should be less than 60");
        }
    }

    //nid validation
    function nid_validation(element)
    {
        if(element.value.length == 13 || element.value.length == 17)
        {
            $("#nid_result").html("");
        }
        else
        {
            $("#nid_result").html("National id number should be 13 or 17");
        }
    }

    //nid nominee validation
    function nid_validation_nominee(element)
    {
        if(element.value.length == 13 || element.value.length == 17)
        {
            $("#nid_result_2").html("");
        }
        else
        {
            $("#nid_result_2").html("National id number should be 13 or 17");
        }
    }


    $("#init_info").on('submit',function(e) {

        form = $(this).serializeArray();
        data = {};


        for (i = 0; i < form.length; i++) {
            data[form[i]['name']] = form[i]['value'];
        }


        $.ajax({
            url:'<? echo base_url().$this->session->userdata('user'); ?>/editing_registration/',
            method: 'POST',
            data: {'init_user': JSON.stringify(data)},
            success: function (data) {
               if (data == '1') {
                    window.location = '<? echo base_url().$this->session->userdata('user'); ?>/success/1'
                }
                else {
                    alert("error occured");
                }
            }
        });

        e.preventDefault();


    });
</script>
