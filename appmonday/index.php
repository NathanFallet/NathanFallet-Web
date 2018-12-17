<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>AppMonday</title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="macos-window">
      <div class="macos-titlebar">
        <div class="macos-buttons">
          <div class="macos-close">
            <a class="macos-closebutton" href="#"><span><strong>x</strong></span></a>
          </div>
          <div class="macos-minimize">
            <a class="macos-minimizebutton" href="#"><span><strong>&ndash;</strong></span></a>
          </div>
          <div class="macos-zoom">
            <a class="macos-zoombutton" href="#"><span><strong>+</strong></span></a>
          </div>
        </div>
        AppMonday by Nathan Fallet
      </div>
      <div class="macos-content">
        <div class="row">
          <div class="col-md-6">
            <h2>What is AppMonday?</h2>
            <p>Every Monday, we will share one app you submited here in our Instagram story. Fill this form and share with us your project! It can be a website, a mobile app, an open source project, ... everything you coded.</p>
          </div>
          <div class="col-md-6">
            <h2>Submit your app</h2>
            <form onsubmit="submitForm()">
              <div class="form-group">
                <label for="name">App name:</label>
                <input type="text" class="form-control" id="name" placeholder="My app">
              </div>
              <div class="form-group">
                <label for="user">Instagram username:</label>
                <input type="text" class="form-control" id="user" placeholder="@username">
              </div>
              <div class="form-group">
                <label for="link">App link:</label>
                <input type="text" class="form-control" id="link" placeholder="https://">
              </div>
              <input type="submit" class="btn btn-default" value="Submit">
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
