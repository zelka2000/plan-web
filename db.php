<?php
class Database {
    private $host = 'localhost';  // Хост базы данных
    private $username = 'root';   // Имя пользователя базы данных
    private $password = '';       // Пароль
    private $dbname = 'plan_web'; // Имя базы данных

    private $connection;

    // Конструктор для подключения
    public function __construct() {
        $this->connect();
    }

    // Метод для установления соединения с базой данных
    private function connect() {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->dbname);

        // Проверка на ошибки соединения
        if ($this->connection->connect_error) {
            die("Ошибка подключения: " . $this->connection->connect_error);
        }
    }

    // Метод для выполнения SQL-запросов (например, SELECT, INSERT и т.д.)
    public function query($sql) {
        $result = $this->connection->query($sql);

        if ($this->connection->error) {
            echo "Ошибка запроса: " . $this->connection->error;
            return false;
        }

        return $result;
    }
}
?>