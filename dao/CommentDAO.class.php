<?php

class CommentDAO
{
    private $db;

    /**
     * CommentDAO constructor.
     *
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $this->db = $db;
    }

    public function findByPK($word)
    {
        $sql = 'SELECT * FROM comment WHERE word = :word AND disp = 1';
        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':word', $id, PDO::PARAM_INT);

        $result = $stmt->execute();

        $comment = null;

        if ($result && $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $userId = $row['userId'];
            $word = $row['word'];
            $comment = $row['comment'];
            $created_at = $row['created_at'];
            $disp = $row['disp'];

            $comment = new Comment();
            $comment->setId($id);
            $comment->setUserId($userId);
            $comment->setWord($word);
            $comment->setComment($comment);
            $comment->setCreatedAt($created_at);
            $comment->setDisp($disp);
        }

        return $comment;
    }

    public function insert($comment)
    {
        $sqlInsert = 'INSERT INTO comment (userId, word, comment, created_at, disp) VALUES (:userId, :word, :comment, :created_at, :disp)';
        $stmt = $this->db->prepare($sqlInsert);

        $stmt->bindValue(':userId', $comment->getUserId(), PDO::PARAM_INT);
        $stmt->bindValue(':word', $comment->getWord(), PDO::PARAM_INT);
        $stmt->bindValue(':comment', $comment->getComment(), PDO::PARAM_STR);
        $stmt->bindValue(':created_at', $comment->getCreatedAt(), PDO::PARAM_STR);
        $stmt->bindValue(':disp', $comment->getDisp(), PDO::PARAM_INT);

        $result = $stmt->execute();

        $id = 0;

        if ($result) {
            $id = $this->db->lastInsertId();
        }

        return $id;
    }


    public function delete($id)
    {
        $sql = 'UPDATE comment SET disp = 0 WHERE id = :id';
        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(":id", $id, PDO::PARAM_INT);

        $result = $stmt->execute();

        return $result;
    }

    public function count($word) {
        $sql = 'SELECT COUNT(*) AS count FROM comment WHERE word = :word AND disp = 1';

        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(":word", $word, PDO::PARAM_INT);

        $result = $stmt->execute();

        if($result && $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $rowCount = $row["count"];
        }

        return $rowCount;
    }

    public function commentRow($word,$limit,$offset) {
        $sql = 'SELECT comment.id, name, comment, created_at FROM ( comment INNER JOIN users) WHERE word = :word AND disp = 1 AND comment.userId = users.id ORDER BY created_at DESC LIMIT :limit OFFSET :offset';


        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(":word", $word, PDO::PARAM_INT);
        $stmt->bindValue(":limit", $limit, PDO::PARAM_INT);
        $stmt->bindValue(":offset", $offset, PDO::PARAM_INT);

        $result = $stmt->execute();

        $commentList = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $name = $row['name'];
            $comment = $row['comment'];
            $created_at = $row['created_at'];

            $comments = new Comment();
            $comments->setId($id);
            $comments->setName($name);
            $comments->setComment($comment);
            $comments->setCreatedAt($created_at);

            $commentList[] = $comments;
        }

        return $commentList;
    }

}
