<?php
/**
 * Class FavoriteDAO.
 */
class FavoriteDAO
{
    private $db;

    /**
     * FavoriteDAO constructor.
     *
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $this->db = $db;
    }

    public function findByFav($ster)
    {
        $sql = 'SELECT * FROM favorite WHERE word = :word AND userId = :userId';
        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':word', $ster->getWord(), PDO::PARAM_STR);
        $stmt->bindValue(':userId', $ster->getUserId(), PDO::PARAM_INT);

        $result = $stmt->execute();

        $sters = null;

        if ($result && $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $word = $row['word'];
            $userId = $row['userId'];

            $sters = new Vote();
            $sters->setId($id);
            $sters->setWord($word);
            $sters->setUserId($userId);
        }

        return $sters;
    }

    public function insert($ster)
    {
        $sql = 'INSERT INTO favorite (word, userId) VALUES (:word, :userId)';
        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':word', $ster->getWord(), PDO::PARAM_STR);
        $stmt->bindValue(':userId', $ster->getUserId(), PDO::PARAM_INT);

        $result = $stmt->execute();

        $id = 0;

        if ($result) {
            $id = $this->db->lastInsertId();
        }

        return $id;
    }

    public function delete($ster)
    {
        $sql = 'DELETE FROM favorite WHERE word = :word AND userId = :userId';
        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':word', $ster->getWord(), PDO::PARAM_STR);
        $stmt->bindValue(':userId', $ster->getUserId(), PDO::PARAM_INT);

        $result = $stmt->execute();

        return $result;
    }
}
