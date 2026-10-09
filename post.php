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
    <title>Posts | Marc Whesley Bartolome</title>
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
      <section class="hero hero-subpage">
        <h1>Portfolio Posts</h1>
        <p>
          Every uploaded post is shown here.
        </p>
        <div class="actions">
          <a class="btn primary" href="upload.php">Upload New Post</a>
          <a class="btn" href="gallery.php">Open Gallery</a>
        </div>
      </section>

      <section class="page-section">
        <div class="section-heading">
          <div>
            <h2>All Posts</h2>
            <p class="section-copy">
              Use the buttons on each card to edit the post or remove it with its uploaded image.
            </p>
          </div>
          <a class="btn btn-small" href="index.php#upload-form">Quick Upload</a>
        </div>

        <?php if (count($rows) > 0) { ?>
          <div class="post-feed">
            <?php foreach ($rows as $row) { ?>
              <article class="card post-card">
                <div class="post-media">
                  <img src="<?php echo htmlspecialchars($row['image_path']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>" loading="lazy" />
                </div>
                <div class="post-body">
                  <p class="post-meta"><?php echo htmlspecialchars(date('F j, Y', strtotime($row['date']))); ?></p>
                  <h3><?php echo htmlspecialchars($row['title']); ?></h3>
                  <p class="post-text"><?php echo nl2br(htmlspecialchars($row['description'])); ?></p>
                  <div class="post-actions">
                    <a class="tag" href="gallery.php">View in Gallery</a>
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
            <h4>No posts available yet</h4>
            <p>Use the upload page to create the first post.</p>
            <a class="btn primary" href="upload.php">Go to Upload</a>
          </div>
        <?php } ?>
      </section>
    </main>

    <footer class="site-footer">
    </footer>
  </body>
</html>
