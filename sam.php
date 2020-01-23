<?php include('server.php') ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Main Page</title>
<link rel="stylesheet" href="mainpage.css" >
</head>
<body>
<div id="all">
<div align="right" id="login">
  <p> <a href="login.php">Login</a></p>
  </div>
<div class="menu" align="center">

<table id="search">
  <tr>
    <td align="left" id="wiki">  <a href="wiki.html"><p> Wiki </p>  </a></td>
    <td align="center" id="help"> <a href="forum.php"> <p>help forum / find your server </p> </a></td>
    <td align="right" id="support"> <a href="mainpage.php"> <p>Main</p>  </a></td>
  </tr>
</table>
</div>


<h1> DEATH STRANDING</h1>



<div class="main">
<h3 align="center">Tommorow is in your hands</h3>
<h4>(Tagline)</h4>
  <p>Death Stranding is an action, strand video game developed by Kojima Productions, and published by Sony Interactive Entertainment for the PlayStation 4 and 505 Games for Microsoft Windows. It is directed by Hideo Kojima – the first game he and his reformed studio have worked on since the disbandment of Kojima Productions as a Konami subsidiary in July 2015. The game was officially announced during Sony's E3 2016 press conference. It was released on November 8, 2019 for PlayStation 4 and is slated for an early summer 2020 release for Microsoft Windows. </p>
</div>

<table  border="10px"id="tablegame" align="right">
  <tr>
<td colspan="2" align="center" >
<div class="mainimg" style="background-color: white;">
  <img   class="mainimg" src="https://main-cdn.goods.ru/hlr-system/1724237115/100024846587b0.jpg" alt="wtf">
</div>
</td>
</tr>
<tr>
  <td>Developed by:</td> <td> Kojima Productions</td>
</tr>
<tr>
  <td>Dirrector(s) </td> <td>Hideo Kojima</td>
</tr>
<tr>
  <td>Producer(s)</td> <td> <ul> <li> Hideo Kojima </li> <li> Hitori Nojima </li></ul></td>
</tr>
<tr>
  <td>Designer(s)</td> <td>Hideo Kojima</td>
</tr>
<tr>
  <td>Engine</td> <td>Decima</td>
</tr>
<tr>
  <td> Rate the game</td>
  <td>  <form action="mainpage.php" method="post">

   <input type="radio" name="rate" value="1" >
   <input type="radio" name="rate" value="2" >
   <input type="radio" name="rate" value="3" >
   <input type="radio" name="rate" value="4" >
   <input type="submit" name="rating">
   <?php
   session_start();
   $i=0; $k=0;
   $conn = mysqli_connect("localhost", "bondarenko", "Sch00lS@ck3", "test");
   // Check connection
   if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
   }
   $sql = "SELECT id,number FROM rating";
   $result = $conn->query($sql);
   if ($result->num_rows > 0) { $i = 1;
   // output data of each row


   while($row = $result->fetch_assoc()) {
 $i++;
 $k= $k + $row["number"];

   }
   } else { echo "0 results"; }

 $rate = $k/$i;
 echo round($rate,2);
   $conn->close();
   ?>

    </form>
</td>
</tr>
<tr>

</tr>
</table>

<h2>GAMEPLAY</h2>
<div class="gameplay">
<p> Death Stranding takes place in an open world and is played from a third-person and occasionally first-person perspective. As the Porter Sam, the player is tasked with making their way through the world carrying cargo, while overcoming various environmental obstacles with equipment, dealing with various enemies, and progressing through the main story or undertaking side missions. Predominantly taking place in the continental United States of the future, Death Stranding's vast open world includes biomes such as lush grasslands and forests, cold tundra and snow-covered mountain ranges, and reddish dusty drylands, all of which can be fully explored.
<br> <br>
Before embarking on deliveries, players can select an amount of cargo to carry, personal protective equipment, traversal equipment, and weapons. Traversal is a core element of the gameplay, demanding topographical route planning and environmental scanning, consideration of carried cargo, and active balancing of Sam as his center of gravity and stability shift. A powered exoskeleton can be worn to enable Sam to carry heavy loads of cargo more easily, or run much faster and jump significantly farther than normal. Heavy loads can be divided between Sam and up to two floating carriers. While in combat, cargo may be dropped to allow for easier movement and picked up again after enemies are dealt with. Additionally, players must manage systems such as health, stamina, cargo integrity, equipment durability and power consumption, and their bridge baby's mental state. Sam can rest in-place and recover lost health and stamina, or sooth his bridge baby and increase his relationship with the infant. Locations in the world such as safe houses, generators, and hot springs function as means of replenishing varying attributes associated with maintaining Sam.
<br> <br>
Though players have melee combat and firearms at their disposal to deal with enemies, lethal violence against living enemies is not encouraged. Players are able to use melee combat and firearms to incapacitate or restrain enemies, or attempt to circumvent them entirely, and may run, jump, crouch walk, or use vehicles to navigate the world. While under threat from enemies, crouch walking may be used to move stealthily and hide in various cover. When the player dies, they aren't presented with a conventional "Game over", but instead transported to an "upside-down realm" analogous to a "Continue?" prompt, where they can explore and recover lost items. Player-determined changes to the game world – particularly triggered voidouts – are persistent, remaining in the player's game world even after death.
</p>

</div>

<h2>DEVELOPMENT</h2>
<div class="development">
  <p> The development of Death Stranding began following Kojima Productions' reformation in December 2015. The game entered full development in 2017. Kojima revealed that in previous games he has worked on, he had to make compromises to bring them to fruition. With Death Stranding, however, he stated that the need for compromise is no longer present, and is confident that the game will be "something completely new that no-one has seen so far", as well as his best creative work yet. Kojima was aware of the belief that he was deliberately proceeding too slowly in the game's development, and revealed that was not the case.
    <br> <br>
Kojima suggested that Death Stranding does not fall solely into one specific gaming genre,but rather is largely a new genre of gaming entirely: a "strand game".Its genre-defying nature has been described in a similar vein to that of Metal Gear: In its infancy, Metal Gear was initially considered to be merely an action game, as the stealth genre was not thought to exist at the time; it would go on to be perceived as something more specific and unique due to its novel stealth elements, ultimately ushering in the stealth genre of video games.
   </p>
</div>








<!--<footer id="footer">This site is developed by Dmitry Bondarenko</footer>
-->












</div>
</body>
</html>
