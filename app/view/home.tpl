<?php
echo $header;
?>

    <h1>Homepage</h1>
<?php if($logged){ ?>
<form action="logout" method="post">
    <input type="submit" value="logout">
</form>
<form action="topic" method="post">
    <input type="submit" value="Add new topic">
</form>
<?php } ?>
<?php echo $footer; ?>
