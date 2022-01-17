<?php
/**
 * 'View' for the 'Orders' page.
 * @link https://domainename.com/orders
 *
 * Contains all data we see on the 'Orders' page between <main></main> html tags
 */
 ?>

<!-- Orders data -->
<div class="content">

    <h1 class="orders-header"><?= $pageData->link_h1; ?></h1>

 <div class="row">

      <div class='col-md-4 mb-4'>
          <div class='card show-order-data'
              data-value="show-doubled-emails">

              <div class='card-body'>
                  <h5 class='card-title'>Повторяющиеся email</h5>
              </div>

          </div>
      </div>

      <div class='col-md-4 mb-4'>
          <div class='card show-order-data'
              data-value="show-logins-without-orders">

              <div class='card-body'>
                  <h5 class='card-title'>Логины без заказов</h5>
              </div>

          </div>
      </div>

      <div class='col-md-4 mb-4'>
          <div class='card show-order-data'
              data-value="show-logins-with-more-than-two-orders">

              <div class='card-body'>
                  <h5 class='card-title'>Логины более двух заказов</h5>
              </div>

          </div>
      </div>

  </div>
</div>

<div class="row orders-results"></div>
