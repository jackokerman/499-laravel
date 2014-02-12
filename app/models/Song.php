<?php
/**
 * Created by PhpStorm.
 * User: Jack
 * Date: 2/11/14
 * Time: 5:57 PM
 */

class Song {

    public static function search($song_title, $artist) {

        /*
         *  SELECT title, artist_name,
         *  DATE_FORMAT(added, "%b %d %Y %h:%i %p") AS added
         *  FROM songs
         *  INNER JOIN artists
         *  ON songs.artist_id = artists.id
         */

        $query = DB::table("songs")
            ->select("title", "artist_name", "genre", DB::raw("DATE_FORMAT(added, '%b %d %Y %h:%i %p') AS added"))
            ->join("artists", "artists.id", "=", "songs.artist_id")
            ->join("genres", "genres.id", "=", "songs.genre_id");

        if ($song_title) {
            $query->where("title", "LIKE", "%$song_title%");
        }

        if ($artist) {
            $query->where("artist_name", "LIKE", "%$artist%");
        }

        $songs = $query->get();

        return $songs;
    }

} 