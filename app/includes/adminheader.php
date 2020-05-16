<header class="clearfix">
    <a class="logo" href="<?php echo BASE_URL . '/index.php' ?>">
    <h1 class="logo-text"><span>GitSalah</span>Blog</h1>
    </a>
    <div class="fa fa-reorder menu-toggle"></div>
    <nav>
      <ul>
        <?php if(isset($_SESSION['username'])): ?>
        <li><a href="#">Home</a></li>
        <li>
          <a href="#" class="userinfo">
            <i class="fa fa-user"></i>
           <?php echo $_SESSION['username']; ?>
            <i class="fa fa-chevron-down"></i>
          </a>
          <ul class="dropdown">
            <li><a href="<?php echo BASE_URL . '/admin/dashboard.php'?>">Dashboard</a></li>
            <li><a href="<?php echo BASE_URL . '/logout.php'?>" class="logout">logout</a></li>
        <?php endif; ?>
          </ul>
        </li>
      </ul>
    </nav>
  </header>