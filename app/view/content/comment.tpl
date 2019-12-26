<?php foreach ($comments as $comment) { ?>
<?php if($comment['post_id'] == $topic['id']) { ?>
<div class="homeCommentDiv">
    <h5><?php echo $comment['author'] ?>:</h5>
    <p class="addedDate"><?php echo $comment['date_added'] ?></p>
    <p><?php echo $comment['text'] ?></p>
    <br>
</div>
<?php }
        }
?>