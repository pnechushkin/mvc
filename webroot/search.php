<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="format-detection" content="telephone=no"/>
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <title>Search</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Links -->
    <link rel="stylesheet" href="css/search.css">

    <!--JS-->
    <script src="js/jquery.js"></script>
    <script src="js/jquery-migrate-1.2.1.min.js"></script>
    <script src="js/rd-smoothscroll.min.js"></script>


    <!--[if lt IE 9]>
    <div style=' clear: both; text-align:center; position: relative;'>
        <a href="http://windows.microsoft.com/en-US/internet-explorer/..">
            <img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820"
                 alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."/>
        </a>
    </div>
    <script src="js/html5shiv.js"></script>
    <![endif]-->
    <script src='js/device.min.js'></script>
  </head>
  <body>
  <div class="page">
  <!--========================================================
                            HEADER
  =========================================================-->
    <header>
      <div class="container top-sect">
        <div class="navbar-header">
          <h1 class="navbar-brand">
            <a data-type='rd-navbar-brand'  href="./">business<small>company</small></a>
          </h1>
          <a class="search-form_toggle" href="#"></a>
        </div>

        <div class="help-box text-right">
          <p>Need help?</p>
          <a href="callto:#">800-2345-6789</a>
          <small><span>Hours:</span>  6am-4pm PST M-Th; &nbsp;6am-3pm PST Fri</small>
        </div>
      </div>


      <div id="stuck_container" class="stuck_container">
        <div class="container">
        <nav class="navbar navbar-default navbar-static-top pull-left">

            <div class="">
              <ul class="nav navbar-nav sf-menu" data-type="navbar">
                <li>
                  <a href="./">HOME</a>
                </li>
                <li>
                  <a href="index-1.html">ABOUT</a>
                </li>
                <li class="dropdown">
                  <a href="index-2.html">SERVICES<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span></a>
                  <ul class="dropdown-menu">
                    <li>
                      <a href="#">Lorem ipsum</a>
                    </li>
                    <li>
                      <a href="#">Dolor sit amet  </a>
                    </li>
                    <li>
                      <a href="#">Conse ctetur </a>
                        <ul class="dropdown-menu">
                          <li>
                            <a href="#">Latest</a>
                          </li>
                          <li>
                            <a href="#">Archive</a>
                          </li>
                        </ul>
                    </li>
                  </ul>
                </li>
                <li>
                  <a href="index-3.html">PROJECTS</a>
                </li>

                <li>
                  <a href="index-4.html">CONTACTS</a>
                </li>
              </ul>
            </div>
        </nav>
        <form class="search-form" action="search.php" method="GET" accept-charset="utf-8">
          <label class="search-form_label">
            <input class="search-form_input" type="text" name="s" autocomplete="off" placeholder=""/>
            <span class="search-form_liveout"></span>
          </label>
          <button class="search-form_submit fa-search" type="submit"></button>
        </form>
        </div>

      </div>
    </header>

    <!--========================================================
                              CONTENT
    =========================================================-->

    <section id="content" class="content well">
        <div class="container">
            <h2 class="offs5">Search Results</h2>
            <div id="search-results"></div>
        </div>
    </section>

    <!--========================================================
                              FOOTER
    =========================================================-->
    <footer>
     <section class="well1">
        <div class="container">
              <p class="rights">
                Business Company  &#169; <span id="copyright-year"></span>
                <a href="index-5.html">Privacy Policy</a>
              </p>
        </div>
      </section>
    </footer>
  </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/tm-scripts.js"></script>
  <!-- </script> -->


  </body>
</html>
