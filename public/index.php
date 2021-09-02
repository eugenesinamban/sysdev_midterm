<?php
require_once(__DIR__ . '/libs/message_repository.php');
$message_repository = new MessageRepository();
$messages = $message_repository->fetch_messages();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Final Project</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <header>
    <h1>
      掲示板
    </h1>
  </header>

  <main>
    <div class='wrap'>
      <form action="insert.php" method="POST" enctype="multipart/form-data">
        <div class="form_control">
          <label for="title">タイトル</label>
          <input type="text" id="title" placeholder="テキスト" name="title" required>
        </div>
        <div class="form_control">
          <label for="message">メッセージ</label>
          <input type="text" id="message" placeholder="内容" name="message" required>
        </div>
        <div class="form_control">
          <label for="image">画像</label>
          <input id="file" onchange="onChange(this)" type="file" name="image">
        </div>
        <div class="form_control submit">
          <input type="submit">
        </div>
      </form>
      <!-- ----------------------------------- -->
      <hr>
      <?php foreach ($messages as $message): ?>
        <?php $matches = []; ?>
        <dt id="<?php echo $message['id']; ?>"><?php echo $message['id']; ?></dt>
        <dt>日時</dt>
          <dd><?php echo $message['created_at']; ?></dd>
        <dt>タイトル</dt>
          <dd><?php echo htmlspecialchars($message['title']); ?></dd>
        <dt>内容</dt>
          <?php if (1 === preg_match('/^>>[0-9]{1,}/', $message['message'], $matches)): ?>
          <?php $id = substr($matches[0], 2)?>
          <dd><a href="#<?php echo $id; ?>">>><?php echo $id ?></a></dd>
          <dd><?php echo htmlspecialchars(preg_replace('/^>>[0-9]{1,}/', '', $message['message'])); ?></dd>
          <?php else: ?>
          <dd><?php echo htmlspecialchars($message['message']); ?></dd>
          <?php endif; ?>
          <?php if (!empty($message['image_filename'])): ?>
          <dd><img src="../image/<?php echo htmlspecialchars($message['image_filename']);?>"></dd>
          <?php endif; ?>
        <hr>
      <?php endforeach;?>
    </div>
  </main>
  <footer>
    <ul>
      <li>Eugene Sinamban</li>
      <li>19d2030010sy@edu.tech.ac.jp</li>
      <li><a href="https://github.com/eugenesinamban">Github Page</a></li>
    </ul>
  </footer>
</body>

</html>