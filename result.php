<!doctype HTML>
<html>
    <head> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Challange 2</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    </head>
    <body>
        <div>
            <?php if(isset($_POST['submit'])) : ?>
                <?php 
                    $opts = array(
                        'http'=>array(
                        'method'=>"GET",
                        'header'=>'user-agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.54 Safari/537.36'
                        )
                    );
                    
                    $context = stream_context_create($opts);
                    
                    $user = $_POST['nicknkame'];

                    //fetching data
                    $url_repo = "https://api.github.com/users/$user/repos";
                    $json_repo = file_get_contents($url_repo, false, $context);
                    $repositories = json_decode($json_repo);
                    
                    $url_followers = "https://api.github.com/users/$user/followers";
                    $json_followers = file_get_contents($url_followers, false, $context);
                    $followers = json_decode($json_followers);
                ?>
                <div class="container mt-3">
                    <?php if($json_followers || $json_repo) : ?>
                    <?php if(isset($_POST['repos'])): ?>
                        <h3 class="card-title mt-5">Repositories of <?php print $user?>:</h3>
                        <ul class="list-group list-group-flush">
                            <?php 
                                foreach ($repositories as &$repo) {
                                    echo "<li class='list-group-item'><a href=$repo->html_url>$repo->name</a></li>";
                                }
                            ?>
                        </ul>
                    <?php endif ?>
                    <?php if(isset($_POST['followers'])): ?>
                        <h3 class="card-title mt-5">Followers of <?php print $user?>:</h3>
                        <div class="card-group row-cols-1 row-cols-md-3 g-4">
                            <?php 
                                foreach ($followers as &$follower) {
                                    echo "<div class='col mt-2'><a href=$follower->url class='card'><img src=$follower->avatar_url class='card-img-top' alt='avatar'/><div class='card-body'><h5 class='card-title'>$follower->login</h5></div></a></div>";
                                }
                            ?>
                        </div>
                    <?php endif ?>
                    <?php else : ?>
                        <div class="alert alert-danger mt-2">User <?php print $user; ?> does not exist or has no activity.</div>
                    <?php endif ?>
                    <a href='/' class="mt-3" >Go to home</a>
                </div>

            <?php else : ?>
                <?php header("Location: index.php"); ?>
            <?php endif ?>
        </div>
    </body>
</html>

