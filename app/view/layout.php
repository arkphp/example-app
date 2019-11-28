<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Example Application</title>
</head>
<body>
  <header>
    <ul>
      <li><a href="/">Home</a></li>
      <li><a href="/about">About</a></li>
      <li><a href="/contact">Contact</a></li>
      <li><a href="/config">Config</a></li>
    </ul>
  </header>
  <hr>
  <article>
    <?php $this->block('content');?>
  </article>
  <hr>
  <footer>&copy;<a href="https://github.com/arkphp">Arkphp</a></footer>
</body>
</html>