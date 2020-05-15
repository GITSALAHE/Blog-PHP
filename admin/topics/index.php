<?php include("../../path.php") ?>
<?php include(ROOT_PATH . '/app/controllers/topics.php'); ?>
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

  <title>Admin - Manage Topic</title>
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
        <a href="create.php" class="btn btn-sm">Add Topic</a>
        <a href="index.php" class="btn btn-sm">Manage Topics</a>
      </div>
      <div class="">
        <h2 style="text-align: center;">Manage Topic</h2>
          
        <!-- MESSAGES-->
          <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>

        <table>
          <thead>
            <th>N</th>
            <th>Name</th>
            <th colspan="2">Action</th>
          </thead>
          <tbody>
            <tr class="rec">
              <td>1</td>
              <td>
                <a href="#">Life</a>
              </td>
              <td>
                <a href="#" class="edit">
                  Edit
                </a>
              </td>
              <td>
                <a href="#" class="delete">
                  Delete
                </a>
              </td>
            </tr>
            <tr class="rec">
              <td>2</td>
              <td>
                <a href="#">Poetry</a>
              </td>
              <td>
                <a href="#" class="edit">
                  Edit
                </a>
              </td>
              <td>
                <a href="#" class="delete">
                  Delete
                </a>
              </td>
            </tr>
            <tr class="rec">
              <td>3</td>
              <td>
                <a href="#">Life Lessons</a>
              </td>
              <td>
                <a href="#" class="edit">
                  Edit
                </a>
              </td>
              <td>
                <a href="#" class="delete">
                  Delete
                </a>
              </td>
            </tr>
          </tbody>
        </table>

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