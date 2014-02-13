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
            ->select("genre")
            ->get();

        return $genres;
    }

    public static function getRatings() {
        $ratings = DB::table("ratings")
            ->select("rating")
            ->get();

        return $ratings;
    }

    public static function search($title, $genre, $rating) {

        $query = DB::table("dvd_titles")
            ->select("title", "rating", "genre", "label", "sound", "format", DB::raw("DATE_FORMAT(release_date, '%b %e, %Y') AS release_date"))
            ->join("ratings", "ratings.id", "=", "dvd_titles.rating_id")
            ->join("genres", "genres.id", "=", "dvd_titles.genre_id")
            ->join("labels", "labels.id", "=", "dvd_titles.label_id")
            ->join("sounds", "sounds.id", "=", "dvd_titles.sound_id")
            ->join("formats", "formats.id", "=", "dvd_titles.format_id");

        if ($title) {
            $query->where("title", "LIKE", "%$title%");
        }

        if ($genre != "All") {
            $query->where("genre", "=", $genre);
        }

        if ($rating != "All") {
            $query->where("rating", "=", $rating);
        }

        $dvds = $query->get();

        return $dvds;
    }

} 