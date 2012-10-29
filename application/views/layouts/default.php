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

  <!-- Included CSS Files (Uncompressed) -->
  <!--
  <link rel="stylesheet" href="public/stylesheets/foundation.css">
  -->

  <!-- Open Web Fonts -->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400' rel='stylesheet' type='text/css'>

  <!-- Included CSS Files (Compressed) -->
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
  <div id="navigation">
    <nav class="top-bar fixed">
      <div class="row">

        <a id="logo" href="/" class="left name">Poetica</a>

        <ul class="right">
          <li class="has-dropdown">
          <a id="menu-bar"><?=gravatar("bilalquadri92@gmail.com", 35)?> Bilal Quadri</a>
            <ul class="dropdown">
              <li><a href="/profile">Profile</a></li>
              <li><a href="/settings">Settings</a></li>
              <li><a href="/privacy">Privacy</a></li>
            </ul>
          </li>
        </ul>

      </div>
    </nav>
  </div>

<!-- CONTENT -->
  <div class="row">
    <div class="twelve columns">
      <?php echo $template['body'] ?>
    </div>
  </div>

  <!-- Included JS Files (Compressed) -->
  <script src="public/javascripts/jquery.js"></script>
  <script src="public/javascripts/foundation.min.js"></script>

  <!-- Initialize JS Plugins -->
  <script src="public/javascripts/app.js"></script>
</body>
</html>
