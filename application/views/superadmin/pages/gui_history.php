<div id="tab-general">
    <div class="panel panel-green">
        <div class="panel-heading"><?  echo $page_title ?></div>
        <div class="panel-body">
            <form role="form" id="frame">
                <div class="form-group">
                    <label for="number">Select User:</label>
                    <select class="form-control" id="type">
                        <?
                            if(sizeof($admin_list) > 0)
                            {
                                foreach($admin_list as $a) {
                                    ?>
                                    <option value="<? echo $a->a_id ?>"><? echo $a->a_fullname ?></option>
                                    <?
                                }
                            }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="number">From:</label>
                    <input id="from" class="form-control jakel"/>
                </div>

                <div class="form-group">
                    <label for="number">To:</label>
                    <input id="to" class="form-control jakel"/>
                </div>

                <input onclick="generate()" class="btn btn-primary" type="button" value="Show Log">
            </form>

            <div id="main" style="display: none">
                <a href="<? echo base_url().$this->session->userdata('user'); ?>/gui_log_view' ?>" class="btn btn-green">Back</a>
                <br>
                <div id="result"></div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(
        function () {
            $("#from").datepicker({ dateFormat :'yy-mm-dd 00:00:00' });
            $("#to").datepicker({ dateFormat :'yy-mm-dd 12:00:00' });
        }
    );

    function generate()
    {
        if(($("#from").val() != '') && ($("#to").val() != ''))
        {
            $.ajax({
                url: "<? echo base_url().$this->session->userdata('user'); ?>/gui_log' ?>",
                method:'GET',
                data:{from:$("#from").val(),to:$("#to").val(),a_id:$("#type").val()},
                success: function (data) {
                    data = JSON.parse(data);

                    if(data.length > 0)
                    {
                            str = '<h1>Result:</h1><br><table class="table"> <tr><td>MSISDN</td> <td>DATE</td></tr>';

                            for(i = 0;i< data.length;i++)
                            {
                                str = str + '<tr><td>' +data[i]['MSISDN']+ '</td><td>' +data[i]['DATE']+ '</td></tr>';
                            }

                            str = str + '</table>';

                            $("#result").html(str);                 }
                    else
                    {
                        $("#result").html("<h1 style='color:red'>No Data Found in this range</h1>");
                    }

                    $("#frame").hide();
                    $("#main").show();
                }
            });
        }
        else
        {
            alert("fill the form properly");
        }

    }
</script>