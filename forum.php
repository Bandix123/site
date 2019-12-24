<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="forum.css">
  </head>
  <body>


    <div class="menu" align="center">

    <table id="search">
    <tr>
      <td align="left" id="wiki">  <a href="wiki.html"><p> Wiki </p>  </a></td>
      <td align="center" id="help"> <a href="forum.php"> <p>help forum / find your server </p> </a></td>
      <td align="right" id="support"> <a href="mainpage.php"> <p>Main</p>  </a></td>
    </tr>
    </table>
    </div>


    <h1 color="red"> <a href="add_topic.php" color="red"> CREATE TOPIC </a> </h1>
    <table id="forum">
    <tr>
    <td>Id</td>
    <td>Title</td>
    <td>Description</td>
    <td>By</td>
    </tr>
    <?php
    session_start();
    $i=0;
    $conn = mysqli_connect("localhost", "bondarenko", "Sch00lS@ck3", "test");
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT id,topic_title , topic_description, topic_by FROM topics";
    $sqli = "SELECT comment_text, comment_topic FROM comments";
    $result = $conn->query($sql);
    $rezult = $conn->query($sqli);
    if ($result->num_rows > 0) { $i = 1;
    // output data of each row


    while($row = $result->fetch_assoc()) {

    echo "<tr><td>"
    . $row["id"].
    "</td><td>"
    . $row["topic_title"] .
      "</td><td>"
    . $row["topic_description"].
    "</td><td>"
    . $row["topic_by"] .
    "</td>
    <td> <form method='POST' action='comment.php'>
    <button type='subbmit' class='btn' name='coment' > coment </button> </form> </td><td>";
    echo
    $i++
;
echo $row["comment_text"];
if ($_SESSION['coment'] = $row["id"]){

if ( $rezult ->num_rows > 0) {$j = 1;

  while($row = $rezult->fetch_assoc()){
echo "</td><td>"; echo "</td><td>"; echo "</td><td>"; echo " </td><td>";
echo " ";
echo $row["comment_text"];
echo " ";
echo "</td> ";
echo "</tr> <tr><td> ";
  }
}
}


echo          "</td></tr>"
    ;


    }
    echo "</table>";
    } else { echo "0 results"; }
$i= $i-1;
$_SESSION['topic'] = $i;

    $conn->close();
    ?>


    </table>












  </body>
</html>
