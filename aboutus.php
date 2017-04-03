<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>VG Fantasy</title>
    <script src="jquery-3.1.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="aboutus.css">
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
//error_reporting(E_ERROR);
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$servername = "localhost";
$username = "id935168_vg";
$password = "vitvellore123";
$database = "id935168_vg";
// Create connection
$con = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

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

    <div class="container text-div">
        <h5>
            This website is based on Vainglory - The MOBA Perfected for touch. We made this for the <a href="https://developer.vainglorygame.com/rules">Vainglory API Challenge 2017</a>. This is still a work in progress, and we plan we continually add
            more features and stablity to the platform.<br><br>The Team:
        </h5>
        <div class="row">
            <div class="col s12 m6">
                <div class="card blue-grey darken-4">
                    <div class="card-content white-text">
                        <span class="card-title">Karthik Rajaraman</span>
<p>Age : 19 </p>
                        <p>I mostly play as support. Chaterine, Lyra and Joule are my main heroes. Love to code and build stuff anytime, anywhere.<br>Student at VIT Vellore, India.</p>
                    </div>
                    <div class="card-action">
                        Twitter: <a href="https://twitter.com/karth97">@karth97</a>
                        <a href="mailto:karth2512@gmail.com" target="_top">Send Mail</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m6">
                <div class="card blue-grey darken-4">
                    <div class="card-content white-text">
                        <span class="card-title">Ratnasambhav Priyadarshi</span>
<p>Age : 18 </p>
                        <p>I mostly play as carry. Vox, Skye and Petal are my goto heroes. Love learning and building new things for the web.<br>Student at VIT Vellore, India.</p>
                    </div>
                    <div class="card-action">
                        Twitter: <a href="https://twitter.com/ratnasambhav732">@ratnasambhav732</a>
                        <a href="mailto:ratnasambhav@gmail.com" target="_top">Send Mail</a>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <h5>Thank you for visiting!</h5>
    </div>


    <script>
        $(document).ready(function() {
            $('.button-collapse').sideNav();
            $('.tooltipped').tooltip({
                delay: 50
            });
        });
    </script>
</body>

</html>
