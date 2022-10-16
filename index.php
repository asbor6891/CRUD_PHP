<?php

$pdo = new PDO('mysql:host=localhost;dbname=test;', 'root', '');
$statement = $pdo->prepare("SELECT * FROM users");
$statement->execute();
$users = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>CRUD</title>
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4><a href="create.php" class="btn btn-warning float-end">Добавить пользователя</a></h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Имя</th>
                                    <th>Email</th>
                                    <th>Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $user):?>
                                    <tr>
                                        <td><?php echo $user['id'];?></td>
                                        <td><?php echo $user['name'];?></td>
                                        <td><?php echo $user['email'];?></td>
                                        <td>
                                            <a href="show.php?id=<?php echo $user['id'];?>" class="btn btn-secondary btn-sm">Просмотр</a>
                                            <a href="edit.php?id=<?php echo $user['id'];?>" class="btn btn-secondary btn-sm">Редактировать</a>
                                            <a onclick="return confirm('Удалить запись?')" href="delete.php?id=<?php echo $user['id'];?>" class="btn btn-danger btn-sm">Удалить</a>
                                        </td>
                                    </tr>
                                <?php endforeach;?>  
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>