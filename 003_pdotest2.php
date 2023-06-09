<?php
  $host= 'localhost';
  $user= 'root';
  $password= '';
  $dbname= 'pdoposts';

  $dsn= 'mysql:host='. $host. ';dbname='. $dbname;

  //Create new PDO instance
  $pdo= new PDO($dsn, $user, $password);

  $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

  #PREPARED STATEMENTS (prepare & execute)

  //EXAMPLE OF AN UNSAFE WAY TO DO IT
  //$sql= "SELECT * FROM posts WHERE author = '$author'";

  //FETCH MULTIPLE POSTS

  $author= 'Pepo';  //User input

  //Positional params
  $sql= 'SELECT * FROM posts WHERE author = ?';
  $stmt= $pdo->prepare($sql);
  $stmt->execute([$author]);
  $posts= $stmt->fetchAll(); //inside PDO::FETCH_ASSOC. empty because line 12

  //var_dump($posts);
  foreach($posts as $post){
    echo $post->body. "<br>";
  }

?>