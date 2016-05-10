<div id="tab-general">
    <div class="panel panel-green">
        <div class="panel-heading"><?  echo $page_title ?></div>
        <div class="panel-body">
            <form role="form">
                <div class="form-group">
                    <label for="number">Enter user type:</label>
                    <select class="form-control" id="type">
                        <option value="0">Incomplete Registration</option>
                        <option value="1">Complete Registration</option>
                        <option value="2">National ID Missing</option>
                        <option value="3">Activation date Missing</option>
                        <option value="4">Insurance pack Missing</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="number">From:</label>
                    <input id="from" class="form-control" placeholder="from"/>
                </div>

                <div class="form-group">
                    <label for="number">To:</label>
                    <input id="to" class="form-control" placeholder="to"/>
                </div>

                <input onclick="generate()" class="btn btn-primary" type="button" value="Generate">
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(
        function () {
            $("#from").datepicker({ dateFormat :'yy-mm-dd 00:00:00' });
            $("#to").datepicker({ dateFormat :'yy-mm-dd 12:00:00' });
        }
    );

    function generate()
    {
        if($.trim($("#from").val()) != '' && $.trim($("#to").val()) != '')
        {
            from = $("#from").val();
            to = $("#to").val();
            type = $("#type").val();

            window.open('<? echo base_url().$this->session->userdata('user'); ?>/report_genetrate?from='+from+'&to='+to+'&type='+type,"_blank");
        }
        else
        {
            alert("please fill all the fields");
        }
    }
</script>
