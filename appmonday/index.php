<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>AppMonday by Nathan Fallet & Code Community</title>
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="apple-touch-icon" href="images/AppMondayRadius.png">
  </head>
  <body>
    <div class="content-box" id="content">
      <div class="content animatedbox">
        <div class="row">
          <div class="col-md-6">
            <h2>Submit your app!</h2>
            <form id="form">
              <div class="form-group">
                <label for="name">App name:</label>
                <input type="text" class="form-control" id="name" placeholder="My app">
              </div>
              <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" rows="3" id="description"></textarea>
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
          <div class="col-md-6">
            <h2>What is AppMonday?</h2>
            <p>Every Monday, we will share one app you submited here in our Instagram story. Fill this form and share with us your project! It can be a website, a mobile app, an open source project, ... everything you coded.</p>
            <p class="ig-links"><a href="https://www.instagram.com/nathanfallet/" target="_blank"><i class="fab fa-instagram"></i> nathanfallet</a><br/>
            <a href="https://www.instagram.com/code.community/" target="_blank"><i class="fab fa-instagram"></i> code.community</a></p>
          </div>
        </div>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>
