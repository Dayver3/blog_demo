<?php echo $header ?>
<div class="content">
    <div class="topicFormContainer">
        <form method="post" action="home">
            <input type="submit" class="topicFormBack" value="Back">
        </form>
    <div class="topicFormBlock">
    <form action="topic/addTopic" method="post">
        <h3>Title</h3>
        <input type="text" name="title" class="topicFormTitleInput">
        <h4>Text</h4>
        <input type="text" name="content" class="topicFormTextInput">
        <input type="submit" class="topicFromSubmit">
    </form>
    </div>
    </div>
</div>
<?php echo $footer ?>