<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="forum.css">
    <style>
      *{color:black;}
    </style>
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
      <?php
      $conn = mysqli_connect("localhost", "bondarenko", "Sch00lS@ck3", "test");
      // Check connection
      if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
      }

      $id = $_GET['id'];
      $sql = mysqli_query($conn, "SELECT * FROM `topics` WHERE `id` = {$id}");
      $topic = mysqli_fetch_array($sql);
      echo "<h2>{$topic['topic_title']}</h2><h3>Author {$topic['topic_by']}</h3><p>{$topic['topic_description']}</p>";

      //comments
     ?>
    <form action = "" method = "POST">
        <textarea placeholder="Comment" name = 'comment'></textarea>
        <input type = 'submit' name = 'addcomment' value = 'send'>
    </form>

    <?php
      if($_POST['addcomment']){
          mysqli_query($conn, "INSERT INTO `comments`(`comment_text`, `commentid`, `user`, `comment_topic`) VALUES ('{$_POST['comment']}', 0, '{$_SESSION['username']}', {$_GET['id']})");
      }


      $sql = mysqli_query($conn, "SELECT * FROM `comments` WHERE `comment_topic` = {$_GET['id']}");
      while($result = mysqli_fetch_array($sql)){
        echo "<div style = 'border-top : 2px solid black;'><p>{$result['user']} [{$result['date']}]</p><p>{$result['comment_text']}</p>    </div>";
      }

     ?>



  </body>
  </html>
