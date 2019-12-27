<?php foreach ($comments as $comment) { ?>
<div class="homeCommentDiv" style="display: block" id="comment<?php echo $comment['id'] ?>">
    <h5><?php echo $comment['author'] ?>:</h5>
    <p class="addedDate"><?php echo $comment['date_added'] ?></p>
    <p><?php echo $comment['text'] ?></p>
    <?php echo $view ?>
    <form method="post" id="childFormId<?php echo $comment['id'] ?>" action="">
        <input type="text" name="childrenComment">
        <input type="button" class="homeChildCommentSubmit" value="Send">
    </form>
    <br>

</div>
<?php } ?>