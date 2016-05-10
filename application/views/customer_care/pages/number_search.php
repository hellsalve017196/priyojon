<div id="tab-general">
    <div class="panel panel-green">
        <div class="panel-heading"><?  echo $page_title ?></div>
        <div class="panel-body">
            <form role="form">
                <div class="form-group">
                    <label for="number">Enter number:</label>
                    <input type="text" class="form-control" id="number" value="88019" onkeyup="check(this)">
                </div>

                <div class="alert alert-danger" id="else" style="display:none">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong>Number cannot be found</strong>
                </div>
                <a id="next" href="" style="display:none" class="btn btn-primary">next</a>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    window.onload = function() {
        document.getElementById("number").value = "";
    };

    function check(element) {
        num = element.value;

        if(num.length == 13)
        {
            xml = new XMLHttpRequest();

            xml.onreadystatechange = function() {
                if(xml.readyState == 4 && xml.responseText)
                {
                    if(xml.responseText == '1')
                    {
                        document.getElementById("next").style.display = 'block';

                        go = '<? echo base_url().$this->session->userdata('user'); ?>/<? echo $navigate_to ?>/'+num;

                        document.getElementById("next").setAttribute("href",go);
                    }
                    else
                    {
                        document.getElementById("else").style.display = 'block';
                    }
                }
            }

            http = '<? echo base_url().$this->session->userdata('user'); ?>/number_search';
            xml.open('POST',http,false);
            send = 'num='+num;
            xml.setRequestHeader('Content-type','application/x-www-form-urlencoded');
            xml.send(send);
        }
        else
        {
            document.getElementById("next").style.display = 'none';
            document.getElementById("else").style.display = 'none';
        }

    }
</script>