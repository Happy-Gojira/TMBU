<html>
<head>
  <meta charset="windows-1252">
  <title>TMBU</title>
  <link rel="stylesheet" href="css/carousel.css">
  <!--<link rel="stylesheet" media="screen" href="http://openfontlibrary.org/face/overpass" rel="stylesheet" type="text/css"/> -->

  <link href='http://fonts.googleapis.com/css?family=PT+Serif|Playfair+Display&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="slick/slick.css"/>





</head>
<body>
<?php
  function getHTML($url,$timeout)
  {
       $ch = curl_init($url); // initialize curl with given url
       curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"]); // set  useragent
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // write the response to a variable
       curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // follow redirects if any
       curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout); // max. seconds to execute
       curl_setopt($ch, CURLOPT_FAILONERROR, 1); // stop when it encounters an error
       return @curl_exec($ch);
  }
?>
  <div id="wrap">
    <header>
      <h1>The MoneyBall Union</h1>
      <nav>
        <ul>
          <li><a href="http://tmbu.invisionzone.com/">Forum</a></li>
          <li><a href="http://tmbu.sportsrealm.net/lgexports/tmbu.lg.zip">League File</a></li>
          <li><a href="http://tmbu.sportsrealm.net/statslab/login.php">StatsLab</a></li>
          <li><a href="http://tmbu.sportsrealm.net/lgreports/index.html">Reports</a></li>
          <li><a href="http://tmbu.sportsrealm.net/lgreports/history/index.html">History</a></li>
          <li><a href="http://tmbu.sportsrealm.net/lgexports/exports.php">Export Tracker</a></li>
          <li><a href="http://tmbu.sportsrealm.net/lgreports/online_league_status.html">Export Status</a></li>
        </ul>
      </nav>
      <div>
        <a href="#"><img src="img/1_tmbu_site_banner.jpg" alt="TMBU Logo"></a>
      </div>

    </header>
    <aside class="standings">
      <h2>Standings</h2>
      <h3>HL</h3>
      <div>
        <?php
          $html = getHTML('http://tmbu.sportsrealm.net/statslab/widget.php?show=standings&division=2&sub_league=1', 10);
          echo $html;
        ?>
      </div>
      <div>
        <?php
          $html = getHTML('http://tmbu.sportsrealm.net/statslab/widget.php?show=standings&division=1&sub_league=1', 10);
          echo $html;
        ?>
      </div>
      <div>
        <?php
          $html = getHTML('http://tmbu.sportsrealm.net/statslab/widget.php?show=standings&division=0&sub_league=1', 10);
          echo $html;
        ?>
      </div>
      <h3>SL</h3>
      <div>
        <?php
          $html = getHTML('http://tmbu.sportsrealm.net/statslab/widget.php?show=standings&division=2&sub_league=0', 10);
          echo $html;
        ?>
      </div>
      <div>
        <?php
          $html = getHTML('http://tmbu.sportsrealm.net/statslab/widget.php?show=standings&division=1&sub_league=0', 10);
          echo $html;
        ?>
      </div>
      <div>
        <?php
          $html = getHTML('http://tmbu.sportsrealm.net/statslab/widget.php?show=standings&division=0&sub_league=0', 10);
          echo $html;
        ?>
      </div>
    </aside>
    <aside class="stats">
      <h2>League Leaders</h2>

      <div class="single">
        <div class='panel' >
          <h3>SL Player of the Week</h3>
            <?php
              $html = getHTML('http://tmbu.sportsrealm.net/statslab//widget.php?show=potw&league_id=100&sub_league=0', 10);
              $html = utf8_encode($html);
              echo $html;
            ?>
          <h3>HL Player of the Week</h3>
            <?php
              $html = getHTML('http://tmbu.sportsrealm.net/statslab/widget.php?show=potw&league_id=100&sub_league=1', 10);
              $html = utf8_encode($html);
              echo $html;
            ?>
        </div>
        <div class='panel'>
          <h3>WAR leaders</h3>
            <?php
              $html = getHTML('http://tmbu.sportsrealm.net/statslab//widget.php?stat=war&topX=10', 10);
              $html = utf8_encode($html);
              echo $html;

            ?>
            <h3>pWAR leaders</h3>
            <?php
              $html = getHTML('http://tmbu.sportsrealm.net/statslab//widget.php?stat=pwar&topX=10', 10);
              $html = utf8_encode($html);
              echo $html;

            ?>
        </div>
        <div class='panel'>
          <h3>HR leaders</h3>
          <?php
            $html = getHTML('http://tmbu.sportsrealm.net/statslab//widget.php?stat=hr&topX=10', 10);
            $html = utf8_encode($html);
            echo $html;

          ?>
          <h3>Hit leaders</h3>
          <?php
            $html = getHTML('http://tmbu.sportsrealm.net/statslab//widget.php?stat=h&topX=10', 10);
            $html = utf8_encode($html);
            echo $html;

          ?>
        </div>
        <div class='panel'>
          <h3>K leaders</h3>
          <?php
            $html = getHTML('http://tmbu.sportsrealm.net/statslab//widget.php?stat=pk&topX=10', 10);
            $html = utf8_encode($html);
            echo $html;

          ?>
          <h3>QS leaders</h3>
          <?php
            $html = getHTML('http://tmbu.sportsrealm.net/statslab//widget.php?stat=qs&topX=10', 10);
            $html = utf8_encode($html);
            echo $html;

          ?>
        </div>
      </div>
    </aside>
<!--
This is for the draft
  <aside class="standings">
    <h2>2089 Draft</h2>
      <div>
        <?php
          $html = getHTML('http://tmbu.sportsrealm.net/statslab/widget.php?show=draftList&league_id=100&lastX=26&nextX=10', 10);
          echo $html;
        ?>
      </div>
  </aside>
-->
    <div class="news">
      <h2>Breaking News</h2>
      <div class="articles">
      <?php
        include('simple_html_dom.php');
        //set up curl
        $ch = curl_init("http://tmbu.sportsrealm.net/lgreports//leagues/league_100_home.html");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $curl_html = curl_exec($ch); //use curl to get data from example.com
        $curl_html = utf8_encode($curl_html);

        //use simplehtmldom to parse the site into a dom-like object
        $html = str_get_html($curl_html);

        //grab only articles
        $articles = $html->find("table[class=databg]");


        //reformat links
        $urlAdd = "http://tmbu.sportsrealm.net/lgreports/";
        $stringToRemove = "..";
        $re = "/(\.){2}/";
        $articles = preg_replace($re, $urlAdd, $articles);


        echo $articles[0];
        echo $articles[1];
        echo $articles[2];
       ?>


      </div>

    </div>

    <footer>
      <ul>
        <li>&copy; TMBU 2018</li>
        <li><a href="http://www.ootpdevelopments.com/board">OOTP Boards</a></li>
        <li>OOTP 18</li>
      </ul>
    </footer>

  </div>
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script type="text/javascript" src="slick/slick.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function(){
      $('.single').slick({

        infinite: true,
        adaptiveHeight: true,
        arrows: true,
        dots: true,
        autoplay:true,
        autoplaySpeed: 8000,

        slidesToShow: 1,
        slidesToScroll: 1


      });
    });
  </script>


</body>

</html>
