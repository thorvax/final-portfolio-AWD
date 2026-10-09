Portfolio Project Structure

Main files in the project root
- index.php: Main homepage of the portfolio
- post.php: Displays all portfolio posts
- gallery.php: Displays posts in gallery view
- upload.php: Upload form and create operation
- edit.php: Edit form for an existing post
- update.php: Update operation for posts
- delete.php: Delete operation for posts
- db.php: Database connection and table setup
- styles.css: Main stylesheet

Folders
- assets/: Static images used by the site
  - images/profile/: Profile image
  - images/projects/: Project images
  - images/icons/: Icon images

- uploads/: Uploaded post images

- database/: Database export file for submission
  - portafoil_db.sql

Notes
- The homepage entry file is index.php
- The project uses root-level PHP files to keep the structure simple
- Uploaded images used by posts are stored in the uploads folder
- The database export for submission is in the database folder
