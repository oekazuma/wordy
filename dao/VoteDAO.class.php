<?php
/**
 * Class VoteDAO.
 */
class VoteDAO
{
    private $db;

    /**
     * VoteDAO constructor.
     *
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $this->db = $db;
    }

    public function findByVote($vote)
    {
        $sql = 'SELECT * FROM votes WHERE word = :word AND userId = :userId';
        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':word', $vote->getWord(), PDO::PARAM_STR);
        $stmt->bindValue(':userId', $vote->getUserId(), PDO::PARAM_INT);

        $result = $stmt->execute();

        $votes = null;

        if ($result && $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $word = $row['word'];
            $userId = $row['userId'];
            $vote = $row['vote'];

            $votes = new Vote();
            $votes->setId($id);
            $votes->setWord($word);
            $votes->setUserId($userId);
            $votes->setVote($vote);
        }

        return $votes;
    }

    public function insert($vote)
    {
        $sql = 'INSERT INTO votes (word, userId, vote) VALUES (:word, :userId, :vote)';
        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':word', $vote->getWord(), PDO::PARAM_STR);
        $stmt->bindValue(':userId', $vote->getUserId(), PDO::PARAM_INT);
        $stmt->bindValue(':vote', $vote->getVote(), PDO::PARAM_STR);

        $result = $stmt->execute();

        $id = 0;

        if ($result) {
            $id = $this->db->lastInsertId();
        }

        return $id;
    }
}
