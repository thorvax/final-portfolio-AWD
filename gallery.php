<?php
include 'db.php';
$result = mysqli_query($conn, "SELECT * FROM posts ORDER BY id DESC");
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Gallery | Marc Whesley Bartolome</title>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
    rel="stylesheet" />
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
      <a href="post.php">Posts</a>
      <a href="gallery.php" class="nav-current">Gallery</a>
      <a href="index.php#footer">Contact</a>
    </nav>
  </header>

  <main>
    <section class="hero hero-subpage">
      <h1>Gallery</h1>

      <div class="actions">
        <a class="btn primary" href="upload.php">Upload Post</a>
        <a class="btn" href="post.php">Read Posts</a>
      </div>
    </section>

    <section class="page-section">
      <div class="section-heading">
        <div>

        </div>
        <a class="btn btn-small" href="index.php">Back Home</a>
      </div>

      <?php if (count($rows) > 0) { ?>
        <h2>Uploaded Work</h2>

        <div class="gallery-grid">
          <?php foreach ($rows as $row) { ?>
            <article class="card gallery-card">
              <img class="gallery-image" src="<?php echo htmlspecialchars($row['image_path']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>" loading="lazy" />
              <div class="gallery-copy">
                <p class="post-meta"><?php echo htmlspecialchars(date('F j, Y', strtotime($row['date']))); ?></p>
                <h3><?php echo htmlspecialchars($row['title']); ?></h3>
                <p><?php echo htmlspecialchars($row['description']); ?></p>
                <div class="post-actions">
                  <a class="tag" href="<?php echo htmlspecialchars($row['image_path']); ?>" target="_blank">Open Image</a>
                  <a class="tag" href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                  <a class="tag tag-danger" href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Delete this post?')">Delete</a>
                </div>
              </div>
            </article>
          <?php } ?>
        </div>
      <?php } else { ?>
        <div class="card empty-state">
          <h4>No gallery items yet</h4>
          <p>Upload a post first so the gallery has something to display.</p>
          <a class="btn primary" href="upload.php">Upload a Post</a>
        </div>
      <?php } ?>
    </section>
  </main>

  <footer class="site-footer">
  </footer>
</body>

</html>
