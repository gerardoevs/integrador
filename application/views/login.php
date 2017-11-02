
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8"/>
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css')?>">
<script src="<?= base_url('assets/js/bootstrap.min.js')?>"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Bfinder | Localización</title>
</head>
<body class="body-login">
<div class="container">
    <div id="loginbox" style="margin-top:100px;" class="mainbox col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2">                    
        <div class="panel panel-info" style="border-color:#aaa;">
            <div class="panel-heading" style="background:#263238; color:white; ">
                <div class="panel-title" >Sign In</div>
            </div>
            <?php if(validation_errors()==TRUE){echo '<div class="alert alert-danger">'.validation_errors().'</div>'; }?>
            <?php if(isset($error)){echo '<div class="alert alert-danger"><p>'.$error.'</p></div>';} ?>     
            <div style="padding-top:30px;" class="panel-body" >
                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                <?= form_open('','id="loginform"','class="form-horizontal"','role="form"') ?>   
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="login-username" type="text" class="form-control" name="user" value="" placeholder="username or email">                                        
                    </div>
                            
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="login-password" type="password" class="form-control" name="pass" placeholder="password">
                    </div>
                    <br>
                    <div style="margin-top:10px" class="form-group">
                        <div class="col-sm-12 controls">
                        	<input type="submit" name="submit" value="Entrar" class="btn btn-success">
                        </div>
                    </div>

                </form>     
            </div>                     
        </div>  
    </div>
<script src="<?= base_url('assets/js/login.js')?>"></script>
</body>
</html>



