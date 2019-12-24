<?php echo $header; ?>
<main class="py-3">
    <div class="container" id="content">
        <?php if ($error) { ?>
            <div class="alert alert-danger alert-dismissible">
                <?php  echo $error; ?>
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        <?php  } ?>
        <form action="<?php  echo $action; ?>" method="post" enctype="multipart/form-data" id="form"
              class="form-horizontal bg-light p-3">
            <div class="pull-right">
                <button id="button" class="btn btn-primary" title="Save"><i class="fa fa-save"></i></button>
                <a href="<?php  echo $cancel ?>" data-toggle="tooltip" title="Cancel" class="btn btn-outline-dark"><i class="fa fa-reply"></i></a>
            </div>
            <h3 class="mb-3">New Topic</h3>
            <div class="form-group">
                <div class="col-xs-6">
                    <label for="title">Title <span style="color: red">*</span></label>
                    <input class="form-control input-lg" id="title" name="title" value="<?php  echo $title; ?>" placeholder="Enter your title.." required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <label for="content">Topic <span style="color: red">*</span></label>
                    <textarea class="form-control input-lg" id="content" name="content" rows="10" placeholder="Enter your text.." required><?php echo $content; ?></textarea>
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
