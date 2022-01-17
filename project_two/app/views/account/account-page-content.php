<?php
/**
 * 'View' for the Blog page
 *
 * @link https://domainename.com/account
 *
 * Contains all data we see on the Blog page between <main></main> html tags
 */
include("app/includes/if-user-not-signed-in.inc.php");

// Get user's info
$userData = new App\Models\Account();
$userData = $userData->getOne($_SESSION['user'][0]);
?>

<!-- Account info -->
<div class="content">

      <h1><?= $pageData->link_h1; ?></h1>

  <div class="row">

    <div class="col-lg-8 col-sm-11">

      <div class="account-block">

          <div class="row info-block">

              <div class="col-md-2 col-3 account-a">Name: </div>
              <div class="col-md-4 col-9 account-b">
                <div class="user-name-info"><?= $userData->name; ?></div>
                <div class="form-edit-user-name">
                  <input type="text"
                    class="form-control"
                    id="user-name"
                    maxlength="50"
                    placeholder="<?= $userData->name; ?>"
                    autocomplete="off">
                  <span class="user-name-alert">Wrong symbol or empty!</span>
                </div>
              </div>
              <div class="col-md-2 col-6 account-a">
                <button class="btn-account btn-edit-info user-name-edit"
                  data-user-id='<?= $userData->id; ?>'
                  data-value='user-name'>Edit</button>
              </div>

              <div class="col-md-2 col-6 account-a user-name-cancel">
                <button class="btn-account btn-edit-info btn-edit-info-cansel"
                  data-user-id='<?= $userData->id; ?>'
                  data-value='user-name'>Cancel</button>
              </div>

              <div class="col-md-2"></div>

          </div>

          <div class="row info-block">

            <div class="col-md-2 col-3 account-a">Last Name:</div>
            <div class="col-md-4 col-9 account-b">
              <div class="user-last-name-info"><?= $userData->last_name; ?></div>
              <div class="form-edit-user-last-name">
                <input type="text"
                  class="form-control"
                  id="user-last-name"
                  maxlength="50"
                  placeholder="<?= $userData->last_name; ?>"
                autocomplete="off">
                <span class="user-last-name-alert">Wrong symbol or empty!</span>
              </div>
            </div>

            <div class="col-md-2 col-6 account-a">
              <button class="btn-account btn-edit-info user-last-name-edit"
                data-user-id='<?= $userData->id; ?>'
                data-value='user-last-name'>Edit</button>
            </div>

            <div class="col-md-2 col-6 account-a user-last-name-cancel">
              <button class="btn-account btn-edit-info btn-edit-info btn-edit-info-cansel"
                data-user-id='<?= $userData->id; ?>'
                data-value='user-last-name'>Cancel</button>
            </div>

            <div class="col-md-2"></div>

          </div>

        <div class="row info-block">

          <div class="col-md-2 col-3 account-a">Password:</div>
          <div class="col-md-4 col-9 account-b">

            <div class="form-group">
              <input type="password"
                class="form-control"
                id="user-pw"
                maxlength="50"
                placeholder="Enter new password"
              autocomplete="off">
              <span class="user-pw-alert">Wrong symbol or empty!</span>
              <span class="eye-icon-pw eye-icon-pw-update" data-input-id="user-pw"><i class='fa fa-eye fa-fw'></i></span>
            </div>

          </div>

          <div class="col-md-2 col-6 account-a">
            <button class="btn-account btn-edit-info user-pw-edit"
              data-user-id='<?= $userData->id; ?>'
              data-value='user-pw'>Update</button>
          </div>

          <div class="col-md-2"></div>

        </div>

          <div class="account-form-messages form-messages"></div>
          <div class="account-form-pop-up"></div>

          <div class="pw-updated">Your password was updated!</div>

        </div> <!-- end Account-block -->

      </div> <!-- end col-lg-8-->

    <div class="col-lg-4 col-sm-1"></div>
  </div> <!-- end row -->
</div> <!-- end content -->
