<!DOCTYPE html>
<html>
<?php
session_start();
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$servername = "localhost";
$username = "id935168_vg";
$password = "VG12345";
$database = "id935168_vg";
// Create connection
$con = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
$err=$s="";
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
<head>
    <meta charset="utf-8">
    <title>VG Fantasy</title>
    <script src="jquery-3.1.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="welcome.css">
</head>

<body>
<script>
const messages = ['Enemy Hero Killed', 'Ally Hero Killed', 'The Kraken has Awakned', 'Enemy team collected from Gold Mine', 'Enemy is Impressive', 'You are a Nightmare', 'Triple Kill', 'Double Kill', 'Allied Turret Destroyed', 'Enemy Turret Destroyed', 'Kraken Unleashed', 'Gold Mine is Almost Full'];

function toasta() {
    var num = Math.floor((Math.random() * 11) + 1);
    Materialize.toast(messages[num], 4000);
}
</script>
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


    <div class="container">
        <div class="row">
            <div class="col s12 m8 white-text">
                <h5>
                    Welcome to VGFanstasy! Here's a simple guide for you:
                </h5>
                <br>
                <ul class="collapsible popout" data-collapsible="accordion">
                    <li>
                        <div class="collapsible-header transparent white-text">
                            1. Create a Team
                        </div>
                        <div class="collapsible-body transparent white-text">
                            <span>
                                First, crerate your team. Select the heroes you like. Then customize them individual with tier three items. No restreictions! All hero and items are available. From your dream team. Team creation option can be found in the menu.
                            </span>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header transparent white-text">
                            2. Head to Battle
                        </div>
                        <div class="collapsible-body transparent white-text">
                            <span>
                                Now that you have created your team, its time to head out to battle other players. Just click on the Battle button and you will be matched with an opponent. May the force be with you!
                            </span>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header transparent white-text">
                            3. Edit your Team
                        </div>
                        <div class="collapsible-body">
                            <span>
                                Want to experiment with something new? Bored with your current team composition? No sweat! You can recreate your entire team form the team menu. Try as many combination as possible. Hope you have fun!
                            </span>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header transparent white-text">
                            4. How are winners decided?
                        </div>
                        <div class="collapsible-body">
                            <span>
                                We collect from matched played all over the world. Using this data we decide the kills, assists and deaths of every hero on you team with respect with the enemy heroes. Same is done for the enemy team. The outcome depends on the hero builds. The team with the better kill, assists and death score wins.
                            </span>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col m4 s12 center-align proceed-btn">
                <div class="row">
                    <a href="team_summary.php" class="waves-effect waves-light btn-large amber-text black">Team</a>
                </div>
                <div class="row">
                    <a href="results.php" class="waves-effect waves-light btn-large amber-text black" onclick="Materialize.toast('Match Found', 4000); setInterval(toasta, 1000);">Battle</a>
                </div>
            </div>
        </div>
    </div>
<div class="container red-text">
    Since we are currently operate of limited bandwidth, please reload the page when you see SQL or PHP errors. Sorry for the inconvinence.
</div>
    <br><br><br>
    <div class="container white-text">
        <h5>Total Matches: <span><?php echo $played;?></span></h5>
        <h5>Wins: <span><?php echo $wins;?></span></h5>
    </div>
<?php
}
else {
header("Location: login.php");
}
 ?>
    <script>
        $(document).ready(function () {
            $('.button-collapse').sideNav();
            $('.tooltipped').tooltip({
                delay: 50
            });
        });
    </script>
</body>

</html>