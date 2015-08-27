<html>
<head>   
  <meta charset="windows-1252"> 
  <title>TMBU</title>
  <link rel="stylesheet" href="css/tmbu.css">
  
  <link href='http://fonts.googleapis.com/css?family=PT+Serif|Playfair+Display&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
  <script src='jquery/jquery-2.1.4.js'></script>
 
  


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
      <div>
        <a href="#"><img src="img/1_tmbu_site_banner.jpg" alt="TMBU Logo"></a>
      </div>
      <nav>
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="http://themoneyballunion.com/game/StatsLab/managers.php">Gm Directory</a></li>
          <li><a href="#">News</a></li>
          <li><a href="http://themoneyballunion.com/game/lgreports/">League Reports</a></li>
          <li><a href="http://themoneyballunion.com/game/StatsLab/login.php">StatsLab</a></li>
          <li><a href="http://themoneyballunion.com/game/lgfile/tmbu.tar.gz">League File</a></li>
          <li><a href="http://tmbu.invisionzone.com/">Forum</a></li>
          <li><a href="http://themoneyballunion.com/game/exporttracker4/">Export Tracker</a></li>
          <li><a href="http://themoneyballunion.com/game/lgreports/online_league_status.html">Export Status</a></li>
        </ul>
      </nav>
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
    <aside class="stats tab-panels">
      <h2>League Leaders</h2>
      <ul class="tabs">
        <li rel="panel1">POW</li>
        <li rel="panel2">WAR</li>
        <li rel="panel3">Batter</li>
      </ul>
      
      <div id='panel1' class="panel active">
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
      <div id='panel2' class="panel">
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
      <div id='panel3' class="panel">
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
    
    <footer>
      <ul>
        <li>&copy; TMBU 2015</li>
        <li><a href="http://www.ootpdevelopments.com/board">OOTP Boards</a></li>
        <li>OOTP 16</li>
      </ul>
    </footer>
    
  </div>


</body>
<script>
  $(document).ready(function(){
       $('.tab-panels .tabs li').on('click', function(){

        //figure out which panel to show
        var panelToShow = $(this).attr('rel');
        

        //hide current panel
        $('.tab-panels .panel.active').hide(300, function(){
          $(this).removeClass('active');
          $('#'+ panelToShow).show(300, function(){
            $(this).addClass('active');
          });
        });

       }); 
  });
</script>
</html>





