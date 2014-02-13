<!DOCTYPE html>
<html>
    <head>
        <title>DVD Search</title>
        <?php echo HTML::style("css/bootstrap.min.css") ;?>
        <?php echo HTML::style("css/bootstrap-theme.min.css") ;?>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h1 class="text-center">DVD Search</h1>
                    <form method="get" action="/dvds">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="form-group">
                            <label>Genre</label>
                            <select class="form-control" name="genre">
                                <option value="All">All</option>
                                <?php
                                    foreach ($genres as $genre) {
                                        echo "<option value=$genre->genre>$genre->genre</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Rating</label>
                            <select class="form-control" name="rating">
                                <option value="All">All</option>
                                <?php
                                foreach ($ratings as $rating) {
                                    echo "<option value=$rating->rating>$rating->rating</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>