<?php

//fb fb Google  

  session_start();
   
  if(!isset($_SESSION['userId'])) 
        {

            header("location: https://affiliate.traveliq.in/login.php");
        }  
               
        if( isset($_POST['logout'])) {
            session_destroy();
            header("location: https://affiliate.traveliq.in/login.php");
        }




require_once 'db.php';

$userid = $_SESSION['userId'];


$stmtud = $pdo -> prepare('SELECT * from user_details WHERE aff_id = ? ');
$stmtud -> execute([$userid]);
if($user1 = $stmtud->fetch())
{
    $name = $user1->aff_fullname;
    $mobile = $user1->aff_mobile;
    $email = $user1->aff_email;
    $reffid = $user1->aff_uid;
    $afflink = "https://traveliq.in/irctc-agent-registration/?reffid=".$reffid;

    $perPage = 10;

    // Calculate Total pages
    $stmt = $pdo->prepare('SELECT count(*) FROM visitor WHERE aff_reffid = ?');
    $stmt -> execute([$reffid]);
    $total_results = $stmt->fetchColumn();
    $total_pages = ceil($total_results / $perPage);
    

    // Current page
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $starting_limit = ($page - 1) * $perPage;

    // Query to fetch users
    $query = "SELECT * FROM visitor WHERE aff_reffid = $reffid ORDER BY aff_id DESC LIMIT $starting_limit,$perPage";

    // Fetch all users for current page
    $users = $pdo->query($query)->fetchAll();


}
else{
    $userd = "no details found";
}

$pdo = null;

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Affiliate Dashboard</title>
</head>
<body>


<div class="container-sm mt-2">
    <div class="card bg-dark text-light rounded">
        <div class="card-header text-center m-2"> 
            <div class="d-sm-flex justify-content-between">
                <div class="p-2 m-2 bg-light text-dark rounded"><h6>Hi <?php  echo $name; ?></h6></div>
                <div class="p-2"><h3>Affiliate Dashboard </h3></div>
                <div class="px-4 py-2 m-2 bg-primary rounded"><h6>Reference ID: <?php  echo $reffid; ?></h6></div>
            </div>

        </div>

        <div class="card-body bg-light text-light">


            <div class="d-sm-flex align-content-start">
                <div class="nav justify-content-start flex-column nav-pills p-1" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active" id="v-pills-Profile4-tab" data-bs-toggle="pill" data-bs-target="#v-pills-Profile4" type="button" role="tab" aria-controls="v-pills-Profile4" aria-selected="true">Profile</button>
                    <button class="nav-link" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="false">Clicks</button>
                    <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Closed</button>
                    <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Payout</button>
                </div>
                <div class="tab-content d-sm-flex flex-fill m-1 px-3 border rounded" id="v-pills-tabContent">

                    <!-- 1st Tab -->

                    <div class="tab-pane fade show active flex-fill" id="v-pills-Profile4" role="tabpanel" aria-labelledby="v-pills-Profile4-tab">

                    
                        <div class="mt-3">
                            <div class=" text-center my-3 text-dark"> 
                                <h3><?php echo $name;?> Profile</h3>
                            </div>
                            <table class="table table-responsive-sm table-bordered text-center rounded">
                                <thead class="pt-5 text-dark bg-warning rounded">


                                
                                    <tr>
                                        <th>Name</th>
                                        <th>Email ID</th>
                                        <th>Mobile Number</th>
                                        <th>Affiliate Link</th>
                                        
                                    </tr>

                                </thead>
                                <tbody id="tbody">
                                                                        
                                    <tr class="bg-dark text-light">
                                        <td> <?php echo $name;?></td>

                                        <td> <?php echo $email; ?> </td>
                                        <td> <?php echo $mobile;?> </td>
                                        <td> <a href="<?php echo $afflink;?>" target="_blank" class="text-light">Visit</a> </td>


                                        
                                    </tr>


                                        
                                
                                </tbody>

                            </table>

                            
                        </div>

                    </div>                    


                    <!-- 2nd Tab -->
                                    
                    <div class="tab-pane fade flex-fill" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">

                        <div class="mt-3">
                            <div class=" text-center my-3 text-dark"> 
                                <h3><?php  echo $name; ?> Total Closed</h3>
                            </div>
                            

                            
                        </div>

                    </div>
                    <!-- 3nd Tab -->

                    <div class="tab-pane fade flex-fill" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        
                    <div class="mt-3">
                            <div class=" text-center my-3 text-dark"> 
                                <h3><?php echo $name;?> Total Payout</h3>
                            </div>
                            
                            
                        </div>

                    </div>
                    <!-- 4th Tab -->
                    
                    <div class="tab-pane fade flex-fill" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">



                            
                        <div class="container">

                            <div class="row-sm">
                                <div class="col p-3 rounded"></div>
                                <div class="col p-3 bg-success text-white text-center rounded"><h3>Total Clicks</h3><br>

                                    <div class="">

                                                                                
                                        <ul class="pagination justify-content-center">

                                            <li class="page-item links"><a class="page-link"><b><?php  echo $total_results; ?></b></a></li>

                                            </li>
                                        </ul>


                                    </div>

                                </div>
                                <div class="col p-3 rounded"></div>

                            </div>
                        </div>
                            
                            
                    </div>


                
                </div>
            </div>




 




        </div>



    

        <div class="container d-flex justify-content-end p-2">
            <form method="POST">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                
                                        <button class="btn btn-primary px-5 py-2" name="logout">Logout</button>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </form>          
        </div>
    </div>
</div>





</body>
</html>