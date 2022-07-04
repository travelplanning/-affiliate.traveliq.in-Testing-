<?php



  session_start();
   
  if(!isset($_SESSION['userId'])) 
        {

            header("location: http://localhost/affiliate.traveliq.in/login.php");
        }  
               
        if( isset($_POST['logout'])) {
            session_destroy();
            header("location: http://localhost/affiliate.traveliq.in/login.php");
        }




require_once '..\db.php';

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
    $stmt = $pdo->prepare('SELECT count(*) FROM visitor');
    $stmt -> execute();
    $total_results = $stmt->fetchColumn();
    $total_pages = ceil($total_results / $perPage);
    

    // Current page
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $starting_limit = ($page - 1) * $perPage;

    // Query to fetch users
    $query = "SELECT * FROM visitor ORDER BY aff_id DESC LIMIT $starting_limit,$perPage";

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


<div class="container">
    <div class="card bg-dark text-light rounded mt-5">
        <div class="card-header text-center m-3"> 
            <div class="d-flex justify-content-between">
                <div class="p-2 m-2 bg-light text-dark rounded">Hi <?php  echo $name; ?></div>
                <!-- <div class="p-2">Affiliate Dashboard</div> -->
                <div class="px-4 py-2 m-2 bg-primary rounded">Reference ID: <?php  echo $reffid; ?></div>
            </div>

        </div>

        <div class="card-body bg-light text-light">


            <div class="d-flex align-content-start">
                <div class="nav justify-content-start flex-column nav-pills me-5 p-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active" id="v-pills-Profile4-tab" data-bs-toggle="pill" data-bs-target="#v-pills-Profile4" type="button" role="tab" aria-controls="v-pills-Profile4" aria-selected="true">Profile</button>
                    <button class="nav-link" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="false">Clicks</button>
                    <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Closed</button>
                    <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Payout</button>
                </div>
                <div class="tab-content d-flex flex-fill px-5 border rounded" id="v-pills-tabContent">

                        <!-- 1st Tab -->

                        <div class="tab-pane fade show active flex-fill" id="v-pills-Profile4" role="tabpanel" aria-labelledby="v-pills-Profile4-tab">

                        
                            <div class="mt-3">
                                <div class=" text-center my-3 text-dark"> 
                                    <h3><?php echo $name;?> Profile</h3>
                                </div>
                                <table class="table table-bordered text-center rounded">
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
                                            <td> <a href="<?php echo $afflink;?>" target="_blank" class="text-light"><?php echo $afflink;?></a> </td>


                                            
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


                            <div class="mt-3">
                                <div class=" text-center my-3 text-dark"> 
                                    <h3>Total Clicks</h3>
                                </div>
                                <table class="table table-bordered text-center rounded">
                                    <thead class="pt-5 text-dark bg-warning rounded">


                                    
                                        <tr>
                                            <th>Time</th>
                                            <!-- <th>ID</th> -->
                                            <th>Reffid</th>
                                            <th>IP Address</th>
                                            
                                        </tr>

                                    </thead>
                                    <tbody id="tbody">
                                        <?php foreach ($users as $key => $user): ?>
                                    
                                            <tr class="bg-dark text-light">
                                                <td> <?php echo $user->aff_timestamp;?></td>

                                                <td> <?php echo $user->aff_reffid; ?> </td>
                                                <td> <?php echo $user->aff_ipaddress;?> </td>
                                            </tr>

                                        <?php endforeach; ?>
                                            
                                    
                                    </tbody>

                                </table>

                                <div class="container p-0">
                                    <div class="row">
                                        <div class="col-6">

                                            <nav aria-label="Page navigation example">
                                                <ul class="pagination justify-content-left">
                                                

                                                    <?php for ($page=1; $page <= $total_pages; $page++):?>


                                                        <li class="page-item links"><a class="page-link" href="<?php echo "?page=$page"; ?>"><?php  echo $page; ?></a></li>

                                                        </a>

                                                    <?php endfor; ?>

                                                    </li>
                                                </ul>
                                            </nav>

                                        </div>

                                        <div class="col-6">

                                            
                                            <ul class="pagination justify-content-end">
                                            
                                                <li class="page-item links"><a class="page-link">Total Record: <?php  echo $total_results; ?></a></li>

                                                </li>
                                            </ul>


                                        </div>
                                    
                                        

                                    </div>
                                </div>

                            </div>
                        </div>


                
                </div>
            </div>




 




        </div>



    

        <div class="container d-flex justify-content-center p-3">
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