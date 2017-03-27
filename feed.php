<pre><?php

$servername = "localhost";
$username = "id935168_vg";
$password = "VG12345";
$database = "id935168_vg";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>
<?php
$h=[];
require_once 'api.php';
request("https://api.dc01.gamelockerapp.com/shards/ea/matches");
//request("https://api.dc01.gamelockerapp.com/shards/ea/players");
$json = json_decode($serverOutput, true);
//print_r($json);
$i=0;
function GIC($te,$it_name)
{
  return $te["data"]["stats"][$it_name];
}
$builds=["Weapon","Crystal","Defence","Utility"];
$e1=[];
$result=mysqli_query($conn,"SELECT * FROM hero");
while($row = mysqli_fetch_assoc($result))
{
    $e1[strtolower(str_replace("*","",$row["NAME"]))]=[$row["K"],$row["D"],$row["A"]];
}
$e=[];
$result=mysqli_query($conn,"SELECT * FROM item");
while($row = mysqli_fetch_assoc($result)) {
        //echo "id: " . $row["ID"]. " - Name: " . $row["NAME"] . "<br>";
        $e[$row["NAME"]]=$row["TYPE"];
    }

//echo GIC($r1["participants"][0],"Weapon");
//print_r($e);
while($i<1)
{
  print_r($json["data"][$i]);
  $game=$json["data"][$i]["attributes"]["gameMode"];
  //echo $game;
  $mid=$json["data"][$i]["id"];//match id
  $r1["id"]=$json["data"][$i]["relationships"]["rosters"]["data"][0]["id"];//roster1 id
  $r2["id"]=$json["data"][$i]["relationships"]["rosters"]["data"][1]["id"];//roster2 id
  $p1=[];
  $p2=[];
  $ex=[];
  //$ex["NAME"]="KARTHIK";
  //print_r($ex);
  //array_push($p1,$ex);
  //print_r($p1);
//  $v1=$json["data"][$i]["relationships"]["rosters"]["data"][0]["id"];
//$v=$json["data"][$i]["relationships"]["rosters"]["data"][1]["id"];
//print_r($json);
foreach ($json as $object1 => $values1)
{
  // echo $object1 . "<br>";
  //echo $values1;/*
    foreach($values1 as $object2 => $values2)
    {
        //print_r($values2);
        if($values2['type'] === 'roster' && $values2['id']==$r1["id"])
        {
          $r1["participants"]=$values2["relationships"]["participants"]["data"];
          //print_r($values2);
          //echo $values2['attributes']['stats']['turretsRemaining'] . 'v<br>';
          //foreach($values2 as $object3 => $values3){
            //print_r($values2['relationships']['participants']);
        //  }
        }
    }
}
  foreach ($json as $object1 => $values1)
  {
    // echo $object1 . "<br>";
    //echo $values1;/*
      foreach($values1 as $object2 => $values2)
      {
          //print_r($values2);
          if($values2['type'] === 'roster' && $values2["id"]==$r2["id"])
          {
            //print_r($values2);
            $r2["participants"]=$values2["relationships"]["participants"]["data"];
            //echo $values2['attributes']['stats']['turretsRemaining'] . 'v<br>';
            //foreach($values2 as $object3 => $values3){
              //print_r($values2['relationships']['participants']);
          //  }
          }
      }
    }

    foreach ($json as $object1 => $values1)
    {
      // echo $object1 . "<br>";
      //echo $values1;/*
        foreach($values1 as $object2 => $values2)
        {
            //print_r($values2);
            if($values2['type'] === 'participant' && $values2["id"]==$r2["participants"][0]["id"]){
              $r2["participants"][0]["data"]=$values2["attributes"];
            }
            if($values2['type'] === 'participant' && $values2["id"]==$r2["participants"][1]["id"]){
              $r2["participants"][1]["data"]=$values2["attributes"];
            }
            if($values2['type'] === 'participant' && $values2["id"]==$r2["participants"][2]["id"]){
              $r2["participants"][2]["data"]=$values2["attributes"];
            }
            //for first rooster
            if($values2['type'] === 'participant' && $values2["id"]==$r1["participants"][0]["id"]){
              $r1["participants"][0]["data"]=$values2["attributes"];
            }
            if($values2['type'] === 'participant' && $values2["id"]==$r1["participants"][1]["id"]){
              $r1["participants"][1]["data"]=$values2["attributes"];
            }
            if($values2['type'] === 'participant' && $values2["id"]==$r1["participants"][2]["id"]){
              $r1["participants"][2]["data"]=$values2["attributes"];
            }
        }
      }
          $l=0;
          while($l<3)
          {
          $r1["participants"][$l]["data"]["stats"]["Weapon"]=0;
          $r1["participants"][$l]["data"]["stats"]["Crystal"]=0;
          $r1["participants"][$l]["data"]["stats"]["Utility"]=0;
          $r1["participants"][$l]["data"]["stats"]["Defence"]=0;
          $r1["participants"][$l]["data"]["stats"]["Consumables"]=0;

            foreach($r1["participants"][$l]["data"]["stats"]["items"] as $it=>$c)
              {
                    $r1["participants"][$l]["data"]["stats"][$e[$c]]=$r1["participants"][$l]["data"]["stats"][$e[$c]]+1;
              }
              $l=$l+1;
          }
//collecting roster2

$l=0;
while($l<3)
{
$r2["participants"][$l]["data"]["stats"]["Weapon"]=0;
$r2["participants"][$l]["data"]["stats"]["Crystal"]=0;
$r2["participants"][$l]["data"]["stats"]["Utility"]=0;
$r2["participants"][$l]["data"]["stats"]["Defence"]=0;
$r2["participants"][$l]["data"]["stats"]["Consumables"]=0;
foreach($r2["participants"][$l]["data"]["stats"]["items"] as $it=>$c)
{
$r2["participants"][$l]["data"]["stats"][$e[$c]]=$r2["participants"][$l]["data"]["stats"][$e[$c]]+1;
}
$l=$l+1;
}
//end of collection
//print_r($r1);
//print_r($r2);
$mat1kill=0;
$mat1death=0;
$mat1assist=0;
foreach ($r1["participants"] as $key => $value) {
  $h1=strtolower(str_replace("*","",$value["data"]["actor"]));
  foreach ($r2["participants"] as $key2 => $value2) {
    $h2=strtolower(str_replace("*","",$value2["data"]["actor"]));
    foreach ($builds as $key3 => $value3) {
      if($value["data"]["stats"][$value3]>0)
      {
        foreach ($builds as $key4 => $value4) {
          if($value2["data"]["stats"][$value4]>0)
          {
            //echo $h1.$h2;
            $result3=mysqli_query($conn,"SELECT * FROM data WHERE HERO1='$h1' AND BUILD1='$value3' AND HERO2='$h2' AND BUILD2='$value4'");

            if(!$result3)
            echo mysqli_error($conn);
            while($row3 = mysqli_fetch_assoc($result3)) {
                    //echo "id: " . $row3["ID"]. " - Name: " . $row3["HERO1"] . "<br>";
                    //print_r($e1[$h1]);
                    $k=$row3["K"]+(($value["data"]["stats"]["kills"]*$e1[$h1][0]*$value["data"]["stats"][$value3]*$value2["data"]["stats"][$value4])/(5*6*6));
                    $d=$row3["D"]+(($value["data"]["stats"]["deaths"]*$e1[$h1][1]*$value["data"]["stats"][$value3]*$value2["data"]["stats"][$value4])/(5*6*6));
                    $a=$row3["A"]+(($value["data"]["stats"]["assists"]*$e1[$h1][2]*$value["data"]["stats"][$value3]*$value2["data"]["stats"][$value4])/(5*6*6));
                    $kra=$row3["KRA"]+(($value["data"]["stats"]["krakenCaptures"]*$value["data"]["stats"][$value3]*$value2["data"]["stats"][$value4])/(6*6));
                    //echo "H1: " . $row3["HERO1"]."BUILD :".$value3 . " - H2: " . $row3["HERO2"] ."BUILD :".$value4 . "<br>". " - K: " . $k . " - D: " . $d . " - A: " . $a ;}
                  $result4=mysqli_query($conn,"UPDATE data SET K=$k WHERE HERO1='$h1' AND BUILD1='$value3' AND HERO2='$h2' AND BUILD2='$value4'");
                  if(!$result4)
                  echo mysqli_error($conn);
                  $result4=mysqli_query($conn,"UPDATE data SET K=$k WHERE HERO1='$h1' AND BUILD1='$value3' AND HERO2='$h2' AND BUILD2='$value4'");
                  if(!$result4)
                  echo mysqli_error($conn);
                  $result4=mysqli_query($conn,"UPDATE data SET D=$d WHERE HERO1='$h1' AND BUILD1='$value3' AND HERO2='$h2' AND BUILD2='$value4'");
                  if(!$result4)
                  echo mysqli_error($conn);
                  $result4=mysqli_query($conn,"UPDATE data SET A=$a WHERE HERO1='$h1' AND BUILD1='$value3' AND HERO2='$h2' AND BUILD2='$value4'");
                  if(!$result4)
                  echo mysqli_error($conn);
                  $result4=mysqli_query($conn,"UPDATE data SET KRA=$kra WHERE HERO1='$h1' AND BUILD1='$value3' AND HERO2='$h2' AND BUILD2='$value4'");
                  if(!$result4)
                  echo mysqli_error($conn);
                  $mat1kill=$mat1kill+$k;
                  $mat1death=$mat1kill+$d;
                  $mat1assist=$mat1kill+$a;

          }
        }
      }
    }
  }
}
}

$result=0;
if($r1["participants"][0]["data"]["stats"]["winner"]==1)
$result=1;

//$result4=mysqli_query($conn,"INSERT into ml(MATCH_ID,K,D,A,RESULT) values('$mid','$mat1kill','$mat1death','$mat1assist','$result')");
//if(!$result4)
//echo mysqli_error($conn);
$tem=$r1;
$r1=$r2;
$r2=$tem;
$mat2kill=0;
$mat2death=0;
$mat2assist=0;
//r2
foreach ($r1["participants"] as $key => $value) {
  $h1=$value["data"]["actor"];
  foreach ($r2["participants"] as $key2 => $value2) {
    $h2=$value2["data"]["actor"];
    foreach ($builds as $key3 => $value3) {
      if($value["data"]["stats"][$value3]>0)
      {
        foreach ($builds as $key4 => $value4) {
          if($value2["data"]["stats"][$value4]>0)
          {
            //echo $h1.$h2;
            $result3=mysqli_query($conn,"SELECT * FROM data WHERE HERO1='$h1' AND BUILD1='$value3' AND HERO2='$h2' AND BUILD2='$value4'");

            if(!$result3)
            echo mysqli_error($conn);
            while($row3 = mysqli_fetch_assoc($result3)) {
                    //echo "id: " . $row3["ID"]. " - Name: " . $row3["HERO1"] . "<br>";
                    //print_r($e1[$h1]);
                    $k=$row3["K"]+(($value["data"]["stats"]["kills"]*$e1[$h1][0]*$value["data"]["stats"][$value3]*$value2["data"]["stats"][$value4])/(5*6*6));
                    $d=$row3["D"]+(($value["data"]["stats"]["deaths"]*$e1[$h1][1]*$value["data"]["stats"][$value3]*$value2["data"]["stats"][$value4])/(5*6*6));
                    $a=$row3["A"]+(($value["data"]["stats"]["assists"]*$e1[$h1][2]*$value["data"]["stats"][$value3]*$value2["data"]["stats"][$value4])/(5*6*6));
                    $kra=$row3["KRA"]+(($value["data"]["stats"]["krakenCaptures"]*$value["data"]["stats"][$value3]*$value2["data"]["stats"][$value4])/(6*6));
                    //echo "H1: " . $row3["HERO1"]."BUILD :".$value3 . " - H2: " . $row3["HERO2"] ."BUILD :".$value4 . "<br>". " - K: " . $k . " - D: " . $d . " - A: " . $a ;}
                    echo "UPDATING DATA";
                  $result4=mysqli_query($conn,"UPDATE data SET K=$k WHERE HERO1='$h1' AND BUILD1='$value3' AND HERO2='$h2' AND BUILD2='$value4'");
                  if(!$result4)
                  echo mysqli_error($conn);
                  $result4=mysqli_query($conn,"UPDATE data SET K=$k WHERE HERO1='$h1' AND BUILD1='$value3' AND HERO2='$h2' AND BUILD2='$value4'");
                  if(!$result4)
                  echo mysqli_error($conn);
                  $result4=mysqli_query($conn,"UPDATE data SET D=$d WHERE HERO1='$h1' AND BUILD1='$value3' AND HERO2='$h2' AND BUILD2='$value4'");
                  if(!$result4)
                  echo mysqli_error($conn);
                  $result4=mysqli_query($conn,"UPDATE data SET A=$a WHERE HERO1='$h1' AND BUILD1='$value3' AND HERO2='$h2' AND BUILD2='$value4'");
                  if(!$result4)
                  echo mysqli_error($conn);
                  $result4=mysqli_query($conn,"UPDATE data SET KRA=$kra WHERE HERO1='$h1' AND BUILD1='$value3' AND HERO2='$h2' AND BUILD2='$value4'");
                  if(!$result4)
                  echo mysqli_error($conn);
                  $mat2kill=$mat2kill+$k;
                  $mat2death=$mat2kill+$d;
                  $mat2assist=$mat2kill+$a;
          }
        }
      }
    }

  }

}
}
echo $mat1kill.'<br>';
//r2 finish
echo $mat2kill.'<br>';
echo 'Values FEEDED'.'<br>';

if($r1["participants"][0]["data"]["stats"]["winner"]==1)
{
  $kl=$mat2kill-$mat1kill;
$result4=mysqli_query($conn,"INSERT into ml(MATCH_ID,K,D,A,RESULT) values('$mid','$kl','$mat2death-$mat1kill','$mat2assist-$mat1assist',1)");
if(!$result4)
echo mysqli_error($conn);
}
else
{
  $result4=mysqli_query($conn,"INSERT into ml(MATCH_ID,K,D,A,RESULT) values('$mid','$mat1kill-$mat2kill','$mat1death-$mat2kill','$mat1assist-$mat2assist',1)");
if(!$result4)
echo mysqli_error($conn);
}
//print_r($r1);
//print_r($r2);
//echo GIC($r1["participants"][0],"Weapon");
$i=$i+1;
}/*
$result=mysqli_query($conn,"SELECT * FROM item");
while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["ID"]. " - Name: " . $row["NAME"] . "<br>";
        $e[$row["NAME"]]=$row["TYPE"];
    }
$u=array_unique($h);
//print_r($u);
//print_r($e);
$toadd=array_diff($u,$e);
foreach($toadd as $o=>$b)
{
  echo $b;
  $result=mysqli_query($conn,"INSERT INTO item(NAME) values('$b')");
  if(! $result )
{
  die('Could not get data: ' . mysqli_error($conn));
}
}*/
?>
</pre>