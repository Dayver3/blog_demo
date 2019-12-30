<?php foreach ($comments as $comment) { ?>
<div class="homeCommentDiv" style="display: block" id="comment<?php echo $id ?>">
    <h5><?php echo $author ?>:</h5>
    <p class="addedDate"><?php echo $date_added ?></p>
    <p><?php echo $text ?></p>
    <?php //echo $view ?>
    <form method="post" id="childFormId<?php echo $id ?>" action="">
        <input type="text" name="childrenComment">
        <input type="button" class="homeChildCommentSubmit" value="Send">
    </form>
    <br>
    <?php //if($answers) { ?>
        <?php //echo $answers ?>
</div>
<?php //}
    } ?>