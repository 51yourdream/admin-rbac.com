<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
  <div class="alert alert-warning">
    邮件测试
  </div>
    <div style="height:40px;width: 100px;background: green;">按钮测试</div>
    <?php $pathToFile = "http://imgsrc.baidu.com/forum/pic/item/17519f03918fa0ec180312ef269759ee3f6ddb89.jpg" ?>
    <img src="<?php echo $message->embed($pathToFile); ?>">
</div>
</body>
</html>