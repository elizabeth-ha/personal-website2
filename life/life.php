<html>
  <head>
    <meta name="viewport" content="width=device-width">
    <!-- <link rel="icon" href="img/favicon1.ico"> -->
    <link rel="stylesheet"
    href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Overpass:200,300|Spectral:300,400,500" rel="stylesheet">
    <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.2.4.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <script src="../functions.js"></script>
    <title>Life</title>
  </head>
  <body id="life">
    <div class="border "></div>
    <div class="header">
      <div class="nav">
        <a class="nav-btn about-btn" href='../about.html'>about</a>
        <a class="nav-btn portfolio-btn" href='../portfolio.html'>portfolio</a>
        <div id="logo" class"nav-btn" onclick="window.location.href='../index.html'"><p>e</p></div>
        <a class="nav-btn services-btn" href='../life.html' style="color:#f7e66a">life</a>
        <a class="nav-btn contact-btn" href='../contact.html'>contact</a>
        <span class="stretch"></span>
      </div>
    </div>
    <div class="container fade-in">
      <div class="block">
        <?php
          include("config.php");
          $db_link = new mysqli($db_server,$db_user,$db_password,$db_name);
          if ($db_link->connect_errno) {
          print( "Failed to connect to MySQL: (" .$db_link->connect_errno . ") ".$db_link->connect_error);
          }
          else {
            // User inputs
            $postType = $_POST['post-type'];
            $title = $_POST['blog-title'];
            $content = $_POST['content'];
            $password = $_POST['password'];
            $timeStamp = date('Y-m-d H:i');

            print($timeStamp);

            //print($postType.",".$title.",".$content.",".$password.",".$timeStamp);
            function createPost($t, $time, $c) {
              $tit = "<h2>".$t."</h2>";
              $timeSt = "<p>".$time."</p>";
              // $content = "<p>".$c."</p>";
              $cont = $c;

              $post = $tit.$timeSt.$cont;
              return $post;
            }

            // When posting for demonstration
            if ($password == "testing") {
              print("Thank you for checking out my application. Here is the sample post you created.<br>Without the correct password, the content does not get uploaded to the database.");

              print( createPost($title, $timeStamp, $content) );
            }

            // Posting: populate correct database table then display the table
            else if ($password == "password") {
              print('<h1>'.$postType.'</h1>');

              // CREATE QUERIES
              // query for inserting user input data into tables
              $insert_query = "INSERT INTO ".$postType." VALUES('".$title."','".$timeStamp."','".$content."');";

              print("(DEBUGGING) insert query: ".$insert_query);

              // query for calling the table to display
              // SELECT * FROM $postType
              //   ORDERED BY post_date DESC;
              $display_query = "SELECT * FROM ".$postType." ORDER BY post_date DESC;";

              // RUN QUERIES
              mysqli_query($db_link,$insert_query);

              // $result = mysqli_query($db_link,$display_query);
              // $num_rows = mysqli_num_rows($result);

              $result = $db_link->query($display_query) or die($db_link->error);

              while ($line = $result->fetch_assoc())   {
                print("<div class=\"public-post\">\n<h2>".$line['title']."</h2>\n");
                print("<p>".$line['post_date']."</p>\n");
                print($line['content']."\n</div>");
              }



              //$result = mysqli_query($db_link,$query_x);

              mysqli_free_result($result);
            }
          }
          mysqli_close($db_link);
        ?>
      </div>
    </div>
  </body>
</html>
