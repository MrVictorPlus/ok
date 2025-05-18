1.	Какой атрибут формы отвечает за указание метода отправки данных на сервер? method 
2.	Какой суперглобальный массив используется для получения данных о загружаемых файлах? $_FILES 
3.	Какая функция полностью удаляет HTML теги из строки? strip_tags()
4.	Что может произойти, если не фильтровать пользовательские данные и сразу отобразить их на странице? Возможна XSS-атака
5.	Какой результат выполнения кода, если пользователь ввёл имя длиной 2 символа?
$name = $_POST['name'] ?? '';
if (strlen($name) < 3 || strlen($name) > 50) {
    echo 'Ошибка: неверная длина';
} else {
    echo 'Имя корректно';
}
echo 'Ошибка: неверная длина';
6.	Что выведет следующий код?
<form method="POST" action="/submit.php">
    <label><input type="checkbox" name="sports[]" value="football" checked> Футбол</label>
    <label><input type="checkbox" name="sports[]" value="basketball" checked> Баскетбол</label>
    <label><input type="checkbox" name="sports[]" value="tennis"> Теннис</label>
    <button type="submit">Отправить</button>
</form>
$sports = $_POST['sports'] ?? [];
echo implode(', ', $sports);
Футбол, Баскетбол
7.	Что произойдет при следующем вызове кода, если метод отправки формы — GET?
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "Форма отправлена методом POST";
} else {
    echo "Форма не отправлена методом POST";
}
echo "Форма не отправлена методом POST";
8.	Реализуйте скрипт, который проверяет, дал ли пользователь согласие на обработку персональных данных, поставив галочку (checkbox) в соответствующее поле.
Скрипт должен:

Проверить, что форма была отправлена методом POST.
Если это не так — выведите:
Форма не отправлена
Проверить, установлен ли флажок agree (наличие поля в $_POST и его значение 'yes').
Если флажок установлен — выведите:
Согласие получено
Если флажок не установлен — выведите:
Вы не дали согласие
Предполагаемая HTML-форма
<form method="POST">
    <input type="checkbox" name="form[agree]" value="yes"> Вы согласны?
    <button type="submit">Отправить</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "Форма не отправлена";
    exit;
}
if (isset($_POST['form']['agree']) && $_POST['form']['agree'] === 'yes') {
    echo "Согласие получено";
} else {
    echo "Вы не дали согласие";
}
9.	Что такое лейаут (layout) в контексте шаблонов? Общий каркас HTML-документа с повторяющимися элементами    
10.	Почему рекомендуется использовать htmlspecialchars() внутри шаблонов? Для предотвращения выполнения вредоносного HTML/JS
11.	Что делает функция extract($vars) в шаблонизаторе на PHP-файлах? Преобразует ключи массива в переменные
12.	Что является основным недостатком функций-компонентов в шаблонизации? Смешивание логики и представления в одной функции
13.	Какой результат выполнения следующего кода?
$products = ["Чай", "Кофе"];
$list = "<ul>";
foreach ($products as $item) {
    $list .= "<li>$item</li>";
}
$list .= "</ul>";
echo $list;
<ul><li>Чай</li><li>Кофе</li></ul>
14.	Что отобразится в браузере при выполнении следующего кода?
$title = "Главная";
require_once "header.php";
Файл header.php
<head><title><?php echo $title; ?></title></head>
15.	В чём заключается преимущество шаблонизаторов вроде Twig и Smarty по сравнению с ручными подходами? Поддержка наследования шаблонов, условий, циклов и фильтров
16.	Что такое рендеринг в контексте шаблонизации? Процесс подстановки данных в шаблон и генерация HTML
17.	Какой элемент шаблона чаще всего предназначен для повторного использования внутри страниц? Блок (или компонент)
18.	Какова основная цель шаблонизации в PHP? Отделение логики от представления
19.	Что выведет следующий код?
function renderPostCard($post) {
    return "<h2>{$post['title']}</h2>";
}
echo renderPostCard(['title' => 'Новости']);
<h2>Новости</h2>
20.	 Что выведет следующий код?
ob_start();
echo "Привет, ";
echo "мир!";
$output = ob_get_clean();
echo $output;
Привет, мир!
21.	 Напишите код для хеширования пароля $password (алгоритмом по умолчанию - bcrypt) и сохраните его в переменную $hashedPassword
Test	Input	Rezultat
echo password_verify($password, $hashedPassword) ? "true" : "false";	iLoveCookies	true


<?php
$password = 'iLoveCookies';

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
22.	Каким образом cookies позволяют сохранять состояние между HTTP-запросами? Браузер сохраняет данные и отправляет их серверу при каждом запросе
23.	Какие флаги рекомендуется устанавливать для безопасности сессионной cookie? SameSite, Secure, HttpOnly
24.	 Что обязательно нужно сделать с паролями перед сохранением в базе данных? Хешировать с помощью криптографической функции
25.	Что рекомендуется сохранять в сессии после успешной аутентификации?  Только идентификатор пользователя
26.	Почему не рекомендуется разделять сообщения об ошибках при неправильном вводе логина или пароля? Это может привести к атаке User Enumeration
27.	Что определяет процесс авторизации? Проверку прав пользователя на выполнение действий
28.	Что выведет код?
<?php
session_start();
define('SESSION_TIMEOUT', 1800);
$_SESSION['last_activity'] = time() - 2000;

if (time() - $_SESSION['last_activity'] > SESSION_TIMEOUT) {
    echo 'Сессия устарела';
} else {
    echo 'Сессия активна';
}
Сессия устарела
29.	Что выведет данный код?
<?php session_start(); $_SESSION['user'] = ['role' => 'admin']; echo isset($_SESSION['user']) ? 'Авторизован' : 'Не авторизован';
Авторизован
30.	Что будет выведено, если пользователь сделает 3 запроса?
<?php
session_start();

if (!isset($_SESSION['visits'])) {
    $_SESSION['visits'] = 0;
}
$_SESSION['visits']++;
echo "Вы посетили эту страницу {$_SESSION['visits']} раз(а)";
Вы посетили эту страницу 3 раз(а)
31.	Какое расширение обеспечивает универсальный интерфейс для работы с различными СУБД в PHP? PDO
32.	Что произойдет, если функция mysqli_connect() не сможет установить соединение с базой данных? Вернет false
33.	Что происходит при вызове метода closeCursor() на объекте PDOStatement? Освобождаются ресурсы, связанные с текущим результатом запроса
34.	Какое основное преимущество использования PDO по сравнению с MySQLi? Поддержка разных СУБД через единый интерфейс
35.	Как называется функция MySQLi для подготовки запроса с плейсхолдерами? mysqli_prepare
36.	Пусть даны две таблицы:
 
Что выведет следующий код? 2
<?php
$sql = "SELECT products.title, categories.name AS category 
        FROM products
        JOIN categories ON products.category_id = categories.id
        WHERE categories.name = 'Electronics'";
$result = mysqli_query($conn, $sql);
$items = mysqli_fetch_all($result, MYSQLI_ASSOC);
echo count($items);
37.	Дана таблица employees:**
 
Что вернет код: 3
<?php
$stmt = $pdo->prepare("SELECT COUNT(*) FROM employees WHERE department = ?");
$stmt->execute(["IT"]);
$count = $stmt->fetchColumn();
echo $count;
38.	Какое сообщение выведет данный код, если в таблице нет записи с указанным ID?
<?php

$id = 50;
$sql = "UPDATE users SET email = 'test@example.com' WHERE id = $id";
$result = mysqli_query($conn, $sql);

if (mysqli_affected_rows($conn) > 0) {
    echo 'Email обновлён';
} else {
    echo 'Ничего не обновлено';
} Ничего не обновлено
39.	Дополните пропущенную строку в файле php.ini, чтобы активировать расширение для работы с MySQL extension=mysqli
40.	База данных: Дана таблица users:
CREATE TABLE users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    email TEXT NOT NULL
);
Задание:
Дополните SQL-запрос для получения всех пользователей с именем "Ivan": SELECT * FROM users WHERE name = 'Ivan';
41.	База данных: Дана таблица users:
CREATE TABLE users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    email TEXT NOT NULL
);
Задание:
Дополните SQL-запрос для получения всех пользователей с именем "Ivan":<?php
$sql = "SELECT * FROM users WHERE name = 'Ivan'";
42.	Какой формат данных чаще всего используется для ответов в RESTful API?
JSON
43.	Что происходит, если при проектировании API игнорировать архитектурные стандарты? Появляются сложности интеграции и ошибки во взаимодействии между компонентами
44.	Что позволяет клиенту в REST понимать, в каком формате представлены данные в ответе сервера? Заголовок Content-Type
45.	Какую основную задачу выполняет API в программировании? Обеспечивает взаимодействие между программами через стандартизированные запросы и ответы
46.	Почему современная разработка часто разделяет фронтенд и бэкенд через API? Чтобы разные команды могли работать независимо друг от друга
47.	Что означает кэшируемость (Cacheable) в контексте REST? Возможность клиента использовать сохранённые ответы без повторного запроса, если сервер это разрешил
48.	Кто является автором архитектурного стиля REST? Рой Филдинг
49.	Чем веб-сервис отличается от обычного веб-приложения? Веб-сервис предназначен для взаимодействия между программами, а веб-приложение — для работы с пользователем
50.	Какой суперглобальный массив используется для получения данных из формы, отправленной методом POST? $_POST
51.	Что произойдет, если в форме отсутствует атрибут name у поля ввода?  Данные этого поля не будут отправлены на сервер.
52.	 Что произойдет, если при отправке формы методом GET данные превысят максимальную длину URL? Браузер вернет ошибку.
53.	Что делает функция filter_var($email, FILTER_VALIDATE_EMAIL)? Проверяет, корректен ли email
54.	Что делает функция htmlspecialchars()? Преобразует специальные HTML-символы в сущности
55.	Что будет выведено при выполнении следующего кода, если данные не отправлены? 
if (empty($_POST['username'])) {
    echo "Имя пользователя не указано";
}
Имя пользователя не указано
56.	Что будет выведено, если пользователь отправил форму с полем name, содержащим значение " Alice "?
$name = $_POST['name'] ?? " ";
echo trim($name);
"Alice"
57.	 Какой результат даст следующий код, если в поле age введено значение "25"?
$age = $_POST['age'] ?? '';
if (!filter_var($age, FILTER_VALIDATE_INT, ['options' => ['min_range' => 18, 'max_range' => 100]])) {
    echo 'Ошибка: возраст недопустим';
} else {
    echo 'Возраст принят';
}
Возраст принят
58.	 Реализуйте PHP-скрипт, который: Принимает данные формы с полем name=message, отправленной методом POST. Проверяет, что запрос был выполнен методом POST Если метод запроса не POST, выведите: Неверный метод запроса Иначе: Если поле message не передано или пустое, выведите: Сообщение не заполнено Иначе выведите: Сообщение отправлено: <message> HTML форму создавать не нужно.
<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "Неверный метод запроса";
} else {
    if (empty($_POST['message'])) {
        echo "Сообщение не заполнено";
    } else {
        echo "Сообщение отправлено: " . htmlspecialchars($_POST['message']);
    }
}
59.	 Реализуйте PHP-скрипт submit.php, который: Принимает поле name методом POST. Удаляет пробелы в начале и в конце (trim). Экранирует специальные символы (htmlspecialchars). Выводит строку: Имя: <значение>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['name'])) {
        $name = trim($_POST['name']);
        $name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
        echo "Имя: " . $name;
    } else {
        echo "Поле 'name' не передано.";
    }
} else {
    echo "Неверный метод запроса.";
}
60.	 Что обязательно следует сделать с конфигурационным файлом в системе контроля версий (например, Git)? Добавить его в .gitignore
61.	Что делает метод prepare() в PDO? Подготавливает SQL-запрос с плейсхолдерами для безопасной подстановки данных
62.	Что делает функция mysqli_connect_error()? Возвращает текст последней ошибки подключения
63.	Какое расширение предназначено для работы с MySQL и поддерживает как процедурный, так и объектно-ориентированный подход? Mysqli
64.	Что делает функция mysqli_stmt_execute()? Выполняет подготовленный SQL-запрос
65.	Дана таблица users:
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100)
);
Данные:

id	name	email
1	Ivan	ivan@gmail.com
2	Anna	anna@example.com
Что вернет следующий код?

<?php

$stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
$stmt->execute(["ivan@gmail.com"]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
echo $user['name'];
fetch()
66.	Что выведет данный код после успешной вставки новой записи?
<?php

$name = "Anna";
$email = "anna@example.com";
$sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo mysqli_insert_id($conn);
} else {
    echo 'Ошибка вставки';
}
(Таблица users существует, автоинкрементное поле id)
Новый ID записи
67.	Что произойдет при выполнении следующего кода, если пользователь в поле login введет admin' OR '1'='1'? 
<?php

$login = $_POST['login'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE login = '$login' AND password = '$password'";
$result = mysqli_query($connection, $query);

if (mysqli_num_rows($result) > 0) {
    echo "Welcome!";
} else {
    echo "Invalid login or password.";
}
Будет выведено "Welcome!" даже без правильного пароля
68.	Напишите код для проверки, что пользователь имеет роль admin.
Если пользователь имеет роль admin, выведите сообщение "Доступ разрешен".
Иначе завершите выполнение программы с текстом "Доступ запрещен".
<?php

session_start(); 

if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
    echo 'Доступ разрешен'; 
} else {
    exit('Доступ запрещен'); 
}
69.	Что означает, что HTTP-протокол не сохраняет состояние?
Сервер обрабатывает каждый запрос независимо и не "помнит" предыдущие запросы
70.	Какой суперглобальный массив используется для работы с данными сессии в PHP?
$_SESSION
71.	Какая функция PHP используется для явного завершения текущей сессии пользователя?
session_destroy()
72.	Что такое роль в контексте авторизации?
Статус пользователя, определяющий его права
73.	Какая функция используется для проверки соответствия пароля и хэша?
password_verify()
74.	В чём отличие роли от права?
Роль отвечает за статус пользователя, право — за конкретные действия
75.	Что выведет данный код?
<?php
session_start();
$_SESSION['user_id'] = 5;
echo isset($_SESSION['user_id']) ? 'Yes' : 'No';
Yes
76.	Что выведет данный код?
<?php

session_start();
echo session_id() === '' ? 'Нет сессии' : 'Сессия активна';
Сессия активна
77.	Что выведет данный код?
<?php
$password = 'secret';
$hash = password_hash($password, PASSWORD_DEFAULT);
echo password_verify('secret', $hash) ? ' OK ' : 'FAIL';
OK
78.	Напишите код для проверки, что пользователь имеет роль admin.
Если пользователь имеет роль admin, выведите сообщение "Доступ разрешен". Иначе завершите выполнение программы с текстом "Доступ запрещен".
<?php

session_start(); 
if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
    echo 'Доступ разрешен'; 
} else {
    exit('Доступ запрещен'); 
}
79.	Что означает термин REST в контексте API?
Representational State Transfer
80.	Какой принцип REST требует, чтобы сервер не хранил информацию о состоянии клиента между запросами?
Stateless
81.	Какой заголовок сообщает клиенту, можно ли кэшировать ответ сервера?
Cache-Control
82.	Что происходит при повторном выполнении идемпотентного запроса?
Результат будет тем же, что и при первом выполнении
83.	Что такое API операционной системы?
Набор функций для взаимодействия программ с ОС (например, работа с файлами, сетью)
84.	Как называется необязательное ограничение REST, которое позволяет серверу отправлять исполняемый код клиенту?
Code on Demand
85.	Что является важнейшей частью любого API, даже самого простого, как обмен через файл?
Строгое соглашение о формате и структуре данных
86.	Какой HTTP-метод применяется для полного обновления существующего ресурса?
PUT
1.Какой метод лучше всего использовать для фильтрации и сортировки данных на странице?
GET
2. Какой атрибут формы отключает встроенную валидацию браузера?
novalidate
3. Что произойдет, если в форме не указать атрибут `method`?
Данные отправятся методом GET по умолчанию.
4. Что может произойти, если не фильтровать пользовательские данные и сразу отобразить их на странице?
Возможна XSS-атака
5. Что делает функция htmlspecialchars()?
Преобразует специальные HTML-символы в сущности
6. Что будет выведено, если в поле name содержится строка <b>John</b>?
$name = $_POST['name'] ?? '';
echo strip_tags($name);
Răspuns:  

7. Что будет результатом выполнения следующего кода?
$errors = [
    'email' => ['Неверный email.']
];

if (!empty($errors['email'])) {
    echo $errors['email'][0];
}
Неверный email.
8. Что выведет следующий код?
<form method="POST" action="/submit.php">
    <label><input type="checkbox" name="hobbies[]" value="футбол" checked> Футбол</label>
    <label><input type="checkbox" name="hobbies[]" value="баскетбол" checked> Баскетбол</label>
    <label><input type="checkbox" name="hobbies[]" value="теннис"> Теннис</label>
    <button type="submit">Отправить</button>
</form>
$hobbies = $_POST['hobbies'] ?? [];
echo implode(', ', $hobbies);
футбол, баскетбол
9. Какой суперглобальный массив используется для получения данных о загружаемых файлах?
$_FILES


10. Какой суперглобальный массив используется для получения данных из формы, отправленной методом POST?
$_POST
11. Какой метод отправки данных рекомендуется использовать для передачи больших объемов информации и файлов?
POST
12. Что делает функция filter_var($email, FILTER_VALIDATE_EMAIL)?
Проверяет, корректен ли email
13. Что делает is_numeric()?
Проверяет, является ли значение числом
14. Что будет выведено при выполнении следующего кода, если данные не отправлены?
if (empty($_POST['username'])) {
    echo "Имя пользователя не указано";
}
Имя пользователя не указано
15. Что выведет следующий код?
<form method="POST" action="/submit.php">
    <select name="country">
        <option value="md" selected>Молдова</option>
        <option value="us">США</option>
        <option value="fr">Франция</option>
    </select>
    <button type="submit">Отправить</button>
</form>
$country = $_POST['country'] ?? 'Не указано';
echo "Страна: $country";
Страна: md
16. Что произойдет при следующем вызове кода, если метод отправки формы — GET?
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "Форма отправлена методом POST";
} else {
    echo "Форма не отправлена методом POST";
}
Форма не отправлена методом POST
17. Реализуйте PHP-скрипт, который:
1.	Принимает данные формы с полем name=message, отправленной методом POST.
2.	Проверяет, что запрос был выполнен методом POST
3.	Если метод запроса не POST, выведите: Неверный метод запроса
4.	Иначе:
o	Если поле message не передано или пустое, выведите: Сообщение не заполнено
o	Иначе выведите: Сообщение отправлено: <message>
________________________________________
•	HTML форму создавать не нужно.
<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo 'Неверный метод запроса';
    exit;
}

if (empty($_POST['message'])) {
    echo 'Сообщение не заполнено';
    exit;
}

echo 'Сообщение отправлено: ' . $_POST['message'];
?>
18. Реализуйте PHP-скрипт submit.php, который:
1.	Принимает данные формы, отправленные методом POST.
2.	Ожидает получение массива hobbies[] — значений, выбранных пользователем через флажки (checkbox).
3.	Скрипт должен:
o	Проверить, была ли форма отправлена.
o	Проверить, был ли передан массив $_POST['hobbies'].
o	Если массив пуст, вывести: Нет интересов
o	Если массив содержит хотя бы одно значение, вывести: Интересы: <перечисление через запятую, без пробелов>
<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit;
}
if (empty($_POST['hobbies']) || !is_array($_POST['hobbies'])) {
    echo 'Нет интересов';
    exit;
}
echo 'Интересы: ' . implode(',', $_POST['hobbies']);
?>
19. Почему рекомендуется использовать `htmlspecialchars()` внутри шаблонов?
Для предотвращения выполнения вредоносного HTML/JS
20. Какой элемент шаблона чаще всего предназначен для повторного использования внутри страниц?
Блок (или компонент)
21. Что является основным недостатком функций-компонентов в шаблонизации?
Смешивание логики и представления в одной функции
22. В чём заключается преимущество шаблонизаторов вроде Twig и Smarty по сравнению с ручными подходами?
Поддержка наследования шаблонов, условий, циклов и фильтров
23. Что выведет следующий код?
function renderPostCard($post) {
    return "<h2>{$post['title']}</h2>";
}

echo renderPostCard(['title' => 'Новости']);
<h2>Новости</h2>
24. Что выведет следующий код?
ob_start();
echo "Привет, ";
echo "мир!";
$output = ob_get_clean();
echo $output;
Привет, мир!
25. В каком случае шаблон layout используется наиболее эффективно?
Когда нужно задать общий каркас для всех страниц сайта
26. Что такое лейаут (layout) в контексте шаблонов?
Общий каркас HTML-документа с повторяющимися элементами
27. Что происходит при вызове ob_get_clean() после ob_start()?
Получаем содержимое буфера и очищаем его
28. Что делает функция `extract($vars)` в шаблонизаторе на PHP-файлах?
Преобразует ключи массива в переменные
29. Каков результат выполнения?
$posts = [
  ["title" => "Первая", "excerpt" => "..."],
  ["title" => "Вторая", "excerpt" => "..."]
];

foreach ($posts as $post) {
  echo renderTemplate("post.php", ["post" => $post]);
}
Файл post.php
<article><?= htmlspecialchars($post['title']) ?></article>
<article>Первая</article><article>Вторая</article>
30. Что выведет следующий код?
$template = "<p>{{greeting}}, {{name}}!</p>";
$html = str_replace(
    ["{{greeting}}", "{{name}}"],
    ["Здравствуйте", "Анна"],
    $template
);
echo $html;
<p>Здравствуйте, Анна!</p>
31. Что такое рендеринг в контексте шаблонизации?
Процесс подстановки данных в шаблон и генерация HTML
32. Какова основная цель шаблонизации в PHP?
Отделение логики от представления
33. Какой результат выполнения следующего кода?
$products = ["Чай", "Кофе"];
$list = "<ul>";
foreach ($products as $item) {
    $list .= "<li>$item</li>";
}
$list .= "</ul>";
echo $list;
<ul><li>Чай</li><li>Кофе</li></ul>
34. Что отобразится в браузере при выполнении следующего кода?
$title = "Главная";
require_once "header.php";
Файл header.php
<head><title><?php echo $title; ?></title></head>
<head><title>Главная</title></head>
35. Что произойдёт при выполнении кода?
$template = "Добро пожаловать, {{USERNAME}}!";
$data = ["username" => "Алексей"];

foreach ($data as $key => $value) {
    $placeholder = '{{' . strtoupper($key) . '}}';
    $template = str_replace($placeholder, $value, $template);
}
echo $template;
Добро пожаловать, Алексей!
36. Что возвращает метод `lastInsertId()` в PDO?
Идентификатор последней вставленной записи
37. Что произойдет при успешном выполнении функции mysqli_query() с запросом типа INSERT?
Вернется true
38. Какие действия необходимо выполнить для правильной подготовки PHP-окружения к работе с базами данных?
Активировать необходимые расширения

Рекомендуется настроить кодировку данных в БД
39. Какой параметр конфигурации рекомендуется установить для корректной работы с Unicode-данными?
default_charset = "UTF-8"
40. Что обязательно следует сделать с конфигурационным файлом в системе контроля версий (например, Git)?
Добавить его в .gitignore
41. Пусть даны две таблицы:
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT,
    title VARCHAR(100),
    price DECIMAL(10,2),
    FOREIGN KEY (category_id) REFERENCES categories(id)
);
Данные в таблицах:
categories
id	name
1	Electronics
2	Furniture
products
id	category_id	title	price
1	1	Laptop	1200.00
2	1	Smartphone	800.00
3	2	Chair	150.00
________________________________________
Что выведет следующий код?
<?php

$sql = "SELECT products.title, categories.name AS category 
        FROM products
        JOIN categories ON products.category_id = categories.id
        WHERE categories.name = 'Electronics'";

$result = mysqli_query($conn, $sql);

$items = mysqli_fetch_all($result, MYSQLI_ASSOC);

echo count($items);
?>
Răspuns: 6 întrebare
 42. Дана таблица users:
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100)
);
Данные:
id	name	email
1	Ivan	ivan@gmail.com
2	Anna	anna@example.com
________________________________________
Что вернет следующий код?
<?php

$stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
$stmt->execute(["ivan@gmail.com"]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
echo $user['name'];
Răspuns: 7 întrebare
43. Что выведет следующий код при успешном подключении к базе данных?
<?php

$conn = mysqli_connect('localhost', 'root', '', 'my_database');
if (!$conn) {
    die('Ошибка подключения: ' . mysqli_connect_error());
}
echo 'Успешное подключение';
Успешное подключение
44. База данных:
Дана таблица payments:
CREATE TABLE payments (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    amount REAL NOT NULL,
    date TEXT NOT NULL
);
Задание:
Напишите код для выбора всех платежей с суммой больше заданной: $minAmount.
Сохраните суммы платежей в переменной $payments в порядке возрастания.
Если платежи не найдены, то выведите на экран строку "Not found".
Обязательно защититесь от SQL-инъекций.
________________________________________
•	Используйте переменную $db — подключение к базе данных.
•	Переменные $db, $minAmount объявлять не надо.
De exemplu:
Test	Input	Rezultat
print_r($payments);	200	Array
(
    [0] => 200.75
    [1] => 400.5
)
<?php

// Выполняем SQL-запрос с защитой от SQL-инъекций
$sql = "SELECT amount FROM payments WHERE amount > :minAmount ORDER BY amount ASC";

// Подготавливаем запрос
$stmt = $db->prepare($sql);

// Привязываем параметр
$stmt->bindParam(':minAmount', $minAmount, PDO::PARAM_STR);

// Выполняем запрос
$stmt->execute();

// Получаем все данные
$payments = $stmt->fetchAll(PDO::FETCH_COLUMN);

// Если платежи найдены, выводим их
if (count($payments) > 0) {
    print_r($payments);
} else {
    // Если платежи не найдены
    echo "Not found";
}

?>
45. База данных:
Дана таблица products:
CREATE TABLE products (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    title TEXT NOT NULL,
    price REAL NOT NULL
);
Задание:
Напишите SQL-запрос для добавления нового товара: Название: "Phone", Цена: 799.99
De exemplu:
Test	Rezultat
$arr = Database::select($db, "select * from products");
print_r($arr[0]);	Array
(
    [id] => 1
    [title] => Phone
    [price] => 799.99
)
<?php

// SQL запрос для добавления товара
$sql = "INSERT INTO products (title, price) VALUES ('Phone', 799.99)";

// Выполнение запроса с использованием PDO
$stmt = $db->prepare($sql);

// Выполнение запроса
$stmt->execute();

// Проверка результата с помощью SELECT для получения данных
$arr = Database::select($db, "SELECT * FROM products");

// Вывод результата для проверки
print_r($arr[0]);

?>
46. Почему данные для подключения к базе данных нельзя оставлять в открытом виде?
Это чувствительная информация, которая может быть использована злоумышленниками
47. Какое основное преимущество использования PDO по сравнению с MySQLi?
Поддержка разных СУБД через единый интерфейс
48. Что произойдет, если функция mysqli_connect() не сможет установить соединение с базой данных?
Вернет false
49. Как называется функция MySQLi для подготовки запроса с плейсхолдерами?
Предположим, в базе данных есть таблица users со следующими полями:
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    email VARCHAR(100)
);
50.Что выведет следующий код, если в таблице есть три записи?
<?php

$sql = "SELECT id, name FROM users";
$result = mysqli_query($conn, $sql);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
echo count($users);
3
51. Что произойдет при выполнении следующего кода, если пользователь в поле login введет admin' OR '1'='1'?
<?php

$login = $_POST['login'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE login = '$login' AND password = '$password'";
$result = mysqli_query($connection, $query);

if (mysqli_num_rows($result) > 0) {
    echo "Welcome!";
} else {
    echo "Invalid login or password.";
}
Будет выведено "Welcome!" даже без правильного пароля
52. Дана таблица clients:
CREATE TABLE clients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE
);
Данные:
id	name	email
1	Alice	alice@example.com
Что произойдет при выполнении кода:
<?php
$stmt = $pdo->prepare("INSERT INTO clients (name, email) VALUES (?, ?)");
$stmt->execute(["Bob", "alice@example.com"]);
?>
(Режим PDO::ERRMODE_EXCEPTION установлен)
Будет выброшено исключение о нарушении уникальности
53. Что делает функция mysqli_connect_error()?
Возвращает текст последней ошибки подключения
54. Что произойдет при ошибке подключения в режиме PDO::ERRMODE_EXCEPTION?
Будет выброшено исключение PDOException
55. Какая программа используется для управления базами данных MySQL через графический интерфейс в составе XAMPP?
phpMyAdmin
56. Какой самый надежный способ защиты от SQL-инъекций?
Использование подготовленных выражений (prepared statements)
57. Что возвращает функция mysqli_fetch_all($result, MYSQLI_ASSOC)?
Массив, в котором каждый элемент представлен как ассоциативный массив, где ключи - название столбов таблицы
58. Какое сообщение выведет данный код, если в таблице нет записи с указанным ID?
<?php

$id = 50;
$sql = "UPDATE users SET email = 'test@example.com' WHERE id = $id";
$result = mysqli_query($conn, $sql);

if (mysqli_affected_rows($conn) > 0) {
    echo 'Email обновлён';
} else {
    echo 'Ничего не обновлено';
}
Ничего не обновлено
59. Пусть есть таблица:
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(50) NOT NULL,
    password VARCHAR(100) NOT NULL
);
В таблице есть данные:
id	login	password
1	admin	123456
2	user1	pass1
________________________________________
60.Что произойдет при выполнении следующего кода, если пользователь введет в поле login значение admin' --?
<?php

$login = $_POST['login'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE login = '$login' AND password = '$password'";
$result = mysqli_query($conn, $query);
Будет проигнорировано условие проверки пароля
61. Что выведет данный код после успешной вставки новой записи?
<?php

$name = "Anna";
$email = "anna@example.com";
$sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo mysqli_insert_id($conn);
} else {
    echo 'Ошибка вставки';
}
(Таблица users существует, автоинкрементное поле id)
Новый ID записи
62. Какие флаги рекомендуется устанавливать для безопасности сессионной cookie?
HttpOnly
Secure
SameSite
63. Что означает, что HTTP-протокол не сохраняет состояние?
Сервер автоматически запоминает пользователя при каждом новом запросе
64. Что обязательно нужно делать с паролями перед сохранением в базе данных?
Хешировать с помощью криптографической функции
65. Что определяет процесс авторизации?
Подтверждение личности пользователя
66. Какая функция используется для проверки соответствия пароля и хэша?
password_verify()
67.Какие алгоритмы хеширования считаются рекомендуемыми для паролей?
bcrypt
68. Что выведет код?
<?php

session_start();
define('SESSION_TIMEOUT', 1800);
$_SESSION['last_activity'] = time() - 2000;

if (time() - $_SESSION['last_activity'] > SESSION_TIMEOUT) {
    echo 'Сессия устарела';
} else {
    echo 'Сессия активна';
}
Сессия устарела
69. Что выведет данный код?
<?php

session_start();

echo session_id() === '' ? 'Нет сессии' : 'Сессия активна';
Сессия активна
70. Что выведет данный код?
<?php

session_start();
$_SESSION['auth'] = true;
unset($_SESSION['auth']);
echo empty($_SESSION['auth']) ? 'Не авторизован' : 'Авторизован';
Не авторизован


