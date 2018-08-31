<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Donate</title>
  <link rel="stylesheet" type="text/css" href="style/all.css" media="all"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
  <?php include("includes/navigation.php"); ?>

  <h1>Why you should donate:</h1>
  <h4>Scroll down to meet some of the Miracle Children that were saved.</h4>
  <button class="button" onclick=location.href="https://events.dancemarathon.com/index.cfm?fuseaction=donordrive.donate&eventID=2662">
    <span>donate now</span>
  </button>

  <div>
    <img src="images/victoria.png" alt="victoria" class="pic">
    <p class="caption">VICTORIA<br>DOWN SYNDROME</p>
  </div><br><br>

  <div>
    <img src="images/ryleigh.png" alt="rileigh" class="pic">
    <p class="caption">RYLEIGH<br>CLEFT PALATE</p>
  </div><br><br>

  <div>
    <img src="images/abby.png" alt="abby" class="pic">
    <p class="caption">ABBY<br>OSTEOGENESIS IMPERFECTA</p>
  </div><br><br>

  <div>
    <img src="images/lillian.png" alt="lillian" class="pic">
    <p class="caption">LILLIAN<br>OPTIC GLIOMA</p>
  </div><br><br>

  <div>
    <img src="images/tori.png" alt="tori" class="pic">
    <p class="caption">TORI<br>PNEUMONIA</p>
  </div><br><br>

  <div>
    <img src="images/isaac.png" alt="isaac" class="pic">
    <p class="caption">ISAAC<br>BACTERIAL INFECTION</p>
  </div><br><br>

  <div>
    <img src="images/jerrod.png" alt="jerrod" class="pic">
    <p class="caption">JERROD<br>SEPTIC SHOCK</p>
  </div><br><br>
</body>

<script>
  $(document).ready(function(){
    $("img").hover(function(){
        $(this).css("opacity", 0.3);
        $("p").css("visibility", "visible", "opacity", 1.0);
        }, function(){
        $(this).css("opacity", 1.0);
        $("p").css("visibility", "hidden");
    });
  });
</script>

</html>
