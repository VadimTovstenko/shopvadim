<div id="block-category">
  <p class="header-title">Категории товаров</p>

  <ul>
      <li><a><img src="/images/#6" id="mobile-image"/>Мобильные телефоны</a>

        <ul class="category-section">
          <li><a href=""><strong>Все модели</strong></a></li>

          <?php
          $result = mysql_query("SELECT * FROM category WHERE type='mobile'", $link);

          if (mysql_num_rows($result) > 0)
          {
            $row = mysql_fetch_array($result);

          do
          {

          echo '
            <li><a href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>

          ';
          }
            while ($row = mysql_fetch_array($result));
          }
          ?>

        </ul>
      </li>

      <li><a><img src="/images/#7" id="book-image"/>Ноутбуки</a>

        <ul class="category-section">
          <li><a href=""><strong>Все модели</strong></a></li>

          <?php
          $result = mysql_query("SELECT * FROM category WHERE type='notebook'", $link);

          if (mysql_num_rows($result) > 0)
          {
            $row = mysql_fetch_array($result);

          do
          {

          echo '
            <li><a href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>

          ';
          }
            while ($row = mysql_fetch_array($result));
          }
          ?>

        </ul>
      </li>

      <li><a><img src="/images/#8" id="table-image"/>Планшеты</a>

        <ul class="category-section">
          <li><a href=""><strong>Все модели</strong></a></li>

          <?php
          $result = mysql_query("SELECT * FROM category WHERE type='notepad'", $link);

          if (mysql_num_rows($result) > 0)
          {
            $row = mysql_fetch_array($result);

          do
          {

          echo '
            <li><a href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>

          ';
          }
            while ($row = mysql_fetch_array($result));
          }
          ?>

        </ul>
      </li>


  </ul>
</div>
