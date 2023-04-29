<?php
require('inc/header.php');
?>
<!-- Normal Breadcrumb Begin -->
<section class="normal-breadcrumb set-bg" data-setbg="img/normal-breadcrumb.jpg">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <div class="normal__breadcrumb__text">
          <h2>Login</h2>
          <p>Welcome to the official Anime blog.</p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Normal Breadcrumb End -->

<!-- Login Section Begin -->
<section class="login spad">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="login__form">
          <h3>Login</h3>
          <form action="#">
            <div class="input__item">
              <input type="text" placeholder="Email address" />
              <span class="icon_mail"></span>
            </div>
            <div class="input__item">
              <input type="text" placeholder="Password" />
              <span class="icon_lock"></span>
            </div>
            <button type="submit" class="site-btn">Login Now</button>
          </form>
          <a href="#" class="forget_pass">Forgot Your Password?</a>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="login__register">
          <h3>Dont’t Have An Account?</h3>
          <a href="./signup.php" class="primary-btn">Register Now</a>
        </div>
      </div>
    </div>
    <div class="login__social">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-6">
          <div class="login__social__links">
            <span>or</span>
            <ul>
              <li>
                <a href="https://www.facebook.com/" class="facebook" target="_blank"><i class="fa fa-facebook"></i> Sign in With Facebook</a>
              </li>
              <li>
                <a href="https://accounts.google.com/v3/signin/identifier?dsh=S923217174%3A1682671027390158&authuser=0&continue=https%3A%2F%2Fmyaccount.google.com%2F%3Futm_source%3Daccount-marketing-page%26utm_medium%3Dgo-to-account-button%26pli%3D1&ec=GAlAwAE&hl=en&service=accountsettings&flowName=GlifWebSignIn&flowEntry=AddSession" class="google" target="_blank"><i class="fa fa-google"></i> Sign in With Google</a>
              </li>
              <li>
                <a href="#" class="twitter"><i class="fa fa-twitter"></i> Sign in With Twitter</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Login Section End -->
<?php
require('inc/footer.php')
?>