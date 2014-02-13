<?php
/**
 * Created by PhpStorm.
 * User: Jack
 * Date: 2/11/14
 * Time: 11:39 PM
 */

class DvdController extends BaseController {

    public function search() {
        $genres = Dvd::getGenres();
        $ratings = Dvd::getRatings();

        return View::make("dvds/search", [
            "genres" => $genres,
            "ratings" => $ratings
        ]);
    }

    public function listDvds() {
        $title = Input::get("title");
        $genre = Input::get("genre");
        $rating = Input::get("rating");

        $dvds = Dvd::search($title, $genre, $rating);

        return View::make("dvds/dvds", [
            "title" => $title,
            "genre" => $genre,
            "rating"=> $rating,
            "dvds" => $dvds
        ]);
    }

} 