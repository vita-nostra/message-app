<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Отзывы</title>
</head>
<body>

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="/">Messages App</a>
</header>

<div class="container-fluid">
    <div class="row">
        <h2>Список сообщений</h2>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th scope="col">№ Сообщения</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Фамилия</th>
                    <th scope="col">Email</th>
                    <th scope="col">Город</th>
                    <th scope="col">Тема сообщения</th>
                    <th scope="col">Текст сообщения</th>
                    <th scope="col">Услуги</th>
                    <th scope="col">Файл</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($messagesList as $message): ?>
                    <tr>
                        <td><?= $message['messages_id'] ?></td>
                        <td><?= $message['users_first_name'] ?></td>
                        <td><?= $message['users_last_name'] ?></td>
                        <td><?= $message['users_email'] ?></td>
                        <td><?= $message['users_city'] ?></td>
                        <td><?= $message['subjects_subject'] ?></td>
                        <td><?= $message['messages_message'] ?></td>
                        <td><?= $message['messages_service'] ?></td>
                        <td>
                            <? if (!empty($message['messages_file'])) : ?>
                                <a href="<?= str_replace('../public', '', $message['messages_file']) ?>" target="_blank"
                                   download>Скачать файл</a>
                            <? endif ?>
                        </td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
            <div class="container text-center">
                <div class="row justify-content-center">
                    <nav aria-label="...">
                        <ul class="pagination justify-content-center">
                            <li class="page-item
                        <?= $currentPage == 1 ? 'disabled' : '' ?>
                        ">
                                <a class="page-link" href="?page=<?= $currentPage - 1 ?>">Previous</a>
                            </li>
                            <? for ($i = 1; $i <= $pages; $i++): ?>
                                <li class="page-item
                        <?= $i == $currentPage ? 'active' : '' ?>
                        "><a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a></li>
                            <? endfor ?>
                            <li class="page-item
                        <?= $currentPage == $pages ? 'disabled' : '' ?>
                        ">
                                <a class="page-link" href="?page=<?= $currentPage + 1 ?>">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
