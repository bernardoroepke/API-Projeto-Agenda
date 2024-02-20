<?php
namespace App\Models;

class User {
    private static $table = 'users';

    public static function select(int $id) {
        $conn = new \PDO(DBDRIVE.':host='.DBHOST.'; dbname='.DBNAME, DBUSER, DBPASS);
        $sql = 'SELECT * FROM '.self::$table.' WHERE id = :id';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } else {
            throw new \Exception("Nenhum usuário encontrado!");
        }

    }

    public static function selectByEmail(string $email) {
        $conn = new \PDO(DBDRIVE.':host='.DBHOST.'; dbname='.DBNAME, DBUSER, DBPASS);
        $sql = 'SELECT * FROM '.self::$table.' WHERE email = :email';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } else {
            throw new \Exception("Nenhum usuário encontrado!");
        }

    }

    public static function selectAll() {
        $conn = new \PDO(DBDRIVE.':host='.DBHOST.'; dbname='.DBNAME, DBUSER, DBPASS);
        $sql = 'SELECT * FROM '.self::$table;
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            throw new \Exception("Nenhum usuário encontrado!");
        }

    }
    
    public static function insert($data) {
        $conn = new \PDO(DBDRIVE.':host='.DBHOST.'; dbname='.DBNAME, DBUSER, DBPASS);
        $sql = 'INSERT INTO '.self::$table.' (name, password, email) VALUES (:name, :password, :email)';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':name', $data['name']);
        $stmt->bindValue(':password', $data['password']);
        $stmt->bindValue(':email', $data['email']);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return 'Usuário inserido com sucesso!';
        } else {
            throw new \Exception("Falha ao criar usuário!");
        }

    }

    public static function update($data) {
        $conn = new \PDO(DBDRIVE.':host='.DBHOST.'; dbname='.DBNAME, DBUSER, DBPASS);
        $sql = 'UPDATE '.self::$table.' SET name = :name, password = :password, email = :email WHERE id = :id';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':name', $data['name']);
        $stmt->bindValue(':password', $data['password']);
        $stmt->bindValue(':email', $data['email']);
        $stmt->bindValue(':id', $data['id']);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return 'Usuário deletado com sucesso!';
        } else {
            throw new \Exception("Falha ao deletar usuário!");
        }

    }

    public static function delete($id) {
        $conn = new \PDO(DBDRIVE.':host='.DBHOST.'; dbname='.DBNAME, DBUSER, DBPASS);
        $sql = 'DELETE FROM '.self::$table.' WHERE id = :id';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return 'Usuário deletado com sucesso!';
        } else {
            throw new \Exception("Falha ao deletar usuário!");
        }

    }
}