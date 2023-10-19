<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Suppy Inventory System</title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/css/style.css" />
  <style>
    #intro_login {
      background-image: url(Images/slsuloginpage.jpg);
      height: 108.5vh;
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
                <div class="form-floating mb-4 rounded">
                  <input type="email" id="form1Example1" name="email" class="form-control bg-secondary" />
                  <label class="form-label" for="form1Example1">Email Address :</label>
                </div>
                <div class="form-floating mb-4 rounded">
                  <input type="password" id="form1Example2" name="password" class="form-control bg-secondary" />
                  <label class="form-label" for="form1Example2">Password :</label>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-dark btn-block">Sign in</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
  <script type="text/javascript" src="assets/js/bootstrap.bundle.min.jss"></script>
</body>

</html>