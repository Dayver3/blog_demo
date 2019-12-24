<?php echo $header; ?>
<main class="py-3">
    <div class="container" id="content">

        <h2>Topic View</h2>
        <hr>
        <div class="bg-white">
            <section class="content content-boxed">
                <!-- Section Content -->
                <div class="row push-50-t push-50 nice-copy-story">
                        <?php  echo $content; ?>
                </div>
                <!-- END Section Content -->
            </section>
        </div>
        <hr>
        <?php foreach ($comments as $comment) { ?>
            <div class="col-sm-12">
                <?php  echo $comment['date_added']; ?> <b>@<?php  echo $comment['text']; ?></b>: <?php  echo $comment['text']; ?>
            </div>
            <hr>
        <?php } ?>
        <form action="<?php  echo $action; ?>" method="post" class="form-horizontal" id="form-review">
            <h3>Write a comment</h3>

            <div class="form-group required">
                <div class="col-sm-12">
                    <label class="control-label" for="input-review">Your comment</label>
                    <textarea name="comment" rows="5" id="input-review" class="form-control"></textarea>
                    <div class="help-block"><span class="text-danger">Note:</span> HTML is not translated!</div>
                </div>
            </div>
            <div class="buttons clearfix">
                <div class="pull-right">
                    <button type="submit" id="button-review" data-loading-text="Loading..." class="btn btn-primary">Continue</button>
                </div>
            </div>
        </form>
    </div>
</main>
<?php echo $footer; ?>
<script>
    $('#button').on('click', function (e) {
        e.preventDefault();
        App.send();
        return false;
    });
</script>
