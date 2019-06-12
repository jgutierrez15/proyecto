

<?php

include "db.php";

$connect=con();
$query2="sELECT * FROM pedidos WHERE id_forma_pago=1 ORDER BY id_pedido desc;";

$result2=mysqli_query($connect,$query2); ?>
<!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Datatables Jquery Plugin with Php MySql and Bootstrap</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
      </head>  
      <body>  
           <br /><br />  
           <div class="container">  
                <h3 align="center">Datatables Jquery Plugin with Php MySql and Bootstrap</h3>  
                <br />  
                <div class="table-responsive">  
                     <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td>Name</td>  
                                    <td>Address</td>  
                                    <td>Gender</td>  
                                    
                               </tr>  
                          </thead>  
                
                                <?php  
                                while($row = mysqli_fetch_array($result2))  
                                {  
                                     echo '  
                                     <tr>
                                     <td>'.$row["cliente"].'</td>
                                     <td>'.$row["id_pedido"].'</td>
                                     <td>'.$row["dni"].'</td>
                                     </tr>
                                     <tr>
                                     <td>'.$row["cliente"].'</td>
                                     <td>'.$row["id_pedido"].'</td>
                                     <td>'.$row["dni"].'</td>
                                     </tr>
                                     <tr>
                                     <td>'.$row["cliente"].'</td>
                                     <td>'.$row["id_pedido"].'</td>
                                     <td>'.$row["dni"].'</td>
                                     </tr>
                                     <tr>
                                     <td>'.$row["cliente"].'</td>
                                     <td>'.$row["id_pedido"].'</td>
                                     <td>'.$row["dni"].'</td>
                                     </tr>
                                     <tr>
                                     <td>'.$row["cliente"].'</td>
                                     <td>'.$row["id_pedido"].'</td>
                                     <td>'.$row["dni"].'</td>
                                     </tr>
                                     <tr>
                                     <td>'.$row["cliente"].'</td>
                                     <td>'.$row["id_pedido"].'</td>
                                     <td>'.$row["dni"].'</td>
                                     </tr>
                                     <tr>
                                     <td>'.$row["cliente"].'</td>
                                     <td>'.$row["id_pedido"].'</td>
                                     <td>'.$row["dni"].'</td>
                                     </tr>
                                     <tr>
                                     <td>'.$row["cliente"].'</td>
                                     <td>'.$row["id_pedido"].'</td>
                                     <td>'.$row["dni"].'</td>
                                     ';  
                                }  
                                ?>  
                     </table>  
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script>  