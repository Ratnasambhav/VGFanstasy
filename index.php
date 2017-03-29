<!DOCTYPE html>
  <html>

  <head>
      <meta charset="utf-8">
      <title>VG Fantasy</title>
      <script src="jquery-3.1.1.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>

      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

      <link rel="stylesheet" href="welcome.css">
  </head>
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
  //echo $_SESSION["user"];
  if($_SERVER["REQUEST_METHOD"]=="POST")
  {
    if(isset($_POST['username1']) && isset($_POST['name1']) && isset($_POST['password1']) && isset($_POST['email']))
    {
      $username=test_input($_POST['username1']);
      $password=md5(test_input($_POST['password1']));
      $name=test_input($_POST['name1']);
      $email=test_input($_POST['email']);
    $sql="SELECT * FROM users";
    $sql2=mysqli_query($con,$sql);
    $exists=0;
    while($row=mysqli_fetch_assoc($sql2))
    {
        if($row['USERNAME']==$username )
        {
            $exists=1;
              echo "ENTERED REG";
        }
    }
    if($exists==0)
    {
      $sql2=mysqli_query($con,"INSERT INTO users(USERNAME,NAME,EMAIL,PASSWORD) values ('$username','$name','$email','$password')");
      $sql="INSERT INTO teams(USERNAME,CAPTAIN,JUNGLER,CARRY,J1,J2,J3,J4,J5,J6,CAP1,CAP2,CAP3,CAP4,CAP5,CAP6,C1,C2,C3,C4,C5,C6) values('$username','adagio','gwen','alpha','sorrowblade','sorrowblade','sorrowblade','sorrowblade','sorrowblade','sorrowblade','sorrowblade','sorrowblade','sorrowblade','sorrowblade','sorrowblade','sorrowblade','sorrowblade','sorrowblade','sorrowblade','sorrowblade','sorrowblade','sorrowblade');";
      $sql2=mysqli_query($con,$sql);echo "REGISTER SUCCESSFULL";
    }
    else {
      echo "USERNAME ALREADY EXISTS";
    }

}
  else
  {
      $uname=test_input($_POST['username']);
      $pass=test_input($_POST['password']);
      $sql="SELECT * FROM users";
      $sql2=mysqli_query($con,$sql);
      while($row=mysqli_fetch_assoc($sql2))
      {
          if($err=='')
          $err='USER NOT FOUND';
          if($row['USERNAME']==$uname )
          {
              if(md5($pass)==$row['PASSWORD'])
                  {
                      $_SESSION['user']=$uname;
                      header("Location: welcome.php");
                      break;
                  }
                  else {
                    echo "WRONG PASSWORD";
                  }
          }
      }
    }
  }
  ?>
  <body>

      <header class="valign-wrapper">
          <p class="valign">VG Fantasy</p>
      </header>

<div class="container">
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
    </div>
<br><br>
      <div class="container">
          <div class="row">
              <form class="col m6 s12" action="login.php" method="post">
                  <div class="row white-text">
                      <h5 class="">Login</h5>
                      <div class="input-field col s10">
                          <input id="username" type="text" name="username">
                          <label for="username" >Username</label>
                      </div>
                      <div class="input-field col s10">
                          <input name="password" id="password" type="password" class="validate">
                          <label for="password">Password</label>
                      </div>
                  </div>
                  <div class="center-align proceed-btn">
                      <button class="waves-effect waves-light btn-large amber-text black">Login</button>
                  </div>
              </form>
              <form action="login.php" method="post" class="col m6 s12">
                  <div class="row white-text">
                      <h5 class="">Sign Up</h5>
                      <div class="input-field col s10">
                          <input id="name" name="name1" type="text" class="validate">
                          <label for="name">Name</label>
                      </div>
                      <div class="input-field col s10">
                          <input id="username" name="username1" type="text" class="validate">
                          <label for="username">Username</label>
                      </div>
                      <div class="input-field col s10">
                          <input id="email" name="email" type="email" class="validate">
                          <label for="email" data-error="wrong" data-success="right">Email</label>
                      </div>
                      <div class="input-field col s10">
                          <input id="password" name="password1" type="password" class="validate">
                          <label for="password">Password</label>
                      </div>
                  </div>
                  <div class="center-align proceed-btn">
  <input class="waves-effect waves-light btn-large amber-text black" type="submit">
                  </div>
              </form>
          </div>
      </div>

  </body>

  </html>
