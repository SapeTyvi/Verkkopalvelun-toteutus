<?php 
// seuraava rivi tulostaa error lokin selainikkunaan
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  ini_set('log_errors', TRUE); // Error logging
  ini_set('error_log', 'error.log'); // Logging file
  ini_set('log_errors_max_len', 1024); // Logging file size

include('functions.php');
include('session.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="task-style.css" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="tasks-script.js"></script>
    <title>Tasks</title>
</head>
<body>
    <div class="navbar navbar-inverse">            
        <div class="btn-group filter-button">
            <button id="filter" type="button" class="btn btn-info dropdown-toggle"  aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-filter"></i>
            </button>            
			<a href="logout.php" class="logOutBtn">Kirjaudu ulos</a>
			
        </div>
		<h3>Tervetuloa <?php echo $login_session; ?></h3>		
    </div>
    <form class="sorting-form" action="">
    <div class="filter-city" id="dropdown">
      <label class="city-list-toggle"><h4>Valitse kaupunki</h4></label>
      <i class="fas fa-chevron-down"></i>
      <select class="city-list" size="3">
          <option class="city-list-item" href="#">Espoo</option>         
          <option class="city-list-item" href="#">Helsinki</option>
          <option class="city-list-item" href="#">Vantaa</option>   
      </select>                  
    </div>
    <div class="filter-job" id="dropdown">
        <label class="job-list-toggle"><h4>Valitse Työ</h4></label>
        <i class="fas fa-chevron-down"></i>
        <select class="job-list" size="3">
            <option class="job-list-item" href="#">Siivous</option>
            <option class="job-list-item" href="#">Remontti</option>
            <option class="job-list-item" href="#">Muutto</option>  
        </select>                  
      </div>
      <div class="filter">
          <label><h4>Suodata</h4></label>
      </div>      
    </form>
    <div class="task-container"> 
    <table>
        <caption>Selaa urakoita <span id="selected-filter"></span></caption>
        <thead>
          <tr>
            <th scope="col">Työ</th>
            <th scope="col">Työn selite</th>
            <th scope="col">Kaupunki</th>
            <th scope="col">Postinumero</th>
            <th scope="col">Lisätiedot</th>        
          </tr>
        </thead>
        <tbody>
          <?php $rows = db_select("SELECT * FROM `jobs` WHERE 1");
        foreach($rows as $row){ ?>
          <tr>
            <td data-label="<?php echo $row['job']; ?>"><?php echo $row['job']; ?></td>
            <td data-label="<?php echo $row['job_subcategory']; ?>"><?php echo $row['job_subcategory']; ?></td>
            <td data-label="<?php echo $row['city']; ?>"><?php echo $row['city']; ?></td>
            <td data-label="<?php echo $row['zipcode']; ?>"><?php echo $row['zipcode']; ?></td>
            <td data-label=""><button>Lisätiedot</button></td>
          </tr>
          <?php }  ?>       
        </tbody>
      </table>
    </div>
</body>
</html>