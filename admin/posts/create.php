<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/posts.php");
adminOnly();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

  <!-- Custom Styles -->
  <link rel="stylesheet" href="../../assets/css/style.css">

  <!-- Admin Styling -->
  <link rel="stylesheet" href="../../assets/css/admin.css">

  <title>Admin - Create Post</title>
</head>

<body>

  <!-- header -->
<?php include(ROOT_PATH . "/app/includes/adminheader.php"); ?>
  <!-- // header -->

  <div class="admin-wrapper clearfix">
    <!-- Left Sidebar -->
    <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>

    <!-- // Left Sidebar -->

    <!-- Admin Content -->
    <div class="admin-content clearfix">
      <div class="button-group">
        <a href="create.php" class="btn btn-sm">Add Post</a>
        <a href="index.php" class="btn btn-sm">Manage Posts</a>
      </div>
      <div class="">
        <h2 style="text-align: center;">Create Post</h2>
        <?php include(ROOT_PATH . "/app/helpers/formError.php"); ?>
        <form action="create.php" method="post" enctype="multipart/form-data">
          <div class="input-group">
            <label>Title</label>
            <input type="text" name="title" class="text-input" value="<?php echo $title ?>">
          </div>
          <div class="input-group">
            <label>Body</label>
            <textarea  name="body" id="body"><?php echo $body ?></textarea>
          </div>
          <div>
            <label>Image</label>
            <input type="file" name="image" class="text-input">
          </div>
          <div class="input-group">

            <label>Topic</label>

            <select class="text-input" name="topic_id">
                <option value=""></option>
              <?php  foreach($topics as $key => $topic): ?>
               <?php if(!empty($topic_id) && $topic_id == $topic['id']):?>
              <option selected value="<?php echo $topic['id'] ?>" ><?php echo $topic['name'] ?></option>
              <?php else: ?>
                <option  value="<?php echo $topic['id'] ?>" ><?php echo $topic['name'] ?></option>
              <?php endif; ?>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="input-group">
            <?php if(empty($published)) : ?>
              <label>
              <input type="checkbox" name="published" /> Publish
            </label>
            <?php else: ?>
              <label>
              <input type="checkbox" name="published" checked/> Publish
            </label>
            <?php endif; ?>
            
          </div>
          <div class="input-group">
            <button type="submit" name="add-post" class="btn">Add Post</button>
          </div>
        </form>

      </div>
    </div>
    <!-- // Admin Content -->

  </div>


  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- CKEditor 5 -->
  <script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>

  <!-- Custome Scripts -->
  <script src="../../assets/js/scripts.js"></script>

</body>

</html>