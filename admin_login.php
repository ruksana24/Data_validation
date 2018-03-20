<?php
if(isset($_POST['username']) && isset($_POST['password']))
{
    if($_POST['username'] == 'admin' && $_POST['password'] == '12345678')
    {
        header("location: admin_view.php");
    }

    else
        echo "Invalid Username or Password";
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <title>Admin Login</title>
</head>

<body>


<div class="container" style="margin-top: 40px">
    <form class="form-horizontal" method="POST">
        <div class="form-group">
            <label class="control-label col-sm-2" for="username">Username : </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="username">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="password">Password : </label>
            <div class="col-sm-4">
                <input type="password" class="form-control" name="password">
            </div>
        </div>


        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </div>
    </form>
</div>


</form>

</body>
</html>
