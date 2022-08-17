<!doctype HTML>
<html lang="en">
    <head> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Challange 2</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    </head>
    <body class="container mt-3">
        <form  method="POST" action="result.php" enctype="multipart/form-data">
            <h1>Enter github user nickname to see info</h1>
            <input type="text" class="form-control mt-3" name="nicknkame" placeholder="Enter username:" />
            <div class="form-check mt-3">
                <input type="checkbox" class="form-check-input" id="repos" name="repos" value="Car">
                <label for="repos" class="form-check-label" >Show repositories</label><br>
                <input type="checkbox" class="form-check-input" id="followers" name="followers" value="Boat">
                <label for="followers" class="form-check-label" >Show followers</label><br><br>
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Search">
        </form> 
    </body>
</html>
