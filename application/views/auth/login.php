<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Suppy Inventory System</title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/css/style.css" />
  <link rel="icon" href="<?php echo base_url(); ?>assets/img/slsu/slsu_logo.png" />
  <link href="<?php echo base_url(); ?>assets/fontawesome/all.css" rel="stylesheet">
  <style>
    #intro_login {
      background-image: url(Images/slsuloginpage.jpg);
      height: 109vh;
      background-size: cover;
      background-position: center;
    }

    .bg-transparent {
      background-color: rgba(255, 255, 255, 0.5);
      border: 2px solid #000;
      border-radius: 10px;
    }

    .login-opacity {
      opacity: 0.7;
    }

    #email,
    #password {
      background: transparent;
      border: none;
      border-bottom: 2px solid #000000;
      outline: none;
      box-shadow: none;
    }
  </style>
</head>

<body>
  <form action="<?php echo base_url('login-user'); ?>" method="post">
    <div id="intro_login" class="bg-image shadow-2-strong">
      <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0, 0.8, 0.8, 0.6);">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-md-8">
              <div class="bg-secondary rounded shadow-5-strong p-5 login-opacity">
                <?php if (!empty($this->session->flashdata('login-error'))) : ?>
                  <div class="alert alert-danger alert-dismissible fade show text-center" style="width:100%;" role="alert">
                    <?php echo $this->session->flashdata('login-error'); ?>
                  </div>
                <?php endif; ?>
                <div class="floating mb-4 rounded">
                  <input type="email" id="email" name="email" class="form-control bg-secondary">
                  <label class="form-label" for="email"><i class="fa-solid fa-user" style="font-size: 15px;"></i> Email Address</label>
                </div>
                <div class="floating mb-4 rounded">
                  <input type="password" id="password" name="password" class="form-control bg-secondary" />
                  <label class="form-label" for="password"><i class="fa-solid fa-lock"></i> Password</label>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-dark btn-block">Sign in</button>
                  <a href="<?php echo base_url(''); ?>">
                    <button type="button" class="btn btn-dark btn-block">Dashboard</button>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.jss"></script>
  <script src="<?php echo base_url(); ?>assets/js/fontawesome.all.js" crossorigin="anonymous"></script>
</body>

</html>