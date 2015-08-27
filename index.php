<head>
   <meta charset="UTF-8"> 
  <title>TMBU</title>
  <link rel="stylesheet" href="css/tmbu.css">
  <link href='http://fonts.googleapis.com/css?family=PT+Serif' rel='stylesheet' type='text/css'>
 
  


</head>
<body>
  <div id="wrap">
    <header>
      <h1>The MoneyBall Union</h1>
      <div>
        <a href="#"><img src="img/1_tmbu_site_banner.jpg" alt="TMBU Logo"></a>
      </div>
      <nav>
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="#">Gm Directory</a></li>
          <li><a href="#">News</a></li>
          <li><a href="#">League Reports</a></li>
          <li><a href="http://themoneyballunion.com/game/StatsLab/login.php">StatsLab</a></li>
          <li><a href="#">League File</a></li>
          <li><a href="http://tmbu.invisionzone.com/">Forum</a></li>
          <li><a href="http://themoneyballunion.com/game/exporttracker4/">Export Tracker</a></li>
          <li><a href="http://themoneyballunion.com/game/lgreports/online_league_status.html">Export Status</a></li>
        </ul>
      </nav>
    </header>
    <div class="news">
      <h2>Breaking News</h2>
      <div class="articles">
      <?php 
        include('simple_html_dom.php');
        //set up curl
        $ch = curl_init("http://www.themoneyballunion.com/game/lgreports//leagues/league_100_home.html");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $curl_html = curl_exec($ch); //use curl to get data from example.com

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
    <aside class="stats">
      <h2>Standings</h2>
      <div>
        <?php 
          echo file_get_contents('http://themoneyballunion.com/game/StatsLab/widget.php?show=standings&division=2&sub_league=1');
        ?>
      </div>
      <h2>League Leaders</h2>
      <div>
        <?php
      
        echo file_get_contents('http://themoneyballunion.com/game/StatsLab//widget.php?stat=ops&topX=10');
      ?>
      </div>
      

    </aside>
    
  </div>


</body>