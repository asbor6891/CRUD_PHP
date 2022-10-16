<?php

$pdo = new PDO('mysql:host=localhost;dbname=test;', 'root', '');

$sql = "SELECT * FROM users WHERE id=:id";
$statement = $pdo->prepare($sql);
$statement->execute($_GET);
$user = $statement->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Просмотр</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4><a href="index.php" class="btn btn-danger float-end">Назад</a></h4>
                    </div>
                    <div class="card-body">
                            <div class="mb-3">
                                <label>Имя:</label>
                                <input type="text" name="name" class="form-control" value="<?php echo $user['name'];?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label>Email:</label>
                                <input type="email" name="email" class="form-control" value="<?php echo $user['email'];?>" disabled>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>