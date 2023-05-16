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
          <form action="process-login-signup.php" method="post">
            <h1>Create Account</h1>
            <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username">

            <input type="email" class="form-control" id="floatingInput" placeholder="Email Address" name="email">

            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">

            <div class="input-group mb-3">
              <label class="input-group-text" for="inputGroupSelect01">Role</label>
              <select class="form-select" id="inputGroupSelect01" name="role">
                <option value="user">user</option>
                <option value="creator">creator</option>
              </select>
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
          </form>
        </section>
      </div>
    </div>
  </div>
</body>

</html>