<?php

class Posts
{
    public static function add($titel, $inhoud)
    {
        include('../includes/db.php');
        $sql = "INSERT INTO posts SET titel = ?, inhoud = ?";

        try
        {
            $stmt = $connection->prepare($sql);
            $stmt->execute([$titel, $inhoud]);
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
            die;
        }

        return true;
    }

    public static function update($id, $titel, $inhoud)
    {
        include('../includes/db.php');
        $sql = "UPDATE artikels SET titel = ?, inhoud = ? WHERE id = ?";

        try
        {
            $stmt = $connection->prepare($sql);

            $stmt->bindParam(1, $titel, PDO::PARAM_STR);
            $stmt->bindParam(2, $inhoud, PDO::PARAM_STR);
            $stmt->bindParam(3, $id, PDO::PARAM_INT);
            
            $stmt->execute();
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
            die();
        }

        return true;

    }

    public static function get()
    {
        include('../includes/db.php');
        $query = $connection->prepare('SELECT * FROM posts');
        $query->execute();

        return $query->fetchAll();
    }

    public static function getOne($id)
    {
        include('../includes/db.php');
        $sql = "SELECT * FROM artikels where id = ?";

        try
        {
            $stmt = $connection->prepare($sql);
            $stmt->execute([$id]);
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
            die();
        }

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function delete($id)
    {
        include('../includes/db.php');
        $sql = "DELETE FROM artikels where id = ?";

        try
        {
            $stmt = $connection->prepare($sql);
            $stmt->execute([$id]);
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
            die();
        }

        return true;
    }
}