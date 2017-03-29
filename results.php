<!DOCTYPE html>
  <html>

  <head>
      <meta charset="utf-8">
      <title>VG Fantasy</title>
      <script src="jquery-3.1.1.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>

      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

      <link rel="stylesheet" href="results.css">
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
  $err=$s="";
  if(isset($_SESSION["user"]))
  {
  $sql="SELECT * FROM teams";
  $sql2=mysqli_query($con,$sql);
  $T1=[];$TD1=[];
  while($row=mysqli_fetch_assoc($sql2))
  {
    if($row["USERNAME"]==$_SESSION["user"])
    {
      $TD1[$row["CAPTAIN"]]=array();
        $TD1[$row["CARRY"]]=array();
          $TD1[$row["JUNGLER"]]=array();
      $T1[$row["CAPTAIN"]]=[$row["CAP1"],$row["CAP2"],$row["CAP3"],$row["CAP4"],$row["CAP5"],$row["CAP6"]];
      $T1[$row["CARRY"]]=[$row["C1"],$row["C2"],$row["C3"],$row["C4"],$row["C5"],$row["C6"]];
      $T1[$row["JUNGLER"]]=[$row["J1"],$row["J2"],$row["J3"],$row["J4"],$row["J5"],$row["J6"]];
      array_push($TD1[$row["CAPTAIN"]],["Weapon"=>0],["Defense"=>0],["Crystal"=>0],["Utility"=>0],["Consumables"=>0]);
      array_push($TD1[$row["CARRY"]],["Weapon"=>0],["Defense"=>0],["Crystal"=>0],["Utility"=>0],["Consumables"=>0]);
      array_push($TD1[$row["JUNGLER"]],["Weapon"=>0],["Defense"=>0],["Crystal"=>0],["Utility"=>0],["Consumables"=>0]);

    }
  }
  $T2=[];$TD2=[];
  //
//print_r($T1);
  $sql="SELECT * FROM teams";
  $sql2=mysqli_query($con,$sql);
  //echo mysqli_num_rows($sql2);
  $c=rand(0,mysqli_num_rows($sql2)-1);
$P2="";
  $s=0;
  while($s==0)
  {
  while($row=mysqli_fetch_assoc($sql2))
  {
    if($row["USERNAME"]!=$_SESSION["user"] && $c==0)
    {
      $P2=$row["USERNAME"];
      $TD2[$row["CAPTAIN"]]=array();
        $TD2[$row["CARRY"]]=array();
          $TD2[$row["JUNGLER"]]=array();
      $T2[$row["CAPTAIN"]]=[$row["CAP1"],$row["CAP2"],$row["CAP3"],$row["CAP4"],$row["CAP5"],$row["CAP6"]];
      $T2[$row["CARRY"]]=[$row["C1"],$row["C2"],$row["C3"],$row["C4"],$row["C5"],$row["C6"]];
      $T2[$row["JUNGLER"]]=[$row["J1"],$row["J2"],$row["J3"],$row["J4"],$row["J5"],$row["J6"]];
      array_push($TD2[$row["CAPTAIN"]],["Weapon"=>0],["Defense"=>0],["Crystal"=>0],["Utility"=>0],["Consumables"=>0]);
      array_push($TD2[$row["CARRY"]],["Weapon"=>0],["Defense"=>0],["Crystal"=>0],["Utility"=>0],["Consumables"=>0]);
      array_push($TD2[$row["JUNGLER"]],["Weapon"=>0],["Defense"=>0],["Crystal"=>0],["Utility"=>0],["Consumables"=>0]);
      $s=1;
      break;
    }
    if($c==0)
    $c=rand(0,mysqli_num_rows($sql2)-1);
    $c=$c-1;
  }
  }
  $e=[];
  $result=mysqli_query($con,"SELECT * FROM item");
  while($row = mysqli_fetch_assoc($result)) {
          //echo "id: " . $row["ID"]. " - Name: " . $row["NAME"] . "<br>";
          $e[strtolower(str_replace(" ","",$row["NAME"]))]=$row["TYPE"];
      }
    //  print_r($e);
  foreach ($T2 as $key => $value) {
    foreach ($value as $key2 => $value2) {
      foreach ($TD2[$key] as $key3 => $value3) {
        foreach ($value3 as $key4 => $value4) {

      if($key4===$e[strtolower(str_replace("-","",$value2))])
      {$TD2[$key][$key3][$key4]=$value4+1;
      }
  }
    }
  }
  }//end ...
  foreach ($T1 as $key => $value) {
    foreach ($value as $key2 => $value2) {
      foreach ($TD1[$key] as $key3 => $value3) {
        foreach ($value3 as $key4 => $value4) {

      if($key4===$e[strtolower(str_replace("-","",$value2))])
      {$TD1[$key][$key3][$key4]=$value4+1;
        }
  }
    }
  }
  }
  $status="VICTORY";
  //end of outermost foreach
  /*MATCH*/
  $R2=[];
  $R1=[];
  foreach ($TD1 as $key => $value) {
    $R1[$key]=array("K"=>0,"D"=>0,"A"=>0);
  }foreach ($TD2 as $key => $value) {
    $R2[$key]=array("K"=>0,"D"=>0,"A"=>0);
  }
  //print_r($TD1);
  $e1=[];
  $result=mysqli_query($con,"SELECT * FROM hero");
  while($row = mysqli_fetch_assoc($result))
  {
      $e1[strtolower(str_replace("*","",$row["NAME"]))]=[$row["K"],$row["D"],$row["A"]];
  }
  foreach ($TD1 as $key => $value) {
    foreach ($TD2 as $key2 => $value2) {
     foreach ($value as $key3 => $value3) {
       foreach ($value3 as $key4 => $value4) {
         foreach ($value2 as $key23 => $value23) {
           foreach ($value23 as $key24 => $value24) {
             //key4 weapon
             $result3=mysqli_query($con,"SELECT * FROM data WHERE HERO1='$key' AND BUILD1='$key4' AND HERO2='$key2' AND BUILD2='$key24'");
             if(!$result3)
             echo mysqli_error($con);
             while($row3 = mysqli_fetch_assoc($result3)) {
             $R1[$key]["K"]=$R1[$key]["K"]+$value4*$row3["K"]*$e1[$key][0]/6;
             $R1[$key]["D"]=$R1[$key]["D"]+$value4*$row3["D"]*$e1[$key][1]/6;
             $R1[$key]["A"]=$R1[$key]["A"]+$value4*$row3["A"]*$e1[$key][2]/6;

           }
         }
       }
     }
    }
  }
  }
$temp1=$TD1;
$TD1=$TD2;
$TD2=$temp1;
  foreach ($TD1 as $key => $value) {
    foreach ($TD2 as $key2 => $value2) {
     foreach ($value as $key3 => $value3) {
       foreach ($value3 as $key4 => $value4) {
         foreach ($value2 as $key23 => $value23) {
           foreach ($value23 as $key24 => $value24) {
             //key4 weapon
             $result3=mysqli_query($con,"SELECT * FROM data WHERE HERO1='$key' AND BUILD1='$key4' AND HERO2='$key2' AND BUILD2='$key24'");
             if(!$result3)
             echo mysqli_error($con);
             while($row3 = mysqli_fetch_assoc($result3)) {
             $R2[$key]["K"]=$R2[$key]["K"]+$value4*$row3["K"]*$e1[$key][0]/6;
             $R2[$key]["D"]=$R2[$key]["D"]+$value4*$row3["D"]*$e1[$key][1]/6;
             $R2[$key]["A"]=$R2[$key]["A"]+$value4*$row3["A"]*$e1[$key][2]/6;

           }
         }
       }
     }
    }
  }
  }
$temp1=$TD1;
$TD1=$TD2;
$TD2=$temp1;
  //print_r($R1);
    //print_r($R2);
$O1=[];$O2=[];

foreach ($TD1 as $key => $value) {
  array_push($O1,$key);
}
foreach ($TD2 as $key => $value) {
  array_push($O2,$key);
}
//print_r($TD1);
$kSum1=round($R1[$O1[0]]["K"])+round($R1[$O1[1]]["K"])+round($R1[$O1[2]]["K"]);
$aSum1=round($R1[$O1[0]]["A"])+round($R1[$O1[1]]["A"])+round($R1[$O1[2]]["A"]);
$dSum1=round($R1[$O1[0]]["D"])+round($R1[$O1[1]]["D"])+round($R1[$O1[2]]["D"]);
$kSum2=round($R2[$O2[0]]["K"])+round($R2[$O2[1]]["K"])+round($R2[$O2[2]]["K"]);
$aSum2=round($R2[$O2[0]]["A"])+round($R2[$O2[1]]["A"])+round($R2[$O2[2]]["A"]);
$dSum2=round($R2[$O2[0]]["D"])+round($R2[$O2[1]]["D"])+round($R2[$O2[2]]["D"]);
if(2*($kSum1)+$aSum1-($dSum1)>2*($kSum2)+$aSum2-($dSum2))
$status="VICTORY";
else {
  $status="DEFEAT";
}
$u=$_SESSION["user"];
if($status=="VICTORY")
{   echo $P2;
  $result3=mysqli_query($con,"UPDATE users SET WIN=WIN+1 WHERE USERNAME='$u'");
    $result3=mysqli_query($con,"UPDATE users SET PLAYED=PLAYED+1 WHERE USERNAME='$u'");
    mysqli_error($con);
    $result3=mysqli_query($con,"UPDATE users SET PLAYED=PLAYED+1 WHERE USERNAME='$P2'");
}
else
{$result3=mysqli_query($con,"UPDATE users SET WIN=WIN+1 WHERE USERNAME='$P2'");
    $result3=mysqli_query($con,"UPDATE users SET PLAYED=PLAYED+1 WHERE USERNAME='$P2'");
    $result3=mysqli_query($con,"UPDATE users SET PLAYED=PLAYED+1 WHERE USERNAME='$u'");

}
if($kSum1!=0)
{
$R1[$O1[0]]["K"]=$R1[$O1[0]]["K"]*$dSum2/$kSum1;
$R1[$O1[1]]["K"]=$R1[$O1[1]]["K"]*$dSum2/$kSum1;
$R1[$O1[2]]["K"]=$dSum2-$R1[$O1[0]]["K"]-$R1[$O1[1]]["K"];
}
else
{$R1[$O1[0]]["K"]=$dSum2/3;
$R1[$O1[1]]["K"]=$dSum2/3;
$R1[$O1[2]]["K"]=$dSum2-$R1[$O1[0]]["K"]-$R1[$O1[1]]["K"];
}
$kSum2=round($R2[$O2[0]]["K"])+round($R2[$O2[1]]["K"])+round($R2[$O2[2]]["K"]);
if($kSum2!=0)
{
$R2[$O2[0]]["K"]=$R2[$O2[0]]["K"]*$dSum1/$kSum2;
$R2[$O2[1]]["K"]=$R2[$O2[1]]["K"]*$dSum1/$kSum2;
$R2[$O2[2]]["K"]=$dSum1-$R2[$O2[0]]["K"]-$R2[$O2[1]]["K"];
}
else
{$R2[$O2[0]]["K"]=$dSum1/3;
$R2[$O2[1]]["K"]=$dSum1/3;
$R2[$O2[2]]["K"]=$dSum1-$R2[$O2[0]]["K"]-$R2[$O2[1]]["K"];
}
  //print_r($TD2);
  //print_r($TD1);
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
  //print_r($TD2);
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

      <div class="container white-text">
          <div class="row">
              <div class="col s12 center-align">
                  <h5><?php echo $status;?></h5>
              </div>
          </div>
          <div class="row">
              <div class="col m6 s12">
                  <div class="row">
                      <div class="col s12 center-align">
                          <h5><?php echo $_SESSION["user"];?></h5>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col s4">
                          <img src="Images/VGPics/VG Hero Portraits/<?php echo $O1[0];?>.png" alt="Hero" class="circle responsive-img captain-img" data-key="adagio">
                      </div>
                      <div class="col s2">
                          Kills:<br><span><?php echo round($R1[$O1[0]]["K"]);?></span>
                      </div>
                      <div class="col s2">
                          Deaths:<br><span><?php echo round($R1[$O1[0]]["D"]);?></span>
                      </div>
                      <div class="col s2">
                          Assists:<br><span><?php echo round($R1[$O1[0]]["A"]);?></span>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col s4">
                          <img src="Images/VGPics/VG Hero Portraits/<?php echo $O1[1];?>.png" alt="Hero" class="circle responsive-img captain-img" data-key="adagio">
                      </div>
                      <div class="col s2">
                          Kills:<br><span><?php echo round($R1[$O1[1]]["K"]);?></span>
                      </div>
                      <div class="col s2">
                          Deaths:<br><span><?php echo round($R1[$O1[1]]["D"]);?></span>
                      </div>
                      <div class="col s2">
                          Assists:<br><span><?php echo round($R1[$O1[1]]["A"]);?></span>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col s4">
                          <img src="Images/VGPics/VG Hero Portraits/<?php echo $O1[2];?>.png" alt="Hero" class="circle responsive-img captain-img" data-key="adagio">
                      </div>
                      <div class="col s2">
                          Kills:<br><span><?php echo round($R1[$O1[2]]["K"]);?></span>
                      </div>
                      <div class="col s2">
                          Deaths:<br><span><?php echo round($R1[$O1[2]]["D"]);?></span>
                      </div>
                      <div class="col s2">
                          Assists:<br><span><?php echo round($R1[$O1[2]]["A"]);?></span>
                      </div>
                  </div>
              </div>
              <div class="col m6 s12">
                  <div class="row">
                      <div class="col s12 center-align">
                          <h5><?php echo $P2;?></h5>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col s2">
                          Assists:<br><span><?php echo round($R2[$O2[0]]["A"]);?></span>
                      </div>
                      <div class="col s2">
                          Deaths:<br><span><?php echo round($R2[$O2[0]]["D"]);?></span>
                      </div>
                      <div class="col s2">
                          Kills:<br><span><?php echo round($R2[$O2[0]]["K"]);?></span>
                      </div>
                      <div class="col s4">
                          <img src="Images/VGPics/VG Hero Portraits/<?php echo $O2[0];?>.png" alt="Hero" class="circle responsive-img captain-img" data-key="adagio">
                      </div>
                  </div>
                  <div class="row">
                      <div class="col s2">
                          Assists:<br><span><?php echo round($R2[$O2[1]]["A"]);?></span>
                  </div>
                  <div class="col s2">
                      Deaths:<br><span><?php echo round($R2[$O2[1]]["D"]);?></span>
                  </div>
                  <div class="col s2">
                      Kills:<br><span><?php echo round($R2[$O2[1]]["K"]);?></span>
                  </div>
                  <div class="col s4">
                      <img src="Images/VGPics/VG Hero Portraits/<?php echo $O2[1];?>.png" alt="Hero" class="circle responsive-img captain-img" data-key="adagio">
                  </div>
              </div>
              <div class="row">
                  <div class="col s2">
                      Assists:<br><span><?php echo round($R2[$O2[2]]["A"]);?></span>
                  </div>
                  <div class="col s2">
                      Deaths:<br><span><?php echo round($R2[$O2[2]]["D"]);?></span>
                  </div>
                  <div class="col s2">
                      Kills:<br><span><?php echo round($R2[$O2[2]]["K"]);?></span>
                  </div>
                  <div class="col s4">
                      <img src="Images/VGPics/VG Hero Portraits/<?php echo $O2[2];?>.png" alt="Hero" class="circle responsive-img captain-img" data-key="adagio">
                  </div>
              </div>
          </div>
      </div>
      <div class="container center-align proceed-btn">
          <a href="team_summary.php" class="waves-effect waves-light btn-large amber-text black">Team</a>
          <a href="welcome.php" class="waves-effect waves-light btn-large amber-text black">Home</a>
          <a href="results.php" class="waves-effect waves-light btn-large amber-text black" onclick="Materialize.toast('Match Found', 4000); setInterval(toasta, 1000);">Battle</a>
      </div>
  <?php } ?>
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
