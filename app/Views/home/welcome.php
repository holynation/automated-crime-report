<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="<?= base_url('assets/public/css/global.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/public/css/index.css'); ?>" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Bossa:wght@400;500;700&display=swap"
    />
  </head>
  <body>
    <div class="landing-page">
      <div class="logo">
        <img class="image-2-icon" alt="" src="<?= base_url('assets/image-2@2x.png'); ?>" />
        <b class="security-unit">SECURITY UNIT</b>
      </div>
      <div class="report-crime-parent">
        <div class="report-crime">
          <a href="">Report Crime</a>
        </div>
        <div class="report-crime">
          <a>View Reports</a>
        </div>
        <div class="report-crime">
          <a>About Us</a>
        </div>
        <div class="report-crime">
          <a>Support</a>
        </div>
      </div>
      <div class="frame-parent">
        <div class="log-in-wrapper">
          <div class="log-in">
            <a href="">Log in</a>
          </div>
        </div>
        <div class="register-wrapper">
          <div class="register">
            <a href="">Register</a>
          </div>
        </div>
      </div>
      <div class="frame-group">
        <div class="welcome-to-ui-automated-crime-parent">
          <b class="welcome-to-ui"
            >Welcome to UI Automated Crime Reporting System (ACRS)</b
          >
          <div class="our-commitment-is">
            Our commitment is to provide a convenient, user-friendly, and secure
            platform for reporting crimes, ensuring that every voice is heard
            and every incident is addressed promptly.
          </div>
        </div>
        <div class="report-a-crime-now-wrapper" id="frameContainer5">
          <div class="security-unit"><a href="">Report a crime now</a></div>
        </div>
      </div>
      <div class="university-of-ibadan">
        ©2023 University of Ibadan Security Unit
      </div>
      <div class="emergency-line-234">Emergency line: +234 70 1890 5640</div>
    </div>

    <script>
      var frameContainer5 = document.getElementById("frameContainer5");
      if (frameContainer5) {
        frameContainer5.addEventListener("click", function (e) {
          // Please sync "Report Crime" to the project
        });
      }
    </script>
  </body>
</html>
