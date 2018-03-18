<?php 
// seuraava rivi tulostaa error lokin selainikkunaan
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  ini_set('log_errors', TRUE); // Error logging
  ini_set('error_log', 'error.log'); // Logging file
  ini_set('log_errors_max_len', 1024); // Logging file size

include('functions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--link rel="stylesheet" href="style.css" type="text/css"-->
    <link rel="stylesheet" href="task-style.css" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" language="javascript" src="TableFilter/tablefilter.js"></script>  
    <script src="tasks-script.js"></script>
    <title>Tasks</title>
</head>
<body>
      <div class="load"></div>
      <div class="navbar navbar-inverse">            
        <div class="btn-group filter-button">
            <button id="filter" type="button" class="btn btn-info dropdown-toggle"  aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-filter"></i>
            </button>            
        </div>       
    </div>
    <form class="sorting-form" action="">
    <div class="filter-city" id="dropdown">
      <label class="city-list-toggle"><h4>Valitse kaupunki</h4></label>
      <i class="fas fa-chevron-down"></i>
       <select class="city-list" size="5">      
       <option class="city-list-item" href="#" data-value="">Näytä kaikki</option>
      <?php $rows = db_select("SELECT * FROM `jobs` GROUP BY city");
        foreach($rows as $row){ ?>
              <option class="city-list-item" href="#" data-value="<?php echo $row['city']; ?>"><?php echo $row['city']; ?></option>
         <?php }  ?>  
           
      </select>                  
    </div>
    <div class="filter-job" id="dropdown">
        <label class="job-list-toggle"><h4>Valitse Työ</h4></label>
        <i class="fas fa-chevron-down"></i>
        <select class="job-list" size="7">
        <option class="job-list-item" href="#" data-value="">Näytä kaikki</option>
            <?php $rows = db_select("SELECT * FROM `jobs` GROUP BY job");
              foreach($rows as $row){ ?>
                  <option class="job-list-item" href="#" data-value="<?php echo $row['job']; ?>"><?php echo $row['job']; ?></option>
            <?php }  ?>              
        </select>                  
      </div>
      <div class="filter">
          <label><h4>Suodata</h4></label>
      </div>      
    </form>    
    <div class="task-container"> 
    <table id="table">
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
          <tr data-id="<?php echo $row['id']; ?>">
            <td data-label="Työ"><?php echo $row['job']; ?></td>
            <td data-label="Työn selite"><?php echo $row['job_subcategory']; ?></td>
            <td data-label="Kaupunki"><?php echo $row['city']; ?></td>
            <td data-label="Postinumero"><?php echo $row['zipcode']; ?></td>
            <!--td data-label="Lisätiedot"><button data-button="<?php echo $row['id']; ?>" class="show-more-info">Lisätiedot</button></td-->
            <td>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#<?php echo $row['id']; ?>">
            Lisätiedot
            </button>
            <div class="modal fade" id="<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $row['id']; ?>-Label" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="<?php echo $row['id']; ?>-Label"><?php echo $row['job_subcategory'] .' '. $row['city']; ?> </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <ul class="desciption">
                      <?php $description = explode('||',$row['description']); 
                            for($i = 0; $i < count($description); $i++){
                              echo "<li>$description[$i]</li>";
                            }
                      ?>
                    </ul>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Sulje</button>                    
                  </div>
                </div>
              </div>
            </div>
            </td>
          </tr>
                  
          <?php }  ?>       
        </tbody>
      </table>
    </div>
</body>
</html>