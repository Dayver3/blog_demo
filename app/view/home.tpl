<?php
echo $header;
?>
<div class="content">

    <?php if($logged){ ?>
    <div class="homePanel">
        <h1>Homepage</h1>
        <div class="homeMenu">
            <h4>Menu</h4>
            <p>Hello, <?php echo $username ?>!</p>
            <form action="logout" method="post">
                <input type="submit" value="logout" class="submit button">
            </form>
            <form action="topic" method="post">
                <input type="submit" value="Add new topic" class="submit button">
            </form>
        </div>
    </div>

    <?php } else { ?>
    <div class="homePanel">
        <h1>Homepage</h1>
        <div class="homeMenu">
            <h4>Menu</h4>
            <p>Hello, <?php echo $username ?>!</p>
            <form action="login" method="post">
                <div><input type="submit" value="Login" class="submit"></div>
            </form>
            <br>
            <form action="register" method="post">
                <div><input type="submit" value="Register" class="submit"></div>
            </form>
        </div>
    </div>
    <?php } ?>
    <div class="topicContainer">
        <?php
if ($topics) {
    foreach ($topics as $topic) {
?>
        <div class="topicBlock" id="<?php echo $topic['id'] ?>">
            <h2><?php echo $topic['title'] ?></h2>
            <p><?php echo $topic['content'] ?></p>
            <hr class="line">
            <form method="post" action="comment/getComments?post_id=<?php echo $topic['id'] ?>" id="displayCommentsButton<?php  echo $topic['id'] ?>">
                <input type="button" value="Show comments" class="homeCommentSubmit">
            </form>
            <div class="homeCommentDiv"></div>
            <?php if ($logged) { ?>
            <div id="homeCommentDiv" style="display: none">
            <hr class="line">
            <br>
            Add Comment
            <form method="post" class="homeCommentForm"
                  action="comment/addComment?post_id=<?php echo $topic['id'] ?>&user_id=<?php echo $user_id ?>&author=<?php echo$username ?>">
                <input type="text" name="comment" id="<?php echo $topic['id'] ?>" class="commentInput">
                <input type="button" class="homeCommentSubmit" value="Submit">
            </form>
            </div>
            <?php } ?>
        </div>
        <?php
    }
} ?>
    </div>
</div>
<?php echo $footer; ?>
