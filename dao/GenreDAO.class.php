<?php
/**
 * Class GenreDAO.
 */
class GenreDAO
{
    private $db;

    /**
     * GenreDAO constructor.
     *
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $this->db = $db;
    }

    public function findAll() {
        $sql = "SELECT * FROM genre ORDER BY id";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute();
        $genreList = [];

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $id = $row["id"];
                $genre = $row["genre"];

                $genres = new Genre();
                $genres->setId($id);
                $genres->setGenre($genre);
                $genreList[$id] = $genres;
        }
        return $genreList;
    }
}
