

<main>
<div class="container-fluid">
    <h1 class="mt-4">Check In Data</h1>
                  
   
             <br><br>
                            
        </div>
                        <div class="card-body">
                           <div class="table table-responsive"> 
                               <table align="center" width="100%" cellspacing="0" class="table table-bordered table-striped table-hover">
                               <thead>		
                                       <tr>
                                        <td>NO</td>
                                        <td>Employee Name</td>
                                        <td>Asset Number</td>
                                        <td>Asset Description</td>
                                        <td>Check Out Date</td>
                                        <td>Check In Date</td>
                                        <td>Check Out Notes</td>
                                        <td>Check In Notes</td>
                                        <td>Status</td>
                                        <td>Action</td>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                   
                                    $no=0; 
                                    $sql=mysqli_query($con,"SELECT * FROM data_chek_asset order by tgl_chekout ASC");
                                    while($data=mysqli_fetch_array($sql))
                                    {
                                        $no++;
                                        $id=$data['id_chek'];
                                        $Nrp =$data['Nrp'];
                                        $no_asset =$data['no_asset'];
                                        $tgl_checkout= $data['tgl_chekout'];
                                        $tgl_checkin= $data['tgl_chekin'];
                                        $note_checkout = $data['note_checkout'];
                                        $note_checkin = $data['note_checkin'];
                                        $sts_chek = $data['sts_chek'];
                                      
                                    ?>
                                    <tr>
                                        <td><?=$no;?></td>
                                        <td><?=nrptonama($Nrp);?></td>
                                        <td><?=$no_asset;?></td>
                                        <td><?=noassettodesc($no_asset);?></td>
                                        <td><?=$tgl_checkout;?></td>
                                        <td><?=$tgl_checkin;?></td>
                                        <td><?=$note_checkout;?></td>
                                        <td><?=$note_checkin;?></td>
                                        <td><?=sts_check($sts_chek);?></td>
                                        <td>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#checkin<?=$id;?>">
                                            Chek In
                                          </button>

                                                                                          
                                                <!-- The Modal -->
                                                <div class="modal fade" id="checkin<?=$id;?>">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                  
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                      <h4 class="modal-title">Check In Data</h4>
                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    
                                                <!-- Modal body -->
                                                    <form method="post">
                                                    <div class="modal-body">
                                                    <label>Asset Number</label>
                                                      <input type="text" name="no_asset" placeholder="No Asset" class="form-control" required readonly>
                                                      <br>
                                                      <label>Description</label>
                                                      <input type="text" name="description" placeholder="Description" class="form-control" required readonly>
                                                      <br>
                                                      <label>Status</label>
                                                        <select class="form-control" name="sts">
                                                          <option value='1'>Pending</option>
                                                          <option value='2'>UnDiployable</option>
                                                          <option value='3'>Deployed</option>
                                                          <option value='4'>Archived</option>
                                                          <option value='5'>Deployable</option>
                                                        </select>
                                                      <br>
                                                      <label>Check In Date</label>
                                                      <input type="date" name="tgl" class="form-control" required>
                                                      <br>
                                                      <label>Note</label>
                                                      <input type="text" name="note" class="form-control" required>
                                                      <br>
                                                      <input type="hidden" name="id" value="<?=$id;?>">
                                                      <button type="submit" class="btn btn-primary"  name="checkin">Check In</button>
                                                    </div>
                                                    </form>
                                                    
                                                  
                                                    
                                                  </div>
                                                </div>
                                                </div>
                                        </td>
                                       
                                    </tr>
                                <?php
                                }
                                ?>
                                </tbody>
                                </table>                                              
                               </div>
                        </div>
        
    </div>
</div>
</main>
