<?php
  // Tableau des navigations (autant d'éléments que de menus)
  $nav = ["home" => "", "news" => "", "contact" => "", "about" => "" ];
  if (isset( $_GET["nav"])) {
    $option_active = $_GET["nav"];
    if (array_key_exists($option_active, $nav)) {
        $nav[$option_active] = "active";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 16px;
  text-decoration: none;
}

li.active {
    background-color:#aaaaaa;
    color:thistle;
}

</style>
</head>
<body>

<h2>Menu de navigation</h2>
<p>Faites en sorte que le l'option de menu sélectionnée soit visible</p>

<ul>
  <li class="<?php echo $nav["home"] ?>"><a href="?nav=home">Home</a></li>
  <li class="<?php echo $nav["news"] ?>"><a href="?nav=news">News</a></li>
  <li class="<?php echo $nav["contact"] ?>"><a href="?nav=contact">Contact</a></li>
  <li class="<?php echo $nav["about"] ?>"><a href="?nav=about">About</a></li>
</ul>

</body>
</html>
