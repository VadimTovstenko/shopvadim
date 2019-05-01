<div id="block-parameter">
    <p class="header-title">Поиск по параметрам</p>

    <p class="title-filter">Стоимость</p>

    <form method="GET" action="search-filter.php">
      <div id="block-input-price">
        <ul>
          <li><p>от</p></li>
          <li><input type="text" id="start-price" name="start_price" value="1000" /></li>
          <li><p>до</p></li>
          <li><input type="text" id="end-price" name="end_price" value="30000" /></li>
          <li><p>грн.</p></li>
        </ul>
      </div>

     <p class="title-filter">Производители</p>
        <ul class="checkbox-brand">
          <li><input type="checkbox" id="checkboxbrand1"/> <label for="checkboxbrand1">Бренд 1</label> </li>
          <li><input type="checkbox" id="checkboxbrand1"/> <label for="checkboxbrand2">Бренд 2</label> </li>
          <li><input type="checkbox" id="checkboxbrand1"/> <label for="checkboxbrand3">Бренд 3</label> </li>
        </ul>

        <center><input type="submit" name="submit" id="button-param-search" value=" " /></center>
    </form>

</div>
