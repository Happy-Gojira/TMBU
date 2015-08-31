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
  {     $username = 'Jackson Buffalo';
        $password = 'rochester';
       $ch = curl_init($url); // initialize curl with given url
       curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"]); // set  useragent
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // write the response to a variable
       curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // follow redirects if any
       curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
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
          <li><a href="http://themoneyballunion.com/game/lgfile/tmbu.tar.gz">League File</a></li>
          <li><a href="http://themoneyballunion.com/game/StatsLab/login.php">StatsLab</a></li>
          <li><a href="http://themoneyballunion.com/game/lgreports/">Reports</a></li>
          <li><a href="http://themoneyballunion.com/game/lgreports/history/index.html">History</a></li>
          <li><a href="http://themoneyballunion.com/game/exporttracker4/">Export Tracker</a></li>
          <li><a href="http://themoneyballunion.com/game/lgreports/online_league_status.html">Export Status</a></li>
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
          $html = getHTML('http://themoneyballunion.com/game/StatsLab/widget.php?show=standings&division=2&sub_league=1', 10);
          echo $html;
        ?>
      </div>
      <div>
        <?php 
          $html = getHTML('http://themoneyballunion.com/game/StatsLab/widget.php?show=standings&division=1&sub_league=1', 10);
          echo $html;
        ?>
      </div>
      <div>
        <?php 
          $html = getHTML('http://themoneyballunion.com/game/StatsLab/widget.php?show=standings&division=0&sub_league=1', 10);
          echo $html;
        ?>
      </div>
      <h3>SL</h3>
      <div>
        <?php 
          $html = getHTML('http://themoneyballunion.com/game/StatsLab/widget.php?show=standings&division=2&sub_league=0', 10);
          echo $html;
        ?>
      </div>
      <div>
        <?php 
          $html = getHTML('http://themoneyballunion.com/game/StatsLab/widget.php?show=standings&division=1&sub_league=0', 10);
          echo $html;
        ?>
      </div>
      <div>
        <?php 
          $html = getHTML('http://themoneyballunion.com/game/StatsLab/widget.php?show=standings&division=0&sub_league=0', 10);
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
              $html = getHTML('http://themoneyballunion.com/game/StatsLab//widget.php?show=potw&league_id=100&sub_league=0', 10);
              $html = utf8_encode($html);
              echo $html;
            ?>
          <h3>HL Player of the Week</h3>
            <?php
              $html = getHTML('http://themoneyballunion.com/game/StatsLab//widget.php?show=potw&league_id=100&sub_league=1', 10);
              $html = utf8_encode($html);
              echo $html;
            ?>    
        </div>
        <div class='panel'>
          <h3>WAR leaders</h3>
            <?php
              $html = getHTML('http://themoneyballunion.com/game/StatsLab//widget.php?stat=war&topX=10', 10);
              $html = utf8_encode($html);
              echo $html;
              
            ?>
            <h3>pWAR leaders</h3>
            <?php
              $html = getHTML('http://themoneyballunion.com/game/StatsLab//widget.php?stat=pwar&topX=10', 10);
              $html = utf8_encode($html);
              echo $html;
              
            ?>
        </div>
        <div class='panel'>
          <h3>HR leaders</h3>
          <?php
            $html = getHTML('http://themoneyballunion.com/game/StatsLab//widget.php?stat=hr&topX=10', 10);
            $html = utf8_encode($html);
            echo $html;
            
          ?>
          <h3>Hit leaders</h3>
          <?php
            $html = getHTML('http://themoneyballunion.com/game/StatsLab//widget.php?stat=h&topX=10', 10);
            $html = utf8_encode($html);
            echo $html;
            
          ?>
        </div>
        <div class='panel'>
          <h3>K leaders</h3>
          <?php
            $html = getHTML('http://themoneyballunion.com/game/StatsLab//widget.php?stat=pk&topX=10', 10);
            $html = utf8_encode($html);
            echo $html;
            
          ?>
          <h3>QS leaders</h3>
          <?php
            $html = getHTML('http://themoneyballunion.com/game/StatsLab//widget.php?stat=qs&topX=10', 10);
            $html = utf8_encode($html);
            echo $html;
            
          ?>
        </div>
      </div>    
    </aside>
    <div class="news">
      <h2>Breaking News</h2>
      <div class="articles">
      <?php 
        include('simple_html_dom.php');
        //set up curl
        $ch = curl_init("http://www.themoneyballunion.com/game/lgreports//leagues/league_100_home.html");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $curl_html = curl_exec($ch); //use curl to get data from example.com
        $curl_html = utf8_encode($curl_html);

        //use simplehtmldom to parse the site into a dom-like object
        $html = str_get_html($curl_html);

        //grab only articles
        $articles = $html->find("table[class=databg]");


        //reformat links
        $urlAdd = "http://www.themoneyballunion.com/game/lgreports/";
        $stringToRemove = "..";
        $re = "/(\.){2}/"; 
        $articles = preg_replace($re, $urlAdd, $articles);


        echo $articles[0];
        echo $articles[1];
        echo $articles[2];
       ?>
      
        
      </div>
      
    </div>
    <section class="SOTD">
      <?php 
        
        $username = 'Jackson Buffalo';
        $password = 'rochester';
        $loginUrl = 'http://themoneyballunion.com/game/StatsLab/login.php';
         
        //init curl
        $ch = curl_init();
         
        //Set the URL to work with
        curl_setopt($ch, CURLOPT_URL, $loginUrl);
         
        // ENABLE HTTP POST
        curl_setopt($ch, CURLOPT_POST, 1);
         
        //Set the post parameters
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'user='.$username.'&pass='.$password);
         
        //Handle cookies for the login
        curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
         
        //Setting CURLOPT_RETURNTRANSFER variable to 1 will force cURL
        //not to print out the results of its query.
        //Instead, it will return the results as a string return value
        //from curl_exec() instead of the usual true/false.
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
         
        //execute the request (the login)
        $store = curl_exec($ch);
         
        //the login is now done and you can continue to get the
        //protected content.
         
        //set the URL to the protected file
        curl_setopt($ch, CURLOPT_URL, 'http://themoneyballunion.com/game/StatsLab/statOfTheDay.php');
         
        //execute the request
        $content = curl_exec($ch);
        echo $content;
       ?>
    </section>
    
    <footer>
      <ul>
        <li>&copy; TMBU 2015</li>
        <li><a href="http://www.ootpdevelopments.com/board">OOTP Boards</a></li>
        <li>OOTP 16</li>
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





