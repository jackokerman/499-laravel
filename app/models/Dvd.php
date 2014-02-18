<?php
/**
 * Created by PhpStorm.
 * User: Jack
 * Date: 2/11/14
 * Time: 11:35 PM
 */

class Dvd {

    public static function getGenres() {
        $genres = DB::table("genres")
            ->select("genre_name")
            ->get();

        return $genres;
    }

    public static function getRatings() {
        $ratings = DB::table("ratings")
            ->select("rating_name")
            ->get();

        return $ratings;
    }

    public static function search($title, $genre, $rating) {

        $query = DB::table("dvds")
            ->select("title", "rating_name", "genre_name", "label_name", "sound_name", "format_name", DB::raw("DATE_FORMAT(release_date, '%b %e, %Y') AS release_date"))
            ->join("ratings", "ratings.id", "=", "dvds.rating_id")
            ->join("genres", "genres.id", "=", "dvds.genre_id")
            ->join("labels", "labels.id", "=", "dvds.label_id")
            ->join("sounds", "sounds.id", "=", "dvds.sound_id")
            ->join("formats", "formats.id", "=", "dvds.format_id");

        if ($title) {
            $query->where("title", "LIKE", "%$title%");
        }

        if ($genre != "All") {
            $query->where("genre_name", "=", $genre);
        }

        if ($rating != "All") {
            $query->where("rating_name", "=", $rating);
        }

        $dvds = $query->get();

        return $dvds;
    }

} 