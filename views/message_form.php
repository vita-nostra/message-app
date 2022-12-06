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
<div class="container">
    <main>
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="img/review-icon.png" alt="" width="72">
            <h2>Cвязаться с нами</h2>
            <p class="lead">Пожалуйста, оставьте свое сообщение в форме ниже и мы постараемся связаться с вами в
                ближайшее время!</p>
        </div>

        <div class="col-md-12 col-lg-12">
            <h4 class="mb-3">Ваши контакты</h4>
            <form class="row g-3 needs-validation" enctype="multipart/form-data" action="/?add" method="post"
                  novalidate>
                <div class="col-sm-6">
                    <label for="firstName" class="form-label">Имя</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" placeholder="" value=""
                           required>
                    <div class="invalid-feedback">
                        Поле "Имя" обязательно для заполнения.
                    </div>
                </div>

                <div class="col-sm-6">
                    <label for="lastName" class="form-label">Фамилия</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="" value=""
                           required>
                    <div class="invalid-feedback">
                        Поле "Фамилия" обязательно для заполнения.
                    </div>
                </div>

                <div class="col-12">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com"
                           required>
                    <div class="invalid-feedback">
                        Пожалуйста, введите корректный email адрес.
                    </div>
                </div>

                <div class="col-md-5">
                    <label for="country" class="form-label">Город</label>
                    <select class="form-select" id="city" name="city" required="">
                        <option value="">Выбрать...</option>
                        <option>Москва</option>
                        <option>Санкт-Петербург</option>
                        <option>Ульяновск</option>
                    </select>
                    <div class="invalid-feedback">
                        Пожалуйста, выберите город.
                    </div>
                </div>

                <hr class="my-4">

                <h4 class="mb-3">Файлы</h4>

                <div class="mb-3">
                    <label for="formFile" class="form-label">Прикрепите файлы при необходимости</label>
                    <input type="hidden" name="MAX_FILE_SIZE" value="3145728"/>
                    <input class="form-control" type="file" id="formFile" name="formFile">
                    <p>Размер файла не более 3МБ</p>
                </div>

                <hr class="my-4">

                <h4 class="mb-3">Интересуемые услуги</h4>

                <div class="my-3">
                    <?php foreach ($services as $service): ?>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="<?= $service['alias'] ?>"
                                   name="services[]" value="<?= $service['alias'] ?>">
                            <label class="form-check-label"
                                   for="<?= $service['alias'] ?>"><?= (string)$service['service'] ?></label>
                        </div>
                    <?php endforeach ?>
                </div>

                <hr class="my-4">

                <h4 class="mb-3">Тема обращения</h4>
                <div class="my-3">
                    <?php foreach ($subjects as $subject): ?>
                        <div class="form-check">
                            <input id="<?= $subject['alias'] ?>" name="subject" value="<?= $subject['alias'] ?>"
                                   type="radio" class="form-check-input" checked
                                   required="">
                            <label class="form-check-label"
                                   for="<?= $subject['alias'] ?>"><?= (string)$subject['subject'] ?></label>
                        </div>
                    <?php endforeach ?>
                </div>
                <hr class="my-4">

                <div class="col-md-12 mb-5">
                    <label for="review_text" class="form-label">Ваше сообщение</label>
                    <textarea class="form-control" id="reviewText" name="reviewText" rows="5" required></textarea>
                    <div class="invalid-feedback">
                        Пожалуйста, введите сообщение в текстовое поле.
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-sm-8">
                        <button class="w-100 btn btn-success btn-lg" type="submit">Отправить</button>
                    </div>
                    <input class="col-sm-4 btn btn-warning" type="reset" value="Очистить форму">
                </div>
            </form>
        </div>
    </main>
</div>

<footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">© 2022 Messages App</p>
</footer>
</div>
<script type="text/javascript" src="js/validation-form.js"></script>
</body>
</html>