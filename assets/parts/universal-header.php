<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="./assets/css/all.min.css" />
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="./assets/css/index.css" />
    <link rel="shortcut icon" href="./assets/images/script-feather-logo.svg" type="image/x-icon">
    <title><?php echo $title?> | Script Feather</title>
  </head>
  <body>
    <section class="archives" id="posts">
      <nav class="navbar navbar-expand-lg navbar-dark sticky-top" id="navspy">
        <div class="container">
          <a class="navbar-brand" href="index.php">
            <img src="./assets/images/script-feather-logo.svg" alt="" />
            Script Feather
          </a>

          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>

          <div
            class="collapse navbar-collapse justify-content-end"
            id="navbarSupportedContent"
          >
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="index.php#about">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="archives.php">Blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="index.php#contact">Contact</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </section>
