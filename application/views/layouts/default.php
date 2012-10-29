<!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8" />

  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />

  <title>Poetica</title>
  <link rel="icon" type="image/png" href="public/favicon.png" />

  <!-- Open Web Fonts -->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400' rel='stylesheet' type='text/css'>

  <!-- CSS Files -->
  <link rel="stylesheet" href="public/stylesheets/foundation.min.css">
  <link rel="stylesheet" href="public/stylesheets/app.css">


  <script src="public/javascripts/modernizr.foundation.js"></script>

  <!-- IE Fix for HTML5 Tags -->
  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

</head>
<body>


  <!-- NAV BAR -->
  <div class="row">
    <div class="twelve columns">
      <div class="fixed contain-to-grid">
        <nav class="top-bar">

          <!-- TITLE AREA -->
          <ul>
            <li class="name">
                <a id="logo" href="/">
                  Poetica
                </a>
            </li>
            <li class="toggle-topbar"><a href="#"></a></li>
          </ul>

          <!-- RIGHT NAV SECTION -->
          <section>
            <ul class="right">
              <li class="divider"></li>
              <li class="has-dropdown">
                <a id="menu-bar"><?=gravatar("bilalquadri92@gmail.com", 35)?> Bilal Quadri</a>
                <ul class="dropdown">
                  <li><label style="cursor: default;">Go to</label></li>
                  <li><a href="/profile">Profile</a></li>
                  <li><a href="/settings">Settings</a></li>
                  <li><a href="/privacy">Privacy</a></li>
                </ul>
              </li>
              <li class="divider hide-for-small"></li>
            </ul>
          </section>

        </nav>
      </div>
    </div>
  </div>


  <!-- CONTENT -->
  <div class="row">
    <div class="twelve columns">
      <?php echo $template['body'] ?>
    </div>
  </div>


  <!-- JS Files -->
  <script src="public/javascripts/jquery.js"></script>
  <script src="public/javascripts/foundation.min.js"></script>


  <!-- Initialize JS Plugins -->
  <script src="public/javascripts/app.js"></script>

</body>
</html>
