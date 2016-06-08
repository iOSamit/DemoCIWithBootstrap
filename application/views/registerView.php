<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeIgniter User Registration Form Demo</title>
    <link href="<?php echo base_url("assets/css/bootstrap.css"); ?>" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="container">
     <div class="row">
          <div class="col-lg-6 col-sm-6">
               <h1>DemoCI&bootstrap</h1>
          </div>
          <div class="col-lg-6 col-sm-6">
               
               <ul class="nav nav-pills pull-right" style="margin-top:20px">
                    <li class="active"><a href="<?php echo site_url('user/login') ?>">Login</a></li>
                    <li><a href="#">Signup</a></li>
               </ul>
               
          </div>
     </div>
</div>
<hr/>
<div class="container">
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <?php echo $this->session->flashdata('verify_msg'); ?>
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>User Registration Form</h4>
            </div>
            <div class="panel-body">
                <?php $attributes = array("name" => "registrationform");
                echo form_open("user/register", $attributes);?>
                <div class="form-group">
                    <label for="name">User Name</label>
                    <input class="form-control" name="userName" placeholder="Your User Name" type="text" value="<?php echo set_value('userName'); ?>" />
                    <span class="text-danger"><?php echo form_error('userName'); ?></span>
                </div>

               
                
                <div class="form-group">
                    <label for="email">Email ID</label>
                    <input class="form-control" name="userEmail" placeholder="Email-ID" type="text" value="<?php echo set_value('userEmail'); ?>" />
                    <span class="text-danger"><?php echo form_error('userEmail'); ?></span>
                </div>

                <div class="form-group">
                    <label for="subject">Password</label>
                    <input class="form-control" name="userPassword" placeholder="Password" type="password" />
                    <span class="text-danger"><?php echo form_error('userPassword'); ?></span>
                </div>

                <div class="form-group">
                    <label for="subject">Confirm Password</label>
                    <input class="form-control" name="cpassword" placeholder="Confirm Password" type="password" />
                    <span class="text-danger"><?php echo form_error('cpassword'); ?></span>
                </div>

                <div class="form-group">
                    <button name="submit" type="submit" class="btn btn-default">Signup</button>
                    <button name="cancel" type="reset" class="btn btn-default">Cancel</button>
                </div>
                <?php echo form_close(); ?>
                <?php echo $this->session->flashdata('msg'); ?>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>