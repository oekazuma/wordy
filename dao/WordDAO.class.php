<?php

class WordDAO
{
    private $db;

    /**
     * WordDAO constructor.
     *
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $this->db = $db;
    }

    /**
     * findByPK.
     *
     * @param $id
     *
     * @return null|Word
     */
    public function findByPK($id)
    {
        $sql = 'SELECT * FROM words WHERE id = :id';
        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        $result = $stmt->execute();

        $words = null;

        if ($result && $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $word = $row['word'];
            $read1 = $row['read1'];
            $read2 = $row['read2'];
            $read3 = $row['read3'];
            $read4 = $row['read4'];
            $read1_points = $row['read1_points'];
            $read2_points = $row['read2_points'];
            $read3_points = $row['read3_points'];
            $read4_points = $row['read4_points'];
            $createdAt = $row['created_at'];
            $userid = $row['userid'];

            $words = new Word();
            $words->setId($id);
            $words->setWord($word);
            $words->setRead1($read1);
            $words->setRead2($read2);
            $words->setRead3($read3);
            $words->setRead4($read4);
            $words->setReadPoints1($read1_points);
            $words->setReadPoints2($read2_points);
            $words->setReadPoints3($read3_points);
            $words->setReadPoints4($read4_points);
            $words->setCreatedAt($createdAt);
            $words->setUserId($userid);
        }

        return $words;
    }

    public function findByWord($word)
    {
        $sql = 'SELECT * FROM words WHERE word = :word';
        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':word', $word, PDO::PARAM_STR);

        $result = $stmt->execute();

        $words = null;

        if ($result && $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $word = $row['word'];
            $read1 = $row['read1'];
            $read2 = $row['read2'];
            $read3 = $row['read3'];
            $read4 = $row['read4'];
            $read1_points = $row['read1_points'];
            $read2_points = $row['read2_points'];
            $read3_points = $row['read3_points'];
            $read4_points = $row['read4_points'];
            $createdAt = $row['created_at'];
            $userid = $row['userid'];

            $words = new Word();
            $words->setId($id);
            $words->setWord($word);
            $words->setRead1($read1);
            $words->setRead2($read2);
            $words->setRead3($read3);
            $words->setRead4($read4);
            $words->setReadPoints1($read1_points);
            $words->setReadPoints2($read2_points);
            $words->setReadPoints3($read3_points);
            $words->setReadPoints4($read4_points);
            $words->setCreatedAt($createdAt);
            $words->setUserId($userid);
        }

        return $words;
    }

    /**
     * findAll.
     *
     * @return array
     */
    public function findAll()
    {
        $sql = 'SELECT * FROM words';
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute();

        $wordList = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $word = $row['word'];
            $read1 = $row['read1'];
            $read2 = $row['read2'];
            $read3 = $row['read3'];
            $read4 = $row['read4'];
            $read1_points = $row['read1_points'];
            $read2_points = $row['read2_points'];
            $read3_points = $row['read3_points'];
            $read4_points = $row['read4_points'];
            $createdAt = $row['created_at'];
            $userid = $row['userid'];

            $words = new Words();
            $words->setId($id);
            $words->setWord($word);
            $words->setRead1($read1);
            $words->setRead2($read2);
            $words->setRead3($read3);
            $words->setRead4($read4);
            $words->setReadPoints1($read1_points);
            $words->setReadPoints2($read2_points);
            $words->setReadPoints3($read3_points);
            $words->setReadPoints4($read4_points);
            $words->setCreatedAt($createdAt);
            $words->setUserId($userid);

            $wordList[$id] = $words;
        }

        return $wordList;
    }

    /**
     * insert.
     *
     * @param Words $words
     *
     * @return int|string
     */
    public function insert($words)
    {
        $sqlInsert = 'INSERT INTO words (word, read1, read2, read3, read4, read1_points, read2_points, read3_points, read4_points, created_at, userid) VALUES (:word, :read1, :read2, :read3, :read4, :read1_points, :read2_points, :read3_points, :read4_points, :created_at, :userid)';
        $stmt = $this->db->prepare($sqlInsert);

        $stmt->bindValue(':word', $words->getWord(), PDO::PARAM_STR);
        $stmt->bindValue(':read1', $words->getRead1(), PDO::PARAM_STR);
        $stmt->bindValue(':read2', $words->getRead2(), PDO::PARAM_STR);
        $stmt->bindValue(':read3', $words->getRead3(), PDO::PARAM_STR);
        $stmt->bindValue(':read4', $words->getRead4(), PDO::PARAM_STR);
        $stmt->bindValue(':read1_points', $words->getReadPoints1(), PDO::PARAM_INT);
        $stmt->bindValue(':read2_points', $words->getReadPoints2(), PDO::PARAM_INT);
        $stmt->bindValue(':read3_points', $words->getReadPoints3(), PDO::PARAM_INT);
        $stmt->bindValue(':read4_points', $words->getReadPoints4(), PDO::PARAM_INT);
        $stmt->bindValue(':created_at', $words->getCreatedAt(), PDO::PARAM_STR);
        $stmt->bindValue(':userid', $words->getUserId(), PDO::PARAM_INT);

        $result = $stmt->execute();

        $id = 0;

        if ($result) {
            $id = $this->db->lastInsertId();
        }

        return $id;
    }

    /**
     * update.
     *
     * @param Reports $reports
     *
     * @return bool
     */
    public function update(Reports $reports)
    {
        $sql = 'UPDATE reports SET rp_date = :rp_date, rp_time_from = :rp_time_from, rp_time_to = :rp_time_to, reportcate_id = :reportcate_id, rp_content = :rp_content WHERE id = :id';
        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':rp_date', $reports->getRpDate(), PDO::PARAM_STR);
        $stmt->bindValue(':rp_time_from', $reports->getRpTimeFrom(), PDO::PARAM_STR);
        $stmt->bindValue(':rp_time_to', $reports->getRpTimeTo(), PDO::PARAM_STR);
        $stmt->bindValue(':reportcate_id', $reports->getRcId(), PDO::PARAM_INT);
        $stmt->bindValue(':rp_content', $reports->getRpContent(), PDO::PARAM_STR);
        $stmt->bindValue(':id', $reports->getId(), PDO::PARAM_INT);

        $result = $stmt->execute();

        return $result;
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM reports WHERE id = :id';
        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(":id", $id, PDO::PARAM_INT);

        $result = $stmt->execute();

        return $result;
    }

    public function count() {
        $sql = 'SELECT COUNT(*) AS count FROM words';

        $stmt = $this->db->prepare($sql);

        $result = $stmt->execute();

        if($result && $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $rowCount = $row["count"];
        }

        return $rowCount;
    }

    public function countKeyword($keyword) {
        $sql = 'SELECT COUNT(*) AS count FROM words WHERE word LIKE :keyword';

        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':keyword', '%'.$keyword.'%', PDO::PARAM_STR);

        $result = $stmt->execute();

        if($result && $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $rowCount = $row["count"];
        }

        return $rowCount;
    }

    public function wordsRow($limit,$offset) {
        $sql = 'SELECT words.id, word, created_at, name FROM ( words INNER JOIN users) WHERE words.userid = users.id ORDER BY created_at DESC LIMIT :limit OFFSET :offset';


        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(":limit", $limit, PDO::PARAM_INT);
        $stmt->bindValue(":offset", $offset, PDO::PARAM_INT);

        $result = $stmt->execute();

        $wordList = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $word = $row['word'];
            $created_at = $row['created_at'];
            $username = $row['name'];

            $words = new Word();
            $words->setId($id);
            $words->setWord($word);
            $words->setCreatedAt($created_at);
            $words->setUserName($username);

            $wordList[] = $words;
        }

        return $wordList;
    }

    public function vote($read_points,$word) {
        $sql = "UPDATE words SET $read_points = $read_points+1  WHERE word = :word";

        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':word', $word, PDO::PARAM_STR);

        $result = $stmt->execute();

        return $result;
    }

    public function findByVote($read_points,$word) {
        $sql = 'SELECT * FROM words WHERE word = :word';

        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':word', $word, PDO::PARAM_STR);

        $result = $stmt->execute();

        if($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $vote_value = $row[$read_points];
        }

        return $vote_value;
    }

    public function findByWordKeyword($keyword) {
        $sql = 'SELECT words.id, word, created_at, name FROM ( words INNER JOIN users) WHERE words.userid = users.id AND word LIKE :keyword ORDER BY created_at DESC';
        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':keyword', '%'.$keyword.'%', PDO::PARAM_STR);

        $result = $stmt->execute();

        $wordList = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $word = $row['word'];
            $created_at = $row['created_at'];
            $username = $row['name'];

            $words = new Word();
            $words->setId($id);
            $words->setWord($word);
            $words->setCreatedAt($created_at);
            $words->setUserName($username);

            $wordList[] = $words;
        }

        return $wordList;
    }

    

}
