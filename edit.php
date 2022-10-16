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
    <title>Редактирование</title>
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
                        <form action="update.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $user['id'];?>">
                            <div class="mb-3">
                                <label>Имя:</label>
                                <input type="text" name="name" value="<?php echo $user['name'];?>" class="form-control" required="">
                            </div>
                            <div class="mb-3">
                                <label>Email:</label>
                                <input type="email" name="email" value="<?php echo $user['email'];?>" class="form-control" required="">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-secondary">Сохранить изменения</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>