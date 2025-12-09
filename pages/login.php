<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?></title>
</head>
<body>
<h1>Авторизація</h1>
<form>
<input type="text" placeholder="Логін">
<input type="password" placeholder="Пароль">
<button>Увійти</button>
</form>
</body>
</html>
