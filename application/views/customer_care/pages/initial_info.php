<div id="tab-general">
    <div class="panel panel-green">
        <div class="panel-heading"><? echo $page_title; ?></div>
        <div class="panel-body">
           <form id="init_info" role="form" method="POST" action="">
                <div class="form-group">
                    <label for="phone">Number:</label>
                    <input type="text" value="<? echo $num; ?>" class="form-control" id="phone"  name="phone" disabled="disabled">
                </div>
                
                <div class="form-group">
                    <label for="fullname">Name:</label>
                    <input type="text" class="form-control" name="fullname">
                </div>

                <div class="form-group">
                    <label for="age">Age:</label>
                    <input type="text" class="form-control" name="age" onkeyup="age_validation(this)">
                    <p id="age_result" style="color: red"></p>
                </div>

             <!--  <div class="form-group">
                   <label for="age">Date of Birth:</label>
                   <input type="text" class="form-control" name="date_of_birth">
               </div>-->

               <div class="form-group">
                   <label for="nid">Options:</label>
                   <select id="options" onchange="seletOption(this)">
                       <option value="0">National Id</option>
                       <option value="1">Passport Number</option>
                       <option value="2">Driving License</option>
                       <option value="3">Birth Certificate</option>
                   </select>
               </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="nid" onkeyup="nid_validation(this)">
                    <p id="nid_result" style="color:red"></p>
                </div>

                <div class="form-group">
                    <label for="nname">Nominee Name</label>
                    <input type="text" class="form-control" name="nname" >
                </div>

               <div class="form-group">
                   <label for="nage">Nominee Age:</label>
                   <input type="text" class="form-control" name="nage" onkeyup="nominee_age_validation(this)">
                   <p id="age_result2" style="color: red"></p>
               </div>

            <!--   <div class="form-group">
                   <label for="nage">Nominee National Id:</label>
                   <input type="text" class="form-control" name="nnid" onkeyup="nid_validation_nominee(this)">
                   <p id="nid_result_2" style="color:red"></p>
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
                                <option value="<? echo $value ?>"><? echo $key ?></option>
                            <?
                        }

                       ?>
                       </select>

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
    var validation_flag = 0;

    //age validation
    function age_validation(element)
    {
        if(!isNaN(element.value))
        {
            if((parseInt(element.value) < 60) && (parseInt(element.value) >= 18))
            {
                $("#age_result").html("");
            }
            else
            {
                $("#age_result").html("Age should be less or equal to 60 or Age should be greater or equal to 18");
            }
        }
        else
        {
            $("#age_result").html("Age should be in digit");
        }
    }

    //nominee age validation
    function nominee_age_validation(element)
    {
        if(!isNaN(element.value))
        {
            if((parseInt(element.value) >= 18))
            {
                $("#age_result2").html("");
            }
            else
            {
                $("#age_result2").html("Nominee Age should be greater or equal to 18");
            }
        }
        else
        {
            $("#age_result2").html("Nominee Age should be in digit");
        }
    }

    // changing validation flag
    function seletOption(element)
    {
        validation_flag = element.value;
    }

    //nid validation
    function nid_validation(element)
    {
        if(validation_flag == 0)
        {
            if(!isNaN(element.value))
            {
                if(element.value.length == 13 || element.value.length == 17)
                {
                    $("#nid_result").html("");
                }
                else
                {
                    $("#nid_result").html("National id number should be 13 or 17 characters");
                }
            }
            else
            {
                $("#nid_result").html("National id number contains only number");
            }
        }
        else if(validation_flag == 1)
        {
                if(element.value.length == 7 || element.value.length == 9)
                {
                    $("#nid_result").html("");
                }
                else
                {
                    $("#nid_result").html("Passport Number should be 7 or 9 characters");
                }
        }
        else if(validation_flag == 2)
        {
            if(element.value.length == 10 || element.value.length == 15)
            {
                $("#nid_result").html("");
            }
            else
            {
                $("#nid_result").html("Driving Licence Number should be 10 or 15 characters");
            }
        }
        else if(validation_flag == 3)
        {
            if(element.value.length == 17)
            {
                $("#nid_result").html("");
            }
            else
            {
                $("#nid_result").html("Birth Certificate Serial 17 characters");
            }
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

        data['phone'] = $("#phone").val();

        for(i=0;i<form.length;i++)
        {
            data[form[i]['name']] = form[i]['value'];
        }
        
		//console.log(JSON.stringify(data));
		
		/*req = new XMLHttpRequest();
		
		req.open("POST",'<? echo base_url().$this->session->userdata('user'); ?>/submit_initial_info/',false);
		
		req.onreadystatechange = function(data) {
			console.log(data);
		}
		
		req.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		req.send("init_user="+JSON.stringify(data));*/
		
        $.ajax({
            url:'<? echo base_url().$this->session->userdata('user'); ?>/submit_initial_info/',
            method:'POST',
            data:{'init_user':JSON.stringify(data)},
            success:function(data) {
				console.log(data);
				
                if(data == '1')
                {
                    window.location = '<? echo base_url().$this->session->userdata('user'); ?>/status_view_form/<? echo $num; ?>'
                }
                else
                {
                    alert("error occured");
                }
			
			
            }
        });


        e.preventDefault();
    });
</script>