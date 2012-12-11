Poetica
======

A social network for poets

This application was built using MySQL and CodeIgniter, an MVC
(Model-View-Controller) framework for PHP.

URL routes are defined as `controller_name/function_name/arg1/arg2/...`

Some routes are explicitly overriden in `application/config/routes.php`

SQL queries are all definied within models


##Application Structure
```
application
├── config
│   ├── autoload.php
│   ├── config.php
│   ├── constants.php
│   ├── database.php
│   ├── routes.php
├── controllers
│   ├── account.php
│   ├── home.php
│   ├── index.html
│   ├── poem.php
│   ├── profile.php
│   ├── search.php
│   └── user.php
├── core
│   ├── MY_Controller.php
├── helpers
│   ├── gravatar_helper.php
├── libraries
│   ├── Template.php
├── models
│   ├── index.html
│   ├── poem_model.php
│   └── user_model.php
└── views
    ├── compose.php
    ├── error_page.php
    ├── home
    │   └── index.php
    ├── index.html
    ├── layouts
    │   └── default.php
    ├── login.php
    ├── partials
    │   └── _states.php
    ├── poem.php
    ├── profile.php
    ├── register.php
    └── search
        ├── poems.php
        └── users.php

```

##Javascripts/Stylesheets
```
public
├── favicon.png
├── images
│   ├── bookandpen.jpg
│   ├── cream_dust.png
│   ├── cream_dust_@2X.png
│   └── foundation
│       └── orbit
│           ├── bullets.jpg
│           ├── left-arrow-small.png
│           ├── left-arrow.png
│           ├── loading.gif
│           ├── mask-black.png
│           ├── pause-black.png
│           ├── right-arrow-small.png
│           ├── right-arrow.png
│           ├── rotator-black.png
│           └── timer-black.png
├── index.html
├── javascripts
│   ├── app.js
│   ├── foundation.min.js
│   ├── jquery.foundation.accordion.js
│   ├── jquery.foundation.alerts.js
│   ├── jquery.foundation.buttons.js
│   ├── jquery.foundation.forms.js
│   ├── jquery.foundation.mediaQueryToggle.js
│   ├── jquery.foundation.navigation.js
│   ├── jquery.foundation.orbit.js
│   ├── jquery.foundation.reveal.js
│   ├── jquery.foundation.tabs.js
│   ├── jquery.foundation.tooltips.js
│   ├── jquery.foundation.topbar.js
│   ├── jquery.js
│   ├── jquery.placeholder.js
│   ├── modernizr.foundation.js
│   ├── pikaday.min.js
│   └── poem.js
├── robots.txt
└── stylesheets
    ├── app.css
    ├── foundation.css
    ├── foundation.min.css
    ├── pikaday.css
    └── search.css

```

