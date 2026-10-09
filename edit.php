<?php
include 'db.php';

$id = 0;
if (isset($_GET['id'])) {
  $id = (int) $_GET['id'];
}

if ($id <= 0) {
  header("Location: post.php");
  exit;
}

$result = mysqli_query($conn, "SELECT * FROM posts WHERE id = $id");
$row = mysqli_fetch_assoc($result);

if (!$row) {
  header("Location: post.php");
  exit;
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Edit Post | Marc Whesley Bartolome</title>
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
      <a href="post.php" class="nav-current">Posts</a>
      <a href="gallery.php">Gallery</a>
      <a href="index.php#footer">Contact</a>
    </nav>
  </header>

  <main>
    <section class="hero hero-subpage">
      <h1>Edit Portfolio Post</h1>

    </section>

    <section class="page-section upload-layout">
      <div class="card form-panel">
        <div class="section-heading section-heading-tight">
          <div>
            <h2>Edit Form</h2>
            <p class="section-copy">Change the text, date, or replace the uploaded image.</p>
          </div>
        </div>

        <form action="update.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
          <div class="grid-2">
            <div>
              <label for="edit-title">Title</label>
              <input id="edit-title" type="text" name="title" value="<?php echo htmlspecialchars($row['title']); ?>" required />
            </div>
            <div>
              <label for="edit-date">Date</label>
              <input id="edit-date" type="date" name="date" value="<?php echo htmlspecialchars($row['date']); ?>" required />
            </div>
          </div>
          <div>
            <label for="edit-image">Replace Image</label>
            <input id="edit-image" type="file" name="image" accept="image/*" />
          </div>
          <div>
            <label for="edit-description">Description</label>
            <textarea id="edit-description" name="description"><?php echo htmlspecialchars($row['description']); ?></textarea>
          </div>
          <div class="form-actions">
            <button class="btn primary" type="submit">Update Post</button>
            <a class="btn" href="post.php">Back to Posts</a>
          </div>
        </form>
      </div>

      <div class="stack">
        <div class="card current-image">
          <h3>Current Image</h3>
          <img src="<?php echo htmlspecialchars($row['image_path']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>">
          <p class="section-copy"><?php echo htmlspecialchars($row['title']); ?></p>
        </div>
      </div>
    </section>
  </main>

  <footer class="site-footer">
  </footer>
</body>

</html>
