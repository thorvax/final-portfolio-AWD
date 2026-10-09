<?php
include 'db.php';

$message = '';
$messageType = 'success';

if (isset($_POST['send_message'])) {
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $text = mysqli_real_escape_string($conn, $_POST['message']);

  if ($name == '' || $email == '' || $text == '') {
    $message = 'Please fill in all contact fields.';
    $messageType = 'error';
  } else {
    mysqli_query($conn, "INSERT INTO messages (name, email, message) VALUES ('$name', '$email', '$text')");
    $message = 'Message saved.';
  }
}

$latestPosts = mysqli_query($conn, "SELECT * FROM posts ORDER BY id DESC LIMIT 3");
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Marc Whesley Bartolome</title>
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
      <a href="index.php#home" class="nav-current">Home</a>
      <a href="index.php#who-i-am">About me</a>
      <a href="index.php#skills">Skills</a>
      <a href="index.php#projects-section">Projects</a>
      <a href="post.php">Posts</a>
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

    <section class="hero" id="home">
      <h1>Marc Whesley Bartolome</h1>
      <p>
        A passionate individual with a love for technology and creativity. 
        I enjoy exploring new ideas and sharing my journey with others.
      </p>
      <div class="actions">
        <a class="btn primary" href="#projects-section">View Projects</a>
        <a class="btn" href="#footer">Contact Me</a>
      </div>
    </section>

    <section class="who" id="who-i-am">
      <div class="flex-row">
        <img src="assets/images/profile/1x1-photo-of-myself.jpg" class="avatar" alt="Marc Whesley Bartolome" />
        <h2>Who I am</h2>
      </div>
      <div class="card">
        <p>
          Hello! I'm Marc Whesley, a passionate individual with a love for
          technology and creativity. I enjoy exploring new ideas, building useful
          software, and sharing my journey with others.
        </p>
      </div>

      <h2 class="section-offset">My interest</h2>
      <div class="grid-2">
        <div class="card interest">
          <h4>Technology and Innovation</h4>
          <p>Staying updated with the latest tech trends and innovations.</p>
        </div>
        <div class="card interest">
          <h4>Programming</h4>
          <p>Building solutions and bringing ideas to life through code.</p>
        </div>
        <div class="card interest">
          <h4>Exploring different kinds of food</h4>
          <p>Discovering diverse cuisines and memorable culinary experiences.</p>
        </div>
        <div class="card interest">
          <h4>Reading and watching series</h4>
          <p>Enjoying great stories through books, film, and television.</p>
        </div>
      </div>
    </section>

    <section id="skills">
      <h2>Skills</h2>
      <div class="card intro-card" style="margin-bottom: 20px;">
        <p>
          A practical mix of software development, UI work, and database familiarity,
          with strongest confidence in Java and problem-focused implementation.
        </p>
      </div>
      <div class="skills-grid">
        <div class="skill">
          <span>Database Management</span>
          <div class="bar">
            <div style="width: 72%"></div>
          </div>
        </div>
        <div class="skill">
          <span>Java Programming</span>
          <div class="bar">
            <div style="width: 85%"></div>
          </div>
        </div>
        <div class="skill">
          <span>App Development</span>
          <div class="bar">
            <div style="width: 40%"></div>
          </div>
        </div>
        <div class="skill">
          <span>Java Swing (GUI Development)</span>
          <div class="bar">
            <div style="width: 65%"></div>
          </div>
        </div>
        <div class="skill">
          <span>UI/UX Design</span>
          <div class="bar">
            <div style="width: 70%"></div>
          </div>
        </div>
        <div class="skill">
          <span>Arduino / Embedded Basics</span>
          <div class="bar">
            <div style="width: 55%"></div>
          </div>
        </div>
        <div class="skill">
          <span>PHP</span>
          <div class="bar">
            <div style="width: 55%"></div>
          </div>
        </div>
        <div class="skill">
          <span>C++ Programming</span>
          <div class="bar">
            <div style="width: 60%"></div>
          </div>
        </div>
      </div>
    </section>

    <section id="projects-section">
      <h2>Projects</h2>
      <div class="projects">
        <div class="card project">
          <img src="assets/images/projects/space_eater.png" alt="Space Eater Background Program" />
          <div class="pr-contents">
            <h4>Space Eater Background Program (C++)</h4>
            <p>
              A C++ background application that launches automatically on startup
              and runs quietly outside the taskbar.
            </p>
            <div class="tags">
              <div class="tag">C++</div>
              <div class="tag">File handling</div>
              <div class="tag">System operations</div>
            </div>
          </div>
        </div>
        <div class="card project">
          <img src="assets/images/projects/vending_machine.png" alt="Vending Machine System" />
          <div class="pr-contents">
            <h4>Vending Machine System (Java Swing)</h4>
            <p>
              A Java desktop application that simulates a vending machine using
              a graphical interface and object-oriented design.
            </p>
            <div class="tags">
              <div class="tag">Java</div>
              <div class="tag">Swing UI</div>
              <div class="tag">OOP</div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="posts-preview">
      <div class="section-heading">
        <div>
          <h2>Latest Posts</h2>

        </div>
        <a class="btn btn-small" href="post.php">View All Posts</a>
      </div>

      <?php if (mysqli_num_rows($latestPosts) > 0) { ?>
        <div class="post-preview-grid">
          <?php while ($post = mysqli_fetch_assoc($latestPosts)) { ?>
            <?php
            $showDate = $post['date'];
            if ($showDate != '') {
              $showDate = date('F j, Y', strtotime($showDate));
            } else {
              $showDate = 'No date';
            }

            $shortDescription = $post['description'];
            if (strlen($shortDescription) > 120) {
              $shortDescription = substr($shortDescription, 0, 120) . '...';
            }
            ?>
            <article class="card post-preview-card">
              <img src="<?php echo htmlspecialchars($post['image_path']); ?>" alt="<?php echo htmlspecialchars($post['title']); ?>" loading="lazy" />
              <div class="post-preview-copy">
                <p class="post-meta"><?php echo htmlspecialchars($showDate); ?></p>
                <h4><?php echo htmlspecialchars($post['title']); ?></h4>
                <p><?php echo htmlspecialchars($shortDescription); ?></p>
              </div>
            </article>
          <?php } ?>
        </div>
      <?php } else { ?>
        <div class="card empty-state">
          <h4>No posts yet</h4>
        </div>
      <?php } ?>
    </section>

    <section id="upload-form">
      <div class="section-heading">
        <div>
          <h2>Add New Post</h2>
          <p class="section-copy">
            Upload a project image and publish it.
          </p>
        </div>
        <a class="btn btn-small" href="gallery.php">Open Gallery</a>
      </div>

      <form class="card form-panel" action="upload.php" method="POST" enctype="multipart/form-data">
        <div class="grid-2">
          <div>
            <label for="post-title">Title</label>
            <input id="post-title" type="text" name="title" placeholder="Project title" required />
          </div>
          <div>
            <label for="post-date">Date</label>
            <input id="post-date" type="date" name="date" required />
          </div>
        </div>
        <div>
          <label for="post-image">Image</label>
          <input id="post-image" type="file" name="image" accept=".jpg,.jpeg,.png,.gif,.webp" required />
        </div>
        <div>
          <label for="post-description">Description</label>
          <textarea id="post-description" name="description" placeholder="Write a short description for the post"></textarea>
        </div>
        <div class="form-actions">
          <button class="btn primary" type="submit" name="save_post">Upload Post</button>
          <a class="btn" href="upload.php">Open Full Upload Page</a>
        </div>
      </form>
    </section>


    <footer class="site-footer">

      <section class="contact" id="footer">
        <h2 class="contact-title">Get in touch</h2>
        <div class="contact-grid">
          <div class="card">
            <div class="flex-row">
              <img src="assets/images/icons/email-icon.png" alt="" class="icon" />
              <h4>Send me a message</h4>
            </div>
            <form action="index.php#footer" method="post">
              <div class="flex">
                <input name="name" placeholder="Your name" required />
                <input name="email" type="email" placeholder="your.email@example.com" required />
                <textarea
                  name="message"
                  placeholder="Your message here..."
                  required></textarea>
                <button class="btn primary margin-around" type="submit" name="send_message">Send</button>

              </div>
            </form>
          </div>


          <div class="card">
            <div class="flex-row">
              <img src="assets/images/icons/click-icon.png" alt="" class="icon" />
              <h4>Connect With me</h4>
            </div>
            <div class="link-stack">
              <div class="address-card">
                <a href="https://github.com/thorvax" target="_blank">
                  <img src="assets/images/icons/github-icon.png" alt="" class="icon" />
                  <p>Github</p>
                </a>
              </div>
              <div class="address-card">
                <a href="https://www.facebook.com/throvax" target="_blank">
                  <img src="assets/images/icons/fb-icon.png" alt="" class="icon" />
                  <p>Facebook</p>
                </a>
              </div>
              <div class="address-card">
                <a href="https://mail.google.com/mail/u/0/?fs=1&tf=cm&source=mailto&to=bartolome.marc.whesley@gmail.com" target="_blank">
                  <img src="assets/images/icons/email-icon.png" alt="" class="icon" />
                  <p>bartolome.marc.whesley@gmail.com</p>
                </a>
              </div>
            </div>
            <p class="contact-copy">
              I'm always open to new opportunities and collaborations. Feel free
              to reach out if you'd like to discuss a project or just say hello.
            </p>
          </div>
        </div>
      </section>
  </main>



  </footer>
</body>

</html>


