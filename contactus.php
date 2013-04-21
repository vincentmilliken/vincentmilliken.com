<html>
  <head>
    <title>Contact Us</title>
  </head>
 
  <body>
 
    <?php
      if ($_POST['message']) {
        $message = $_POST['message'];
        $email = $_POST['email'];
        $name = $_POST['name'];
        $headers = "From: ".$name."<".$email.">";
 
        mail('vincentamilliken@gmail.com', "Contact from RRR", $message, $headers);
 
        echo "Thanks for contacting us!<br /><br />";
      }
    ?>
 
    <form action="" method="post">
 
      Name<br />
      <input type="text" name="name" /> <br />
      
      Email<br />
      <input type="text" name="email" /><br /><br />
 
      Message<br />
      <textarea name="message" cols="50" rows="5"></textarea>
      
      <input type="submit" value="send"/>
 
    </form>
 
  </body>
 
</html>