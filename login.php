<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>VG Fantasy</title>
    <script src="jquery-3.1.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="team_summary.css">
    <script src="hero_select.js" charset="utf-8"></script>
</head>
<script>
const messages = ['Enemy Hero Killed', 'Ally Hero Killed', 'The Kraken has Awakened', 'Enemy team collected from Gold Mine', 'Enemy is Impressive', 'You are a Nightmare', 'Triple Kill', 'Double Kill', 'Allied Turret Destroyed', 'Enemy Turret Destroyed', 'Kraken Unleashed', 'Gold Mine is Almost Full'];

function toasta() {
    var num = Math.floor((Math.random() * 11) + 1);
    Materialize.toast(messages[num], 4000);
}
</script>
<?php
session_start();
//error_reporting(E_ERROR);
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
// Create connection
$con = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql="SELECT * FROM teams";
$sql2=mysqli_query($con,$sql);
$done=0;
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
$U=$_SESSION['user'];
if(isset($_POST["captain-item1-php"]))
{
  $U=$_SESSION['user'];
        $H1=$_SESSION["H1"];
              $H2=$_SESSION["H2"];
                    $H3=$_SESSION["H3"];
                   // echo $H1.$H2.$H3;
                    $H1I1=$_POST["captain-item1-php"];
                    $H1I2=$_POST["captain-item2-php"];
                    $H1I3=$_POST["captain-item3-php"];
                    $H1I4=$_POST["captain-item4-php"];
                    $H1I5=$_POST["captain-item5-php"];
                    $H1I6=$_POST["captain-item6-php"];
                    $H2I1=$_POST["carry-item1-php"];
                      $H2I2=$_POST["carry-item2-php"];
                      $H2I3=$_POST["carry-item3-php"];
                      $H2I4=$_POST["carry-item4-php"];
                      $H2I5=$_POST["carry-item5-php"];
                      $H2I6=$_POST["carry-item6-php"];
  $H3I1=$_POST["jungler-item1-php"];
  $H3I2=$_POST["jungler-item2-php"];
  $H3I3=$_POST["jungler-item3-php"];
  $H3I4=$_POST["jungler-item4-php"];
  $H3I5=$_POST["jungler-item5-php"];
  $H3I6=$_POST["jungler-item6-php"];
$sql="SELECT * FROM teams";
$sql2=mysqli_query($con,$sql);
while($row=mysqli_fetch_assoc($sql2))
{
  if($row["USERNAME"]==$_SESSION["user"])
  {
    $ID=$row["ID"];
    $sql="DELETE FROM teams where USERNAME='$U'";
  $sql2=mysqli_query($con,$sql);
//echo "DONE";
    $done=1;
  }

}
  $sql="INSERT INTO teams(ID,USERNAME,CAPTAIN,JUNGLER,CARRY,J1,J2,J3,J4,J5,J6,CAP1,CAP2,CAP3,CAP4,CAP5,CAP6,C1,C2,C3,C4,C5,C6) values('$ID','$U','$H1','$H3','$H2','$H3I1','$H3I2','$H3I3','$H3I4','$H3I5','$H3I6','$H1I1','$H1I2','$H1I3','$H1I4','$H1I5','$H1I6','$H2I1','$H2I2','$H2I3','$H2I4','$H2I5','$H2I6');";
$sql2=mysqli_query($con,$sql);
}

$sql="SELECT * FROM teams";
$sql2=mysqli_query($con,$sql);
$done=0;
  $U=$_SESSION['user'];
while($row=mysqli_fetch_assoc($sql2))
{
  if($row["USERNAME"]==$_SESSION["user"])
  {

      $H1=$row["CAPTAIN"];
            $H2=$row["CARRY"];
                  $H3=$row["JUNGLER"];
$H1I1=$row["CAP1"];
$H1I2=$row["CAP2"];
$H1I3=$row["CAP3"];
$H1I4=$row["CAP4"];
$H1I5=$row["CAP5"];
$H1I6=$row["CAP6"];
$H2I1=$row["C1"];
$H2I2=$row["C2"];
$H2I3=$row["C3"];
$H2I4=$row["C4"];
$H2I5=$row["C5"];
$H2I6=$row["C6"];
$H3I1=$row["J1"];
$H3I2=$row["J2"];
$H3I3=$row["J3"];
$H3I4=$row["J4"];
$H3I5=$row["J5"];
$H3I6=$row["J6"];
  }
}

?>
<body>

      <ul id="slide-out" class="side-nav amber lighten-1">
          <li>
              <div class="userView">
                  <div class="background">
                      <img class="responsive-img" src="Images/sq.jpeg">
                  </div>
         
                  <a href="#!name"><span class="white-text name"><?php echo $_SESSION["user"]?></span></a>
                  
              </div>
          </li>
          <li><a class="waves-effect" href="">Total Battels: <span><?php echo $played;?></span></a></li>
          <li><a class="waves-effect" href="">Wins: <span><?php echo $wins;?></span></a></li>
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
        <div class="row captain-div">
            <div class="col m3 s6">
                <img src="Images/VGPics/VG Hero Portraits/<?php echo $H1;?>.png" alt="Hero" class="circle responsive-img captain-img" data-key="adagio">
            </div>
            <div class="col m3 s6">
                <h5>Captain</h5>
                <h3><?php echo ucfirst($H1);?></h3>
            </div>
        </div>
        <div class="row">
            <div class="col m2 s2">
                <img src="Images/VGPics/VG Items/<?php echo $H1I1;?>.png" alt="Item" class="circle responsive-img tooltipped" data-position="top"
                    data-delay="50" data-tooltip="<?php echo $H1I1;?>">
            </div>
            <div class="col m2 s2">
                <img src="Images/VGPics/VG Items/<?php echo $H1I2;?>.png" alt="Item" class="circle responsive-img tooltipped" data-position="top"
                    data-delay="50" data-tooltip="<?php echo $H1I2;?>">
            </div>
            <div class="col m2 s2">
                <img src="Images/VGPics/VG Items/<?php echo $H1I3;?>.png" alt="Item" class="circle responsive-img tooltipped" data-position="top"
                    data-delay="50" data-tooltip="<?php echo $H1I3;?>">
            </div>
            <div class="col m2 s2">
                <img src="Images/VGPics/VG Items/<?php echo $H1I4;?>.png" alt="Item" class="circle responsive-img tooltipped" data-position="top"
                    data-delay="50" data-tooltip="<?php echo $H1I4;?>">
            </div>
            <div class="col m2 s2">
                <img src="Images/VGPics/VG Items/<?php echo $H1I5;?>.png" alt="Item" class="circle responsive-img tooltipped" data-position="top"
                    data-delay="50" data-tooltip="<?php echo $H1I5;?>">
            </div>
            <div class="col m2 s2">
                <img src="Images/VGPics/VG Items/<?php echo $H1I6;?>.png" alt="Item" class="circle responsive-img tooltipped" data-position="top"
                    data-delay="50" data-tooltip="<?php echo $H1I6;?>">
            </div>
        </div>
        <div class="row captain-div">
            <div class="col m3 s6">
                <img src="Images/VGPics/VG Hero Portraits/<?php echo $H2;?>.png" alt="Hero" class="circle responsive-img captain-img" data-key="adagio">
            </div>
            <div class="col m3 s6">
                <h5>Carry</h5>
                <h3><?php echo ucfirst($H2);?></h3>
            </div>
        </div>
        <div class="row">
            <div class="col m2 s2">
                <img src="Images/VGPics/VG Items/<?php echo $H2I1;?>.png" alt="Item" class="circle responsive-img tooltipped" data-position="top"
                    data-delay="50" data-tooltip="<?php echo $H2I1;?>">
            </div>
            <div class="col m2 s2">
                <img src="Images/VGPics/VG Items/<?php echo $H2I2;?>.png" alt="Item" class="circle responsive-img tooltipped" data-position="top"
                    data-delay="50" data-tooltip="<?php echo $H2I2;?>">
            </div>
            <div class="col m2 s2">
                <img src="Images/VGPics/VG Items/<?php echo $H2I3;?>.png" alt="Item" class="circle responsive-img tooltipped" data-position="top"
                    data-delay="50" data-tooltip="<?php echo $H2I3;?>">
            </div>
            <div class="col m2 s2">
                <img src="Images/VGPics/VG Items/<?php echo $H2I4;?>.png" alt="Item" class="circle responsive-img tooltipped" data-position="top"
                    data-delay="50" data-tooltip="<?php echo $H2I4;?>">
            </div>
            <div class="col m2 s2">
                <img src="Images/VGPics/VG Items/<?php echo $H2I5;?>.png" alt="Item" class="circle responsive-img tooltipped" data-position="top"
                    data-delay="50" data-tooltip="<?php echo $H2I5;?>">
            </div>
            <div class="col m2 s2">
                <img src="Images/VGPics/VG Items/<?php echo $H2I6;?>.png" alt="Item" class="circle responsive-img tooltipped" data-position="top"
                    data-delay="50" data-tooltip="<?php echo $H2I6;?>">
            </div>
        </div>
        <div class="row captain-div">
            <div class="col m3 s6">
                <img src="Images/VGPics/VG Hero Portraits/<?php echo $H3;?>.png" alt="Hero" class="circle responsive-img captain-img" data-key="adagio">
            </div>
            <div class="col m3 s6">
                <h5>Jungler</h5>
                <h3><?php echo ucfirst($H3);?></h3>
            </div>
        </div>
        <div class="row">
            <div class="col m2 s2">
                <img src="Images/VGPics/VG Items/<?php echo $H3I1;?>.png" alt="Item" class="circle responsive-img tooltipped" data-position="top"
                    data-delay="50" data-tooltip="<?php echo $H3I1;?>">
            </div>
            <div class="col m2 s2">
                <img src="Images/VGPics/VG Items/<?php echo $H3I2;?>.png" alt="Item" class="circle responsive-img tooltipped" data-position="top"
                    data-delay="50" data-tooltip="<?php echo $H3I2;?>">
            </div>
            <div class="col m2 s2">
                <img src="Images/VGPics/VG Items/<?php echo $H3I3;?>.png" alt="Item" class="circle responsive-img tooltipped" data-position="top"
                    data-delay="50" data-tooltip="<?php echo $H3I3;?>">
            </div>
            <div class="col m2 s2">
                <img src="Images/VGPics/VG Items/<?php echo $H3I4;?>.png" alt="Item" class="circle responsive-img tooltipped" data-position="top"
                    data-delay="50" data-tooltip="<?php echo $H3I4;?>">
            </div>
            <div class="col m2 s2">
                <img src="Images/VGPics/VG Items/<?php echo $H3I5;?>.png" alt="Item" class="circle responsive-img tooltipped" data-position="top"
                    data-delay="50" data-tooltip="<?php echo $H3I5;?>">
            </div>
            <div class="col m2 s2">
                <img src="Images/VGPics/VG Items/<?php echo $H3I6;?>.png" alt="Item" class="circle responsive-img tooltipped" data-position="top"
                    data-delay="50" data-tooltip="<?php echo $H3I6;?>">
            </div>
        </div>
    </div>
    <div class="center-align proceed-btn">
        <a href="hero_select.php" class="waves-effect waves-light btn-large amber-text black">Recreate Team</a>
    </div>
</body>

</html>
