<?php
/**
 * Created by PhpStorm.
 * User: Dam-Hoon
 * Date: 27.10.2014
 * Time: 19:54
 * Description: Post Class with Row Data Gateway Pattern
 */

class Post_RDG extends Post
{

    public function setupConnection()
    {
        $dsn = "mysql:host=localhost;dbname=loc_orm";
        $user = "loc_orm";
        $password = "12341234";
        try {
            $this ->pdo = new PDO($dsn, $user, $password);
            return $this->pdo;
        } catch (PDOException $p) {
            echo "Es konnte keine Verbindung hergestellt werden.";
        }
    }

    public function findByID($id)
    {
        $sql = "SELECT * FROM tbl_person WHERE id=?";
        $pdo = $this ->setupConnection();
        $stmt = $pdo-> prepare($sql);
        $stmt -> bindParam(1, $id);
        $stmt -> execute();
        $result = $stmt->fetch();

        return $result;
    }

    public function insert()
    {
        $stmt = $this->setupConnection()->prepare('INSERT INTO tbl_person(title,content,created) VALUES (:title,:content,:created)');

        $stmt->bindValue(':title', $this->getTitle());
        $stmt->bindValue(':content', $this->getContent());
        $stmt->bindValue(':created', $this->getCreated());

        $stmt->execute();
    }

    public function update()
    {
        $stmt = $this->setupConnection()->prepare('UPDATE tbl_person SET title=:title ,content=:content,created:created');

        $stmt->bindValue(':title', $this->getTitle());
        $stmt->bindValue(':content', $this->getContent());
        $stmt->bindValue(':created', $this->getCreated());

        $stmt->execute();
    }

    public function delete()
    {
        $stmt = $this->setupConnection()->prepare('DELETE FROM tbl_person WHERE id=:id');

        $stmt->bindValue(':id', $this->getId());

        $stmt->execute();
    }


}

?>