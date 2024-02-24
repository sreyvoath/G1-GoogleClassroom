<?php
session_start();
// Check if the user is not logged in, redirect to the login page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

?>
<?php require "../partials/head.php" ?>
<?php require "../../utils/url.php" ?>
<?php require "../partials/nav.php" ?>

<?php
require '../../database/database.php';
require '../../models/post.model.php';
// function get_post
$posts = getPosts();
?>

<div class="card mt-5">
    <div class="card-body">
        <!--Class form-->
        <form action="../../controllers/project/project.create.controller.php" method="post">
            <div class="form-group">
                <input type="text" placeholder="name" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label for="sel1">Select list:</label>
                <!--show title  -->
                <select class="form-control" id="sel1" name="post_id">
                    <option>Chose Post</option>
                    <?php foreach ($posts as $post) : ?>
                        <option value="<?= $post['id'] ?>"><?= $post['title'] ?></option>
                    <?php endforeach ?>
                </select>
                <!-- show name -->
                <div class="mb-4">
                    <input type="file" name="image" id="inputImages" class="form-control">
                    <span class="text-danger"><?= isset($_SESSION['name']) ? $_SESSION['name'] : "" ?></span>
                </div>
            </div>
        </form>
        <!--Class form END-->
    </div>

</div>

<?php require "../partials/footer.php" ?>