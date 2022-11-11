<?php

class Helper
{
    public static function parseCSV()
    {
      $article_type= [];
      $article = [];
        if (($handle = fopen(PUBLIC_DIR.'/uploads/resultset.csv', "r")) !== FALSE) {
            while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {

                $article_type[$row[1]] = $row[1] . ',' . $row[2]. ',' . time(). ',' .time();
                $article[$row[0]] = $row[0] . ',' . $row[1]. ',' . $row[3]. ',' .  $row[4]. ',' .time();

            }
            fclose($handle);
        }
        unset($article_type['section_id']);
        unset($article['id']);
        return['art' => $article, 'art_type' => $article_type ];
    }

}