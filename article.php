

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Chapter 5</title>
 
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
   <link rel="preconnect" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css2?family=Chango&family=Roboto&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="styles.css" />

</head>
<body>
<?php
    


?>
   <h1> sign up </h1>
   <?php
   include 'dbo.php';
   include 'include.php';
    include "topbar.php";
    if($_SESSION["username"] != ""){
        echo "<h2> Username: " . $_SESSION["username"] . "</h2>";
        }

    $q=urlencode($_GET["q"]);

    $conn = OpenCon();

    $stmt = $conn->prepare("SELECT * FROM ARTICLE  WHERE articleID = ?");
    $stmt->bind_param("s", $q);
    $stmt->execute();
    
    
    $result = $stmt->bind_result($articleID, $articleTitle, $userID, $animeID, $starRating,$body, $date);
    $stmt->fetch();
    if($articleID != ""){



    
    echo "<p>ArticleID: " . $articleID . "<br>Article Title: " . $articleTitle . "<br> UserID: " . $userID . "<br> AnimeID:" . $animeID . "<br>Body: <br>" .  nl2br($body) . "<br><br>User Rating:" . $starRating . "<br>Date Submitted:" . $date . "</p>";
    $stmt->close();
    CloseCon($conn);
    } else {
        echo "<p>No results found</p>";
    }
    




    ?>
</body>
</html>