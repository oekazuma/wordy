<?php

/**
 * Class Word.
 */
class Word
{   
    //ワードID
    private $id;
    //ワード
    private $word = '';
    //読み方その1
    private $read1 = '';
    //読み方その2
    private $read2 = '';
    //読み方その3
    private $read3 = '';
    //読み方その4
    private $read4 = '';
    //ジャンル
    private $genre = '';
    //投票数その1
    private $read1_points;
    //投票数その2
    private $read2_points;
    //投票数その3
    private $read3_points;
    //投票数その4
    private $read4_points;
    //投稿日時
    private $created_at;
    //ユーザID
    private $userId;
    //ユーザー名
    private $username = '';

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getWord()
    {
        return $this->word;
    }

    /**
     * @param string $word
     */
    public function setWord($word)
    {
        $this->word = $word;
    }

    /**
     * @return string
     */
    public function getRead1()
    {
        return $this->read1;
    }

    /**
     * @param string $read
     */
    public function setRead1($read1)
    {
        $this->read1 = $read1;
    }

    /**
     * @return string
     */
    public function getRead2()
    {
        return $this->read2;
    }

    /**
     * @param string $read
     */
    public function setRead2($read2)
    {
        $this->read2 = $read2;
    }

    /**
     * @return string
     */
    public function getRead3()
    {
        return $this->read3;
    }

    /**
     * @param string $read
     */
    public function setRead3($read3)
    {
        $this->read3 = $read3;
    }

    /**
     * @return string
     */
    public function getRead4()
    {
        return $this->read4;
    }

    /**
     * @param string $read
     */
    public function setRead4($read4)
    {
        $this->read4 = $read4;
    }

    /**
     * @return string
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * @param string $genre
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;
    }

    /**
     * @return mixed
     */
    public function getReadPoints1()
    {
        return $this->read1_points;
    }

    /**
     * @param mixed $points
     */
    public function setReadPoints1($read1_points)
    {
        $this->read1_points = $read1_points;
    }

    /**
     * @return mixed
     */
    public function getReadPoints2()
    {
        return $this->read2_points;
    }

    /**
     * @param mixed $read2_points
     */
    public function setReadPoints2($read2_points)
    {
        $this->read2_points = $read2_points;
    }

    /**
     * @return mixed
     */
    public function getReadPoints3()
    {
        return $this->read3_points;
    }

    /**
     * @param mixed $read3_points
     */
    public function setReadPoints3($read3_points)
    {
        $this->read3_points = $read3_points;
    }

    /**
     * @return mixed
     */
    public function getReadPoints4()
    {
        return $this->read4_points;
    }

    /**
     * @param mixed $read4_points
     */
    public function setReadPoints4($read4_points)
    {
        $this->read4_points = $read4_points;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $created_at
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return string
     */
    public function getUserName()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUserName($username)
    {
        $this->username = $username;
    }
}
