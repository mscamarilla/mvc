<?php


namespace Model;

use Core\Model;


class ModelArticle extends Model
{
    public function getArticles()
    {
        $articles = array();

        $sql = "SELECT * FROM articles";
        $query = $this->db->query($sql);

        if ($query->num_rows) {

            foreach ($query->rows as $row) {
                $articles[] = $row;
            }
        }

        return $articles;
    }

}