<?php if (Session::has("success")) : ?>
    <p style="color: green;">
        <?php echo Session::get("success") ?>
    </p>
<?php endif; ?>

<form action="<?php echo url("songs") ?>" method="post">

    Title: <input type="text" name="title">
    <br>
    Artist:
    <select name="artist">
        <?php foreach ($artists as $artist) : ?>
            <option value="<?php echo $artist->id ?>">
                <?php echo $artist->artist_name; ?>
            </option>
        <?php endforeach ?>
    </select>
    <br>

    Genre
    <select name="genre">
        <?php foreach ($genres as $genre) : ?>
            <option value="<?php echo $genre->id ?>">
                <?php echo $genre->genre; ?>
            </option>
        <?php endforeach ?>
    </select>
    <br>

    Price: <input type="text" name="price">
    <br>

    <input type="submit" value="Create Song">

</form>