<!DOCTYPE  HTML>
<html>
  <head>
    <meta  http-equiv="Content-Type" content="text/html;  charset=iso-8859-1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>NBA Stats</title>
  </head>
  <body>
    <div class="container">
      <h3>Search for an NBA Player</h3>
      <p>You  may search either by first or last name</p>
      <form  method="post" action="getplayers.php"  id="searchform">
        <div class="form-group">
          <input  type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-default">Search</button>
        </div>
      </form>
    <div class="container">
  </body>
</html>