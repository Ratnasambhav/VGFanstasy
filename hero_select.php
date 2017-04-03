<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
  <title>VG Fantasy</title>
  <script src="jquery-3.1.1.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="hero_select.css">
  <script src="hero_select.js" charset="utf-8"></script>
</head>

<body>
<script>
const messages = ['Enemy Hero Killed', 'Ally Hero Killed', 'The Kraken has Awakened', 'Enemy team collected from Gold Mine', 'Enemy is Impressive', 'You are a Nightmare', 'Triple Kill', 'Double Kill', 'Allied Turret Destroyed', 'Enemy Turret Destroyed', 'Kraken Unleashed', 'Gold Mine is Almost Full'];

function toasta() {
    var num = Math.floor((Math.random() * 11) + 1);
    Materialize.toast(messages[num], 4000);
}
</script>
<?php
session_start();
// Create connection
$con = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
if(isset($_SESSION["user"]))
{
$sql="SELECT * FROM users";
$sql2=mysqli_query($con,$sql);
while($row=mysqli_fetch_assoc($sql2))
{
  if($row["USERNAME"]==$_SESSION["user"])
  {
    $wins=$row["WIN"];
    $played=$row["PLAYED"];
    $email=$row["EMAIL"];
  }
}
?>
  <ul id="slide-out" class="side-nav amber lighten-1">
      <li>
          <div class="userView">
              <div class="background">
                  <img class="responsive-img" src="Images/sq.jpeg">
              </div>
              <a href="#!name"><span class="white-text name"><?php echo $_SESSION["user"]?></span></a>
          </div>
      </li>
      <li><a class="waves-effect" href="#!">Total Battels: <span><?php echo $played;?></span></a></li>
      <li><a class="waves-effect" href="#!">Wins: <span><?php echo $wins;?></span></a></li>
      <li><a class="waves-effect" href="welcome.php"><i class="material-icons">home</i>Home</a></li>
      <li><a href="team_summary.php"><i class="material-icons">change_history</i>Team</a></li>
      <li><a class="waves-effect" href="results.php" onclick="Materialize.toast('Match Found', 4000); setInterval(toasta, 1000);"><i class="material-icons">blur_on</i>Battle</a></li>
      <li><a class="waves-effect" href="aboutus.php"><i class="material-icons">supervisor_account</i>About Us</a></li>
      <li><a class="waves-effect" href="logout.php"><i class="material-icons">exit_to_app</i>Logout</a></li>
  </ul>


  <header class="valign-wrapper">
    <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons medium valign">menu</i></a>
    <p class="valign">VG Fantasy</p>
  </header>

  <div class="selected_hero">
    <h5 class="center-align">Select Heroes:</h5>
    <br>
    <div class="row">
      <div class="col s12 m4 center-align">
        <div class="col s12">
          <img src="Images/VGPics/VG Icons/captain.png" alt="Captain" class="role tooltipped" data-position="bottom" data-delay="50"
            data-tooltip="Captain">
        </div>
        <div class="col s12">
          <img src="Images/VGPics/VG Hero Portraits/adagio.png" alt="Hero" class="circle responsive-img captain-img" data-key="adagio">
        </div>
        <div class="col s12 captain-name">
          <h5>Adagio</h5>
        </div>
      </div>
      <div class="col s12 m4 center-align">
        <div class="col s12">
          <img src="Images/VGPics/VG Icons/carry.png" alt="Carry" class="role tooltipped" data-position="bottom" data-delay="50" data-tooltip="Carry">
        </div>
        <div class="col s12">
          <img src="Images/VGPics/VG Hero Portraits/gwen.png" alt="Hero" class="circle responsive-img carry-img" data-key="gwen">
        </div>
        <div class="col s12 carry-name">
          <h5>Gwen</h5>
        </div>
      </div>
      <div class="col s12 m4 center-align">
        <div class="col s12">
          <img src="Images/VGPics/VG Icons/jungler.png" alt="Jungler" class="role tooltipped" data-position="bottom" data-delay="50"
            data-tooltip="Jungler">
        </div>
        <div class="col s12">
          <img src="Images/VGPics/VG Hero Portraits/alpha.png" alt="Hero" class="circle responsive-img jungler-img" data-key="alpha">
        </div>
        <div class="col s12 jungler-name">
          <h5>Alpha</h5>
        </div>
      </div>
    </div>
  </div>

  <div class="hero-list container center-align">
    <hr>
    <div class="row">
      <div class="col m2 s6">
        <a class="dropdown-button" href="#" data-activates="dropdown1" data-key="agadio"><img src="Images/VGPics/VG Hero Portraits/adagio.png" alt="Hero" class="circle responsive-img tooltipped" data-position="top"
            data-delay="50" data-tooltip="Adagio"></a>

        <ul id="dropdown1" class="dropdown-content black">
          <li><a href="#!" onclick="captain('adagio')">Captain</a></li>
          <li><a href="#!" onclick="carry('adagio')">Carry</a></li>
          <li><a href="#!" onclick="jungler('adagio')">Jungler</a></li>
        </ul>
      </div>
      <div class="col m2 s6">
        <a class="dropdown-button" href="#" data-activates="dropdown2" data-key="alpha"><img src="Images/VGPics/VG Hero Portraits/alpha.png" alt="Hero" class="circle responsive-img tooltipped" data-position="top"
            data-delay="50" data-tooltip="Alpha"></a>

        <ul id="dropdown2" class="dropdown-content black">
          <li><a href="#!" onclick="captain('alpha')">Captain</a></li>
          <li><a href="#!" onclick="carry('alpha')">Carry</a></li>
          <li><a href="#!" onclick="jungler('alpha')">Jungler</a></li>
        </ul>
      </div>
      <div class="col m2 s6">
        <a class="dropdown-button" href="#" data-activates="dropdown3" data-key="ardan"><img src="Images/VGPics/VG Hero Portraits/ardan.png" alt="Hero" class="circle responsive-img tooltipped" data-position="top"
            data-delay="50" data-tooltip="Ardan"></a>

        <ul id="dropdown3" class="dropdown-content black">
          <li><a href="#!" onclick="captain('ardan')">Captain</a></li>
          <li><a href="#!" onclick="carry('ardan')">Carry</a></li>
          <li><a href="#!" onclick="jungler('ardan')">Jungler</a></li>
        </ul>
      </div>
      <div class="col m2 s6">
        <a class="dropdown-button" href="#" data-activates="dropdown4" data-key="baron"><img src="Images/VGPics/VG Hero Portraits/baron.png" alt="Hero" class="circle responsive-img tooltipped" data-position="top"
            data-delay="50" data-tooltip="Baron"></a>

        <ul id="dropdown4" class="dropdown-content black">
          <li><a href="#!" onclick="captain('baron')">Captain</a></li>
          <li><a href="#!" onclick="carry('baron')">Carry</a></li>
          <li><a href="#!" onclick="jungler('baron')">Jungler</a></li>
        </ul>
      </div>
      <div class="col m2 s6">
        <a class="dropdown-button" href="#" data-activates="dropdown5" data-key="blackfeather"><img src="Images/VGPics/VG Hero Portraits/blackfeather.png" alt="Hero" class="circle responsive-img tooltipped" data-position="top"
            data-delay="50" data-tooltip="Blackfeather"></a>

        <ul id="dropdown5" class="dropdown-content black">
          <li><a href="#!" onclick="captain('blackfeather')">Captain</a></li>
          <li><a href="#!" onclick="carry('blackfeather')">Carry</a></li>
          <li><a href="#!" onclick="jungler('blackfeather')">Jungler</a></li>
        </ul>
      </div>
      <div class="col m2 s6">
        <a class="dropdown-button" href="#" data-activates="dropdown6" data-key="catherine"><img src="Images/VGPics/VG Hero Portraits/catherine.png" alt="Hero" class="circle responsive-img tooltipped" data-position="top"
            data-delay="50" data-tooltip="Catherine"></a>

        <ul id="dropdown6" class="dropdown-content black">
          <li><a href="#!" onclick="captain('catherine')">Captain</a></li>
          <li><a href="#!" onclick="carry('catherine')">Carry</a></li>
          <li><a href="#!" onclick="jungler('catherine')">Jungler</a></li>
        </ul>
      </div>
      <div class="col m2 s6">
        <a class="dropdown-button" href="#" data-activates="dropdown7" data-key="celeste"><img src="Images/VGPics/VG Hero Portraits/celeste.png" alt="Hero" class="circle responsive-img tooltipped" data-position="top"
            data-delay="50" data-tooltip="Celeste"></a>

        <ul id="dropdown7" class="dropdown-content black">
          <li><a href="#!" onclick="captain('celeste')">Captain</a></li>
          <li><a href="#!" onclick="carry('celeste')">Carry</a></li>
          <li><a href="#!" onclick="jungler('celeste')">Jungler</a></li>
        </ul>
      </div>
      <div class="col m2 s6">
        <a class="dropdown-button" href="#" data-activates="dropdown8" data-key="flicker"><img src="Images/VGPics/VG Hero Portraits/flicker.png" alt="Hero" class="circle responsive-img tooltipped" data-position="top"
            data-delay="50" data-tooltip="Flicker"></a>

        <ul id="dropdown8" class="dropdown-content black">
          <li><a href="#!" onclick="captain('flicker')">Captain</a></li>
          <li><a href="#!" onclick="carry('flicker')">Carry</a></li>
          <li><a href="#!" onclick="jungler('flicker')">Jungler</a></li>
        </ul>
      </div>
      <div class="col m2 s6">
        <a class="dropdown-button" href="#" data-activates="dropdown9" data-key="fortress"><img src="Images/VGPics/VG Hero Portraits/fortress.png" alt="Hero" class="circle responsive-img tooltipped" data-position="top"
            data-delay="50" data-tooltip="Fortress"></a>

        <ul id="dropdown9" class="dropdown-content black">
          <li><a href="#!" onclick="captain('fortress')">Captain</a></li>
          <li><a href="#!" onclick="carry('fortress')">Carry</a></li>
          <li><a href="#!" onclick="jungler('fortress')">Jungler</a></li>
        </ul>
      </div>
      <div class="col m2 s6">
        <a class="dropdown-button" href="#" data-activates="dropdown10" data-key="glaive"><img src="Images/VGPics/VG Hero Portraits/glaive.png" alt="Hero" class="circle responsive-img tooltipped" data-position="top"
            data-delay="50" data-tooltip="Glaive"></a>

        <ul id="dropdown10" class="dropdown-content black">
          <li><a href="#!" onclick="captain('glaive')">Captain</a></li>
          <li><a href="#!" onclick="carry('glaive')">Carry</a></li>
          <li><a href="#!" onclick="jungler('glaive')">Jungler</a></li>
        </ul>
      </div>
      <div class="col m2 s6">
        <a class="dropdown-button" href="#" data-activates="dropdown20" data-key="grumpjaw"><img src="Images/VGPics/VG Hero Portraits/grumpjaw.png" alt="Hero" class="circle responsive-img tooltipped" data-position="top"
            data-delay="50" data-tooltip="Grumpjaw"></a>

        <ul id="dropdown20" class="dropdown-content black">
          <li><a href="#!" onclick="captain('grumpjaw')">Captain</a></li>
          <li><a href="#!" onclick="carry('grumpjaw')">Carry</a></li>
          <li><a href="#!" onclick="jungler('grumpjaw')">Jungler</a></li>
        </ul>
      </div>
      <div class="col m2 s6">
        <a class="dropdown-button" href="#" data-activates="dropdown11" data-key="gwen"><img src="Images/VGPics/VG Hero Portraits/gwen.png" alt="Hero" class="circle responsive-img tooltipped" data-position="top"
            data-delay="50" data-tooltip="Gwen"></a>

        <ul id="dropdown11" class="dropdown-content black">
          <li><a href="#!" onclick="captain('gwen')">Captain</a></li>
          <li><a href="#!" onclick="carry('gwen')">Carry</a></li>
          <li><a href="#!" onclick="jungler('gwen')">Jungler</a></li>
        </ul>
      </div>
      <div class="col m2 s6">
        <a class="dropdown-button" href="#" data-activates="dropdown12" data-key="idris"><img src="Images/VGPics/VG Hero Portraits/idris.png" alt="Hero" class="circle responsive-img tooltipped" data-position="top"
            data-delay="50" data-tooltip="Idris"></a>

        <ul id="dropdown12" class="dropdown-content black">
          <li><a href="#!" onclick="captain('idris')">Captain</a></li>
          <li><a href="#!" onclick="carry('idris')">Carry</a></li>
          <li><a href="#!" onclick="jungler('idris')">Jungler</a></li>
        </ul>
      </div>
      <div class="col m2 s6">
        <a class="dropdown-button" href="#" data-activates="dropdown13" data-key="joule"><img src="Images/VGPics/VG Hero Portraits/joule.png" alt="Hero" class="circle responsive-img tooltipped" data-position="top"
            data-delay="50" data-tooltip="Joule"></a>

        <ul id="dropdown13" class="dropdown-content black">
          <li><a href="#!" onclick="captain('joule')">Captain</a></li>
          <li><a href="#!" onclick="carry('joule')">Carry</a></li>
          <li><a href="#!" onclick="jungler('joule')">Jungler</a></li>
        </ul>
      </div>
      <div class="col m2 s6">
        <a class="dropdown-button" href="#" data-activates="dropdown14" data-key="kestrel"><img src="Images/VGPics/VG Hero Portraits/kestrel.png" alt="Hero" class="circle responsive-img tooltipped" data-position="top"
            data-delay="50" data-tooltip="Kestrel"></a>

        <ul id="dropdown14" class="dropdown-content black">
          <li><a href="#!" onclick="captain('kestrel')">Captain</a></li>
          <li><a href="#!" onclick="carry('kestrel')">Carry</a></li>
          <li><a href="#!" onclick="jungler('kestrel')">Jungler</a></li>
        </ul>
      </div>
      <div class="col m2 s6">
        <a class="dropdown-button" href="#" data-activates="dropdown15" data-key="koshka"><img src="Images/VGPics/VG Hero Portraits/koshka.png" alt="Hero" class="circle responsive-img tooltipped" data-position="top"
            data-delay="50" data-tooltip="Koshka"></a>

        <ul id="dropdown15" class="dropdown-content black">
          <li><a href="#!" onclick="captain('koshka')">Captain</a></li>
          <li><a href="#!" onclick="carry('koshka')">Carry</a></li>
          <li><a href="#!" onclick="jungler('koshka')">Jungler</a></li>
        </ul>
      </div>
      <div class="col m2 s6">
        <a class="dropdown-button" href="#" data-activates="dropdown16" data-key="krul"><img src="Images/VGPics/VG Hero Portraits/krul.png" alt="Hero" class="circle responsive-img tooltipped" data-position="top"
            data-delay="50" data-tooltip="Krul"></a>

        <ul id="dropdown16" class="dropdown-content black">
          <li><a href="#!" onclick="captain('krul')">Captain</a></li>
          <li><a href="#!" onclick="carry('krul')">Carry</a></li>
          <li><a href="#!" onclick="jungler('krul')">Jungler</a></li>
        </ul>
      </div>
      <div class="col m2 s6">
        <a class="dropdown-button" href="#" data-activates="dropdown17" data-key="lance"><img src="Images/VGPics/VG Hero Portraits/lance.png" alt="Hero" class="circle responsive-img tooltipped" data-position="top"
            data-delay="50" data-tooltip="Lance"></a>

        <ul id="dropdown17" class="dropdown-content black">
          <li><a href="#!" onclick="captain('lance')">Captain</a></li>
          <li><a href="#!" onclick="carry('lance')">Carry</a></li>
          <li><a href="#!" onclick="jungler('lance')">Jungler</a></li>
        </ul>
      </div>
      <div class="col m2 s6">
        <a class="dropdown-button" href="#" data-activates="dropdown18" data-key="lyra"><img src="Images/VGPics/VG Hero Portraits/lyra.png" alt="Hero" class="circle responsive-img tooltipped" data-position="top"
            data-delay="50" data-tooltip="Lyra"></a>

        <ul id="dropdown18" class="dropdown-content black">
          <li><a href="#!" onclick="captain('lyra')">Captain</a></li>
          <li><a href="#!" onclick="carry('lyra')">Carry</a></li>
          <li><a href="#!" onclick="jungler('lyra')">Jungler</a></li>
        </ul>
      </div>
      <div class="col m2 s6">
        <a class="dropdown-button" href="#" data-activates="dropdown19" data-key="ozo"><img src="Images/VGPics/VG Hero Portraits/ozo.png" alt="Hero" class="circle responsive-img tooltipped" data-position="top"
            data-delay="50" data-tooltip="ozo"></a>

        <ul id="dropdown19" class="dropdown-content black">
          <li><a href="#!" onclick="captain('ozo')">Captain</a></li>
          <li><a href="#!" onclick="carry('ozo')">Carry</a></li>
          <li><a href="#!" onclick="jungler('ozo')">Jungler</a></li>
        </ul>
      </div>
      <div class="col m2 s6">
        <a class="dropdown-button" href="#" data-activates="dropdown21" data-key="petal"><img src="Images/VGPics/VG Hero Portraits/petal.png" alt="Hero" class="circle responsive-img tooltipped" data-position="top"
            data-delay="50" data-tooltip="Petal"></a>

        <ul id="dropdown21" class="dropdown-content black">
          <li><a href="#!" onclick="captain('petal')">Captain</a></li>
          <li><a href="#!" onclick="carry('petal')">Carry</a></li>
          <li><a href="#!" onclick="jungler('petal')">Jungler</a></li>
        </ul>
      </div>
      <div class="col m2 s6">
        <a class="dropdown-button" href="#" data-activates="dropdown22" data-key="phinn"><img src="Images/VGPics/VG Hero Portraits/phinn.png" alt="Hero" class="circle responsive-img tooltipped" data-position="top"
            data-delay="50" data-tooltip="Phinn"></a>

        <ul id="dropdown22" class="dropdown-content black">
          <li><a href="#!" onclick="captain('phinn')">Captain</a></li>
          <li><a href="#!" onclick="carry('phinn')">Carry</a></li>
          <li><a href="#!" onclick="jungler('phinn')">Jungler</a></li>
        </ul>
      </div>
      <div class="col m2 s6">
        <a class="dropdown-button" href="#" data-activates="dropdown23" data-key="reim"><img src="Images/VGPics/VG Hero Portraits/reim.png" alt="Hero" class="circle responsive-img tooltipped" data-position="top"
            data-delay="50" data-tooltip="Reim"></a>

        <ul id="dropdown23" class="dropdown-content black">
          <li><a href="#!" onclick="captain('reim')">Captain</a></li>
          <li><a href="#!" onclick="carry('reim')">Carry</a></li>
          <li><a href="#!" onclick="jungler('reim')">Jungler</a></li>
        </ul>
      </div>
      <div class="col m2 s6">
        <a class="dropdown-button" href="#" data-activates="dropdown24" data-key="ringo"><img src="Images/VGPics/VG Hero Portraits/ringo.png" alt="Hero" class="circle responsive-img tooltipped" data-position="top"
            data-delay="50" data-tooltip="Ringo"></a>

        <ul id="dropdown24" class="dropdown-content black">
          <li><a href="#!" onclick="captain('ringo')">Captain</a></li>
          <li><a href="#!" onclick="carry('ringo')">Carry</a></li>
          <li><a href="#!" onclick="jungler('ringo')">Jungler</a></li>
        </ul>
      </div>
      <div class="col m2 s6">
        <a class="dropdown-button" href="#" data-activates="dropdown25" data-key="rona"><img src="Images/VGPics/VG Hero Portraits/rona.png" alt="Hero" class="circle responsive-img tooltipped" data-position="top"
            data-delay="50" data-tooltip="Rona"></a>

        <ul id="dropdown25" class="dropdown-content black">
          <li><a href="#!" onclick="captain('rona')">Captain</a></li>
          <li><a href="#!" onclick="carry('rona')">Carry</a></li>
          <li><a href="#!" onclick="jungler('rona')">Jungler</a></li>
        </ul>
      </div>
      <div class="col m2 s6">
        <a class="dropdown-button" href="#" data-activates="dropdown26" data-key="samuel"><img src="Images/VGPics/VG Hero Portraits/samuel.png" alt="Hero" class="circle responsive-img tooltipped" data-position="top"
            data-delay="50" data-tooltip="Samuel"></a>

        <ul id="dropdown26" class="dropdown-content black">
          <li><a href="#!" onclick="captain('samuel')">Captain</a></li>
          <li><a href="#!" onclick="carry('samuel')">Carry</a></li>
          <li><a href="#!" onclick="jungler('samuel')">Jungler</a></li>
        </ul>
      </div>
      <div class="col m2 s6">
        <a class="dropdown-button" href="#" data-activates="dropdown27" data-key="saw"><img src="Images/VGPics/VG Hero Portraits/saw.png" alt="Hero" class="circle responsive-img tooltipped" data-position="top"
            data-delay="50" data-tooltip="Saw"></a>

        <ul id="dropdown27" class="dropdown-content black">
          <li><a href="#!" onclick="captain('saw')">Captain</a></li>
          <li><a href="#!" onclick="carry('saw')">Carry</a></li>
          <li><a href="#!" onclick="jungler('saw')">Jungler</a></li>
        </ul>
      </div>
      <div class="col m2 s6">
        <a class="dropdown-button" href="#" data-activates="dropdown28" data-key="skaarf"><img src="Images/VGPics/VG Hero Portraits/skaarf.png" alt="Hero" class="circle responsive-img tooltipped" data-position="top"
            data-delay="50" data-tooltip="Skaarf"></a>

        <ul id="dropdown28" class="dropdown-content black">
          <li><a href="#!" onclick="captain('skaarf')">Captain</a></li>
          <li><a href="#!" onclick="carry('skaarf')">Carry</a></li>
          <li><a href="#!" onclick="jungler('skaarf')">Jungler</a></li>
        </ul>
      </div>
      <div class="col m2 s6">
        <a class="dropdown-button" href="#" data-activates="dropdown29" data-key="skye"><img src="Images/VGPics/VG Hero Portraits/skye.png" alt="Hero" class="circle responsive-img tooltipped" data-position="top"
            data-delay="50" data-tooltip="Skye"></a>

        <ul id="dropdown29" class="dropdown-content black">
          <li><a href="#!" onclick="captain('skye')">Captain</a></li>
          <li><a href="#!" onclick="carry('skye')">Carry</a></li>
          <li><a href="#!" onclick="jungler('skye')">Jungler</a></li>
        </ul>
      </div>
      <div class="col m2 s6">
        <a class="dropdown-button" href="#" data-activates="dropdown30" data-key="taka"><img src="Images/VGPics/VG Hero Portraits/taka.png" alt="Hero" class="circle responsive-img tooltipped" data-position="top"
            data-delay="50" data-tooltip="Taka"></a>

        <ul id="dropdown30" class="dropdown-content black">
          <li><a href="#!" onclick="captain('taka')">Captain</a></li>
          <li><a href="#!" onclick="carry('taka')">Carry</a></li>
          <li><a href="#!" onclick="jungler('taka')">Jungler</a></li>
        </ul>
      </div>
      <div class="col m2 offset-m5 s6 offset-s3">
        <a class="dropdown-button" href="#" data-activates="dropdown31" data-key="vox"><img src="Images/VGPics/VG Hero Portraits/vox.png" alt="Hero" class="circle responsive-img tooltipped" data-position="top"
            data-delay="50" data-tooltip="Vox"></a>

        <ul id="dropdown31" class="dropdown-content black">
          <li><a href="#!" onclick="captain('vox')">Captain</a></li>
          <li><a href="#!" onclick="carry('vox')">Carry</a></li>
          <li><a href="#!" onclick="jungler('vox')">Jungler</a></li>
        </ul>
      </div>
    </div>
    <hr>
  </div>
  <?php
}
else {

  header("Location: login.php");
}


   ?>
  <form action="build_select.php" method="post">
  <div class="center-align proceed-btn">
    <div class="php-data">
    <p>
      <input type="hidden" name="cap-n" id="cap-n" value="adagio">
      <input type="hidden" name="car-n" id="car-n" value="gwen">
      <input type="hidden" name="jung-n" id="jung-n" value="skye">
    </p>
  </div>
    <button class="waves-effect waves-light btn-large amber-text black"><i class="material-icons right">navigate_next</i>Select Build</button>
  </div>
</form>
  <!--extract data from here-->

</body>

</html>
