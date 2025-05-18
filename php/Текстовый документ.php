1.
Создайте таблицу books следующей структуры.
Используйте следующий SQL-запрос в своем коде
CREATE TABLE IF NOT EXISTS books (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    user_name TEXT NOT NULL,
    title TEXT NOT NULL,
    author TEXT NOT NULL,
    year INTEGER NOT NULL
);

<?php

$sql="
CREATE TABLE IF NOT EXISTS books (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    user_name TEXT NOT NULL,
    title TEXT NOT NULL,
    author TEXT NOT NULL,
    year INTEGER NOT NULL
);";
$pdo->query($sql);



2.
3. Реализация функций
В рамках выполнения задания необходимо реализовать следующие функции:
3.1. Функция обработки формы
Описание:
handleForm должна выполнять следующую последовательность действий:
Проверить, была ли отправлена форма методом POST. Иначе вывести сообщение: "Форма не отправлена".
Выполнить валидацию введённых данных:
Проверить, что все поля заполнены.
Убедиться, что поле year является целым числом.
Проверить, что year больше 0.
Проверить, что year не превышает текущий год.
В случае ошибки валидации:
Вывести соответствующее сообщение об ошибке:
Если не все поля заполнены: "Пожалуйста, заполните все поля"
Если year не является целым числом: "Год издания должен быть целым числом"
Если year меньше 1: "Год издания должен быть больше 0"
Если year больше текущего года: "Год издания не может быть больше текущего года"
Каждое сообщение об ошибке должно быть выведено в отдельной строке.
Если есть ошибки, завершить выполнение функции и не добавлять книгу в базу данных.
В случае успешной валидации:
Добавить книгу в базу данных.
Вывести сообщение: "Книга успешно добавлена"
function handleForm(PDO $pdo): void {

$errors = [];
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user_name = $_POST['user_name'] ?? 'Нет данных';
    $title = $_POST['title'] ?? 'Нет данных';
    $author = $_POST['author'] ?? 'Нет данных';
    $year = $_POST['year'] ?? 'Нет данных';


    if (empty($user_name) < 0 || empty($title) < 0 || empty($author) < 0 || empty($year) < 0) {
        $errors[] = "Пожалуйста, заполните все поля";
    } 

    if (!filter_var($year, FILTER_VALIDATE_INT)) {
        $errors[] = "Год издания должен быть целым числом";
    }

    if ($year < 1) {
        $errors[] = "Год издания должен быть больше 0";
    }

    if ($year > date("Y")){
        $errors[] = "Год издания не может быть больше текущего года";
    }

    if (!empty($errors)) {
        foreach($errors as $error) {
            echo $error."<br>";
        }
        exit;
    } else {
        $stmt = $pdo->prepare("INSERT INTO books (user_name, title, author, year) VALUES (:user_name, :title, :author, :year)");
        $stmt->execute([
            ':user_name' => $user_name,
            ':title' => $title,
            ':author' => $author,
            ':year' => $year
        ]);
        echo "Книжка успешно добавлена";
    }

} else {
    echo "Форма не отправлена";
}



3.
3.2. Функция добавления книги
Реализуйте функцию:
Функция должна:
Добавлять новую запись в таблицу books
Возвращать true в случае успешной вставки, либо false в случае ошибки.

function addBook(PDO $pdo, string $userName, string $title, string $author, int $year): bool {
    $stmt = $pdo->prepare("INSERT INTO books (user_name, title, author, year) VALUES (:user_name, :title, :author, :year)");
    return $stmt->execute([
        ':user_name' => $userName, 
        ':title' => $title, 
        ':author' => $author, 
        ':year' => $year
    ]);
}



3.3. Функция получения списка книг по автору
Реализуйте функцию:
Функция должна:
Выполнять выборку всех книг, добавленных автором, имя которого передаётся в параметре.
Возвращать массив книг в формате ассоциативных массивов.
Если книг нет, возвращать пустой массив.
function getBooksByAuthor(PDO $pdo, string $author): array {
    $stmt = $pdo->prepare("SELECT * FROM books WHERE author = :author");
    $stmt->execute([
        ':author' => $author
    ]);
    $getBooks = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $getBooks ?: [];
}

3.4. Функция удаления книги
Реализуйте функцию:
Функция должна:

Удалять книгу из базы данных по её идентификатору.
Возвращать true в случае успешного удаления, либо false в случае ошибки или если книга не найдена.

function deleteBook(PDO $pdo, int $bookId): bool {
    $stmt = $pdo->prepare("DELETE from books WHERE id = :id");
    $stmt->execute([':id' => $bookId]);
    
    return ($stmt->rowCount() > 0 );
};