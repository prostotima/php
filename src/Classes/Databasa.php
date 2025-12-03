<?php

namespace Classes;

use PDO;
use PDOException;

class Database
{
    /** @var PDO|null */
    private static ?PDO $connection = null;

    /**
     * Створює підключення до бази даних (MySQL або SQLite).
     *
     * @return PDO
     */
    public static function createConnection(): PDO
    {
        if (self::$connection === null) {
            try {

                self::$connection = new PDO($dsn, $user, $pass);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch (PDOException $e) {
                die("Помилка підключення: " . $e->getMessage());
            }
        }

        return self::$connection;
    }

    /**
     * Перевіряє користувача у таблиці Users
     * (використовується для авторизації)
     *
     * @param string $username
     * @param string $password
     * @return array|null
     */
    public static function selectUser(string $username, string $password): ?array
    {
        $pdo = self::createConnection();

        $sql = "SELECT * FROM Users WHERE username = :username AND password = :password";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':username' => $username,
            ':password' => $password
        ]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user ?: null;
    }

    /**
     * Створює нового користувача (реєстрація)
     *
     * @param string $username
     * @param string $password
     * @return bool
     */
    public static function insertUser(string $username, string $password): bool
    {
        $pdo = self::createConnection();

        $sql = "INSERT INTO Users (username, password) VALUES (:username, :password)";
        $stmt = $pdo->prepare($sql);

        return $stmt->execute([
            ':username' => $username,
            ':password' => $password
        ]);
    }
}
