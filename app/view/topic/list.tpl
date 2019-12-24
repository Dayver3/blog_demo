<?php echo $header; ?>
<!-- Main Container -->
<main class="py-3">
    <div class="container bg-light" id="content">
        <?php  if ($error) { ?>
            <div class="alert alert-danger alert-dismissible">
                <?php  echo $error; ?>
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        <?php  } ?>
        <?php  if ($success) { ?>
            <div class="alert alert-success alert-dismissible"><i class="fa fa-check-circle"></i>
                <?php  echo $success; ?>
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        <?php  } ?>
        <form action="" method="post" enctype="multipart/form-data" id="form" class="form-horizontal p-3">
            <div class="pull-right">
                <?php  if ($logged) { ?>
                    <a href="<?php  echo $add ?>" title="New Post" class="btn btn-success"><i class="fa fa-plus"></i></a>
                <?php  } ?>
            </div>
            <h3 class="mb-4">Topic List</h3>
            <table class="table ">
                <thead>
                <tr>
                    <th style="width: 12%;">Date</th>
                    <th>Topic</th>
                    <th class="text-center" style="width: 5%;"></th>
                </tr>
                </thead>
                <tbody>
                <?php  if ($topics) { ?>
                    <?php  foreach ($topics as $topic) { ?>
                        <tr>
                            <td class="text-left" style="width: 12%;">
                                <i ></i><em class="text-muted"><?php  echo (new \DateTime($topic['date_added']))->format('M d, Y h:i:s'); ?></em>
                            </td>
                            <td class="text-left" style="width: 40%;">
                                <b><a href="<?php echo $view; ?>?id=<?php echo $topic['id']; ?>" title="<?php  echo $topic['title']; ?>"><?php  echo $topic['title']; ?></a></b>
                            </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="<?php echo $view; ?>?id=<?php echo $topic['id']; ?>" title="View" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                                    </div>
                                </td>
                        </tr>
                    <?php  } ?>
                <?php  } else { ?>
                <tr>
                        <td class="text-center" colspan="3">No Results</td>
                    </tr>
                <?php  } ?>
                </tbody>
            </table>
            <hr>
        </form>

    </div>
</main>
<!-- END Main Container -->
<?php echo $footer; ?>
<script>
    $('#button').on('click', function (e) {
        e.preventDefault();
        App.send();
        return false;
    });
</script>
