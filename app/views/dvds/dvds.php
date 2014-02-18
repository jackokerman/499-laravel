<!DOCTYPE html>
<html>
    <head>
        <title>DVDs</title>
        <?php echo HTML::style("css/bootstrap.min.css") ;?>
        <?php echo HTML::style("css/bootstrap-theme.min.css") ;?>
    </head>
    <body>
        <div class="container">
            <h1 class="text-center">DVD Search Results</h1>
            <?php if (count($dvds) > 0) : ?>
                <div class="row">
                    <div class = "col-md-12 col-lg-12">
                        <div class="alert alert-info text-center">
                            <em><strong><?php echo count($dvds); ?></strong></em>
                            dvd<?php echo count($dvds) > 1 ? "s" : ""; ?> found in the database that
                            match<?php echo count($dvds) > 1 ? "" : "es"; ?> your search
                            <?php echo ($title == "") ? "" : "for title" ; ?>
                            <em><strong><?php echo $title; ?></strong></em> with genre
                            <em><strong><?php echo $genre; ?></strong></em> and rating
                            <em><strong><?php echo $rating; ?></strong></em>.
                            Back to <a href="/dvds/search" class="alert-link">Search</a>.
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Rating</th>
                                    <th>Genre</th>
                                    <th>Label</th>
                                    <th>Sound</th>
                                    <th>Format</th>
                                    <th>Release Date</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($dvds as $dvd) : ?>
                                <tr>
                                    <td><?php echo $dvd->title; ?></td>
                                    <td><?php echo $dvd->rating_name; ?></td>
                                    <td><?php echo $dvd->genre_name; ?></td>
                                    <td><?php echo $dvd->label_name; ?></td>
                                    <td><?php echo $dvd->sound_name; ?></td>
                                    <td><?php echo $dvd->format_name; ?></td>
                                    <td><?php echo $dvd->release_date; ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php else: ?>
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="alert alert-danger text-center">
                            Your search for title <em><strong><?php echo $title; ?></strong></em> with genre
                            <em><strong><?php echo $genre; ?></strong></em> and rating
                            <em><strong><?php echo $rating; ?></strong></em> did not match any dvds in the database.
                            Back to <a href="/dvds/search" class="alert-link">Search</a>.
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </body>
</html>