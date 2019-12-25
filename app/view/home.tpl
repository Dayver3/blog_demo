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
        </div>
    </div>
    <?php } ?>
    <div class="topicContainer">
        <?php
if ($topics) {
    foreach ($topics as $topic) {
?>
        <div class="topicBlock">
            <h2><?php echo $topic['title'] ?></h2>
            <p><?php echo $topic['content']?></p>

            <hr class="line">
            <h3>Comments:</h3>
            <br>
            <?php foreach ($comments as $comment) { ?>
            <?php if($comment['post_id'] == $topic['id']) { ?>
            <h5><?php echo $comment['author'] ?>:</h5>
            <p><?php echo $comment['text'] ?></p>
            <?php }
                } ?>
            <?php if ($logged) { ?>
            <hr class="line">
            <br>
            Add Comment
            <form method="post"
                  action="comment/addComment?post_id=<?php echo $topic['id'] ?>&user_id=<?php echo $user_id ?>&author=<?php echo$username ?>">
                <input type="text" name="comment">
                <input type="submit" class="topicFormBack" value="Submit">
            </form>

            <?php } ?>
        </div>
        <?php
    }
} ?>
    </div>
</div>
<?php echo $footer; ?>
