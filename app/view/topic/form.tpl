<?php echo $header ?>

<form action="topic/addTopic" method="post">
    <p>Title</p>
    <input type="text" name="title">
    <p>Text</p>
    <input type="text" name="content">
    <input type="submit">
</form>

<?php echo $footer ?>