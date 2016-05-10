<div class="page-form">
    <div class="panel panel-blue">
        <div class="panel-body pan">
            <form action="<? echo base_url().'login/get_in' ?>" method="post" class="form-horizontal">
                <div class="form-body pal">

                    <div class="form-group">
                        <div class="col-md-12 text-center">
                            <img src="<? echo base_url().'files/images/logo.jpg' ?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12 text-center">
                            <h1><? echo $flag; ?></h1>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="col-md-3 control-label">
                            Username:</label>
                        <div class="col-md-9">
                            <div class="input-icon right">
                                <i class="fa fa-user"></i>
                                <input id="inputName" type="text" name="username" placeholder="username" class="form-control"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="col-md-3 control-label">
                            Password:</label>
                        <div class="col-md-9">
                            <div class="input-icon right">
                                <i class="fa fa-lock"></i>
                                <input id="inputPassword" type="password" name="password" placeholder="password" class="form-control"></div>
                        </div>
                    </div>
                    <div class="form-group mbn">
                        <div class="col-lg-12" align="right">
                            <div class="form-group mbn">
                                <div class="col-lg-3">
                                    &nbsp;
                                </div>
                                <div class="col-lg-9">
                                    <input type="submit" value="Log In" class="btn btn-warning">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-lg-12 text-center">
        <p>
            Forgot Something ?
        </p>
    </div>
</div>