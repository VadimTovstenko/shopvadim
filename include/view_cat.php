<?php
include("include/db_connect.php");
include("functions/functions.php");

$cat = clear_string($_GET["cat"]);
$type = clear_string($_GET["type"]);

$sorting = $_GET["sort"];

switch ($sorting)
{
	case 'price-asc';
	$sorting = 'price ASC';
	$sort_name = 'От дешевых к дорогим';
	break;

	case 'price-desc';
	$sorting = 'price DESC';
	$sort_name = 'От дорогих к дешевым';
	break;

	case 'popular';
	$sorting = 'count DESC';
	$sort_name = 'Популярное';
	break;

	default:
	$sorting = 'products_id DESC';
	$sort_name = 'Нет сортировки';
	break;
}

?>

<!DOCTYPE HTML>
<html lang="ru">
<html>
	<head>
		<meta charset="utf-8">

		<link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
		<script type="text/javascript" script src="/js/jquery-3.4.0.min.js"></script>
		<script type="text/javascript" script src="/js/jcarousellite_1.0.1.js"></script>
		<script type="text/javascript" script src="/js/shop-script.js"></script>

		<title>ShopVadim</title>
	</head>

	<body>

    <div id="block-body">
        <?php
        include("include/block-header.php");
        ?>

      <div id="block-right">
				<?php
				include("include/block-category.php");
				include("include/block-parameter.php");
				include("include/block-news.php");
				?>
      </div>

      <div id="block-content">
				<div id="block-sorting">
					<p id="nav-breadcrumbs"><a href="index.php">Главная страница</a>\ <span>Все товары</span></p>
						<ul id="option-list">
							<li>Вид:</li>
								<li><img id="style-grid" src="/images/#"/></li>
								<li><img id="style-list" src="/images/#"/></li>
							<li>Сортировка:</li>
								<li><a id="select-sort"><?php echo $sort_name; ?></a>

									<ul id="sorting-list">
										<li><a href="index.php?sort=price-asc">От дешевых к дорогим</a></li>
										<li><a href="index.php?sort=price-desc">От дорогих к дешевым</a></li>
									  <li><a href="index.php?sort=popular">Популярное</a></li>
									</ul>
								</li>
						</ul>
				</div>


				<ul id="block-tovar-grid">
				<?php

          if (!empty($cat) && !empty($type))
          {
            $querycat = "AND brand='$cat' AND type_tovara='$type'";
          }



			  	$result = mysql_query("SELECT * FROM table_products WHERE visible='1' $querycat ORDER BY $sorting", $link);

					if (mysql_num_rows($result) > 0)
					{
						$row = mysql_fetch_array($result);

					do
					{

					if ($row["image"] != "" && file_exists("./upload_images/".$row["image"]))
					{
					$img_path = './upload_images/'.$row["image"];
					$max_width = 200;
					$max_height = 200;
						list($width, $height) = getimagesize($img_path);
						$ratioh = $max_height/$height;
						$ratiow = $max_width/$width;
						$ratio = min($ratioh, $ratiow);
						$width = intval($ratio*$width);
						$height = intval($ratio*$height);
					}	else
					{
					$img_path = "/images/no-image.png";
					$width = 110;
					$height = 200;
					}

					echo '
						<li>
						 <div class="block-images-grid">
						 	<img src="'.$img_path.'" width="'.$width.'" height="'.$height.'"/>
						 </div>
							 <p class="style-title-grid"> <a href=" ">'.$row["title"].'</a></p>
							 	<ul class="review-and-counts-grid">
							 		<li><img src="/images/#" /><p>0</p></li>
									<li><img src="/images/#2" /><p>0</p></li>
							 	</ul>
									<a class="add-cart-style-grid"></a>
									<p class="style-price-grid"><strong>'.$row["price"].'</strong>грн.</p>
										<div class="mini-features">
										'.$row["mini_features"].'
										</div>
						</li>
					';
					}
						while ($row = mysql_fetch_array($result));
				  }
			  ?>
			</ul>




			<ul id="block-tovar-list">
			<?php
				$result = mysql_query("SELECT * FROM table_products WHERE visible='1' ORDER BY $sorting", $link);

				if (mysql_num_rows($result) > 0)
				{
					$row = mysql_fetch_array($result);

				do
				{

				if ($row["image"] != "" && file_exists("./upload_images/".$row["image"]))
				{
				$img_path = './upload_images/'.$row["image"];
				$max_width = 150;
				$max_height = 150;
					list($width, $height) = getimagesize($img_path);
					$ratioh = $max_height/$height;
					$ratiow = $max_width/$width;
					$ratio = min($ratioh, $ratiow);
					$width = intval($ratio*$width);
					$height = intval($ratio*$height);
				}	else
				{
				$img_path = "/images/no-image.png";
				$width = 110;
				$height = 200;
				}

				echo '
					<li>
					 <div class="block-images-list">
						<img src="'.$img_path.'" width="'.$width.'" height="'.$height.'"/>
					 </div>


							<ul class="review-and-counts-list">
								<li><img src="/images/#" /><p>0</p></li>
								<li><img src="/images/#2" /><p>0</p></li>
							</ul>

								<p class="style-title-list"> <a href=" ">'.$row["title"].'</a></p>

								<a class="add-cart-style-list"></a>
								<p class="style-price-list"><strong>'.$row["price"].'</strong>грн.</p>
									<div class="style-text-list">
									'.$row["mini_description"].'
									</div>
					</li>
				';
				}
					while ($row = mysql_fetch_array($result));
				}
			?>
			</ul>



      </div>

        <?php
        include("include/block-footer.php");
        ?>
      </div>


	</body>

</html>
