<?php
include 'db.php';

$message = '';
$messageType = 'success';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $image = basename($_FILES['image']['name']);
    $tmp = $_FILES['image']['tmp_name'];
    $path = 'uploads/' . $image;

    if ($image != '' && move_uploaded_file($tmp, $path)) {
        $sql = "INSERT INTO posts (title, image_path, description, date) VALUES ('$title', '$path', '$description', '$date')";
        mysqli_query($conn, $sql);
        header("Location: post.php");
        exit();
    } else {
        $message = 'Please choose an image.';
        $messageType = 'error';
    }
}

$recentResult = mysqli_query($conn, "SELECT * FROM posts ORDER BY id DESC LIMIT 4");
$recentRows = mysqli_fetch_all($recentResult, MYSQLI_ASSOC);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Upload | Marc Whesley Bartolome</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <header>
      <a class="logo" href="index.php#home">Marc Whesley</a>

      <input type="checkbox" id="menu-toggle" />

      <label for="menu-toggle" class="hamburger">
        <span></span>
        <span></span>
        <span></span>
      </label>

      <nav>
        <a href="index.php#home">Home</a>
        <a href="index.php#who-i-am">About me</a>
        <a href="index.php#skills">Skills</a>
        <a href="index.php#projects-section">Projects</a>
        <a href="post.php" class="nav-current">Posts</a>
        <a href="gallery.php">Gallery</a>
        <a href="index.php#footer">Contact</a>
      </nav>
    </header>

    <main>
      <?php if ($message != '') { ?>
        <section class="status-wrap">
          <div class="status-message <?php echo $messageType; ?>">
            <p><?php echo htmlspecialchars($message); ?></p>
          </div>
        </section>
      <?php } ?>

      <section class="hero hero-subpage">
        <h1>Upload a New Portfolio Post</h1>

      </section>

      <section class="page-section upload-layout">
        <div class="card form-panel">
          <div class="section-heading section-heading-tight">
            <div>
              <h2>Upload Form</h2>
              <p class="section-copy">Upload the image, add the title, then save the post.</p>
            </div>
          </div>

          <form action="upload.php" method="POST" enctype="multipart/form-data">
            <div class="grid-2">
              <div>
                <label for="upload-title">Title</label>
                <input id="upload-title" type="text" name="title" placeholder="Project title" required />
              </div>
              <div>
                <label for="upload-date">Date</label>
                <input id="upload-date" type="date" name="date" required />
              </div>
            </div>
            <div>
              <label for="upload-image">Image</label>
              <input id="upload-image" type="file" name="image" accept="image/*" required />
            </div>
            <div>
              <label for="upload-description">Description</label>
              <textarea id="upload-description" name="description" placeholder="Describe the work, project, or update"></textarea>
            </div>
            <div class="form-actions">
              <button class="btn primary" type="submit" name="save_post">Save Post</button>
              <a class="btn" href="post.php">See Posts</a>
            </div>
          </form>
        </div>

          <div class="card">
            <h3>Recent Uploads</h3>
            <?php if (count($recentRows) > 0) { ?>
              <div class="mini-post-list">
                <?php foreach ($recentRows as $row) { ?>
                  <div class="mini-post">
                    <img src="<?php echo htmlspecialchars($row['image_path']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>" loading="lazy" />
                    <div>
                      <p class="post-meta"><?php echo htmlspecialchars(date('F j, Y', strtotime($row['date']))); ?></p>
                      <h4><?php echo htmlspecialchars($row['title']); ?></h4>
                    </div>
                  </div>
                <?php } ?>
              </div>
            <?php } else { ?>
              <p class="section-copy">No uploads yet. Your first saved post will appear here.</p>
            <?php } ?>
          </div>
        </div>
      </section>
    </main>

    <footer class="site-footer">
    </footer>
  </body>
</html>
