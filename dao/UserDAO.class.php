<?php
/**
 * Class UserDAO.
 */
class UserDAO
{
    private $db;

    /**
     * UserDAO constructor.
     *
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $this->db = $db;
    }

    public function findByLoginId($loginMail)
    {
        $sql = 'SELECT * FROM users WHERE mail = :mail';
        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':mail', $loginMail, PDO::PARAM_STR);
        
        $result = $stmt->execute();

        $user = null;

        if ($result && $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $mail = $row['mail'];
            $name = $row['name'];
            $passwd = $row['password'];
            $auth = $row['auth'];

            $user = new User();
            $user->setId($id);
            $user->setMail($mail);
            $user->setName($name);
            $user->setPasswd($passwd);
            $user->setAuth($auth);
        }

        return $user;
    }

    public function insert($user)
    {
        $sql = 'INSERT INTO users (mail, name, password, auth, register_key) VALUES (:mail, :name, :password, :auth, :register_key)';
        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':mail', $user->getMail(), PDO::PARAM_STR);
        $stmt->bindValue(':name', $user->getName(), PDO::PARAM_STR);
        $stmt->bindValue(':password', $user->getPasswd(), PDO::PARAM_STR);
        $stmt->bindValue(':auth', $user->getAuth(), PDO::PARAM_INT);
        $stmt->bindValue(':register_key', $user->getKey(), PDO::PARAM_STR);

        $result = $stmt->execute();

        $id = 0;

        if ($result) {
            $id = $this->db->lastInsertId();
        }

        return $id;
    }
}
