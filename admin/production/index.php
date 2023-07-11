<?php
require('inc/header.php');
?>

<body class="login">
  <div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">

          <form action="process-login-signup.php" method="POST">
            <h1>Login form</h1>
            <input type="email" class="form-control" id="floatingInput" placeholder="Email Address" name="email">

            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">

            <div>
              <button type="submit" class="btn btn-primary" name="Login">Log in</button>
              <a class="reset_pass" href="#">Lost your password?</a>
            </div>
            <div class="separator">
              <p class="change_link">New to site?
                <a href="#signup" class="to_register"> Create Account </a>
              </p>

              <div class="clearfix"></div>
              <br />


            </div>
          </form>
        </section>
      </div>

      <div id="register" class="animate form registration_form">
        <section class="login_content">
          <!-- <form action="users.php" method="post" enctype="multipart/form-data">
            <h1>Create Account</h1>
            <input type="text" class="form-control" id="floatingInput" placeholder="fullname" name="username">

            <input type="email" class="form-control" id="floatingInput" placeholder="email" name="email">

            <input type="password" class="form-control" id="floatingPassword" placeholder="password" name="password">

            <input type="file" class="form-control" style="margin-bottom: 1.5rem;" name="Picture " required>

            <div class="input-group mb-3">
              <label>Role *:</label>
              <p>
                User:
                <input type="radio" class="flat" name="role" id="roleM" value="user" required />
                Creator:
                <input type="radio" class="flat" name="role" id="roleF" value="creator" />
                Admin:
                <input type="radio" class="flat" name="role" id="roleF" value="admin" />
              </p>
            </div>

            <div>
              <button type="submit" class="btn btn-primary" name="create">Create</button>
            </div>

            <div class="clearfix"></div>

            <div class="separator">
              <p class="change_link">Already a member ?
                <a href="#signin" class="to_register"> Log in </a>
              </p>

              <div class="clearfix"></div>
              <br />


            </div>
          </form> -->
          <form id="demo-form" data-parsley-validate action="users.php" method="POST" enctype="multipart/form-data">
            <h1>Create Account</h1>
            <input type="text" id="fullname" class="form-control" name="fullname" required placeholder="Full Name" />

            <input type="file" style="margin-bottom: 1.5rem;" id="file" class="form-control" name="Picture" data-parsley-trigger="change" required />

            <input type="email" id="email" class="form-control" name="email" data-parsley-trigger="change" required placeholder="Email" />

            <input type="password" id="password" class="form-control" name="password" data-parsley-trigger="change" required placeholder="Password" />

            <label>Role *:</label>
            <p>
              User:
              <input type="radio" class="flat" name="role" id="roleM" value="user" required />
              Creator:
              <input type="radio" class="flat" name="role" id="roleF" value="creator" />
              Admin:
              <input type="radio" class="flat" name="role" id="roleF" value="admin" />
            </p>


            <br />
            <div class="form-group">
              <div class="col-md-9 col-sm-9  offset-md-3">

                <button type="reset" class="btn btn-danger">Reset</button>
                <button type="submit" class="btn btn-danger" name="submit">submit</button>
              </div>
            </div>

          </form>

          <div class="clearfix"></div>

          <div class="separator">
            <p class="change_link">Already a member ?
              <a href="#signin" class="to_register"> Log in </a>
            </p>

            <div class="clearfix"></div>
            <br />


          </div>

      </div>

      </section>
    </div>
  </div>
  </div>
</body>

</html>