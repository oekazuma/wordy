<?php

/**
 * Class Favorite.
 */
class Favorite
{   
    //ID
    private $id;
    //ワード
    private $word = '';
    //ユーザID
    private $userId;
    //ワードID
    private $wordId;

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
     * @return mixed
     */
    public function getWordId()
    {
        return $this->wordId;
    }

    /**
     * @param mixed $wordId
     */
    public function setWordId($wordId)
    {
        $this->wordId = $wordId;
    }

}
