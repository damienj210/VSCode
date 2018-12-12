
                 <!--modal Edit-->
                  <!-- //event.Id, event.Account, event.TDate, event.PDate, event.CkNo, event.tD, event.Debit, event.Credit, event.Category -->
                  <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Transaction</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <form id="frmUpdate" action="updatephp.php" method="post">
                          <div class="form-group row">
                          <label for="recordID" class="col-sm-4 col-form-label">RecordID:</label>
                            <div class="col-sm-8">
                          <input type="hidden" class="form-control-plaintext" name="Referer" id="Referer" value="http://riveraclan.org/Finances/calendar.php">
                          <input type="text" class="form-control-plaintext" name="Id" id="recordID" readonly value="">
                            </div>
                          <label for="Account" class="col-sm-4 col-form-label">Account:</label>
                            <div class="col-sm-8">
                          <!-- //echo $row["Account"]; -->
                          <input type="text" class="form-control-plaintext" name="Account" id="Account" readonly value="Account">
                            </div>
                          </div>
                          <div class="form-group row">
                          <label for="tDate" class="col-sm-4 col-form-label control-label">Transaction Date:</label>
                            <div class="col-sm-8">
                          <input type="text" class="form-control" name="TDate" id="tDate" value="TDate">
                            </div>
                          <label for="pDate" class="col-sm-4 col-form-label control-label">Posted Date:</label>
                            <div class="col-sm-8">
                          <input type="text" class="form-control" name="PDate" id="pDate" value="PDate">
                            </div>
                          <label for="CkNo" class="col-sm-4 col-form-label">Check #:</label>
                            <div class="col-sm-8">
                          <input type="text" class="form-control" name="CkNo" id="CkNo" value="CkNo">
                            </div>
                          <label for="Desc" class="col-sm-4 col-form-label">Description:</label>
                            <div class="col-sm-8">
                          <input type="text" class="form-control" name="Description" id="Desc" value="tD">
                            </div>
                          <label for="Debit" class="col-sm-4 col-form-label">Debit:</label>
                            <div class="col-sm-8">
                          <input type="text" class="text-danger form-control" name="Debit" id="Debit" value="Debit">
                            </div>
                          <label for="Credit" class="col-sm-4 col-form-label">Deposit:</label>
                            <div class="col-sm-8">
                          <input type="text" class="form-control" name="Credit" id="Credit" value="Credit">
                            </div>
                          <label for="Category" class="col-sm-4 col-form-label">Category:</label>
                            <div class="col-sm-8">
                          <select class="form-control" name="Category" id="Category" value="Category>
                          <?php 
                          $Catquery = "SELECT * FROM Categories";
                          $CatResult = mysqli_query($db, $Catquery) or die('Error querying database.');
                          while ($CatRow = mysqli_fetch_array($CatResult)) {
                            if ($CatRow["Type"] === "Income"){
                                if ($CatRow["Category"] == $row["Category"]){
                                  echo '<option style="color:black" value="'. $CatRow["Category"] . '" selected>'. $CatRow["Category"] . '</option>';
                                }
                                else {
                                  echo '<option style="color:black" value="'. $CatRow["Category"] . '">'. $CatRow["Category"] . '</option>';
                                }
                            }
                            else {
                                if ($CatRow["Category"] == $row["Category"]){
                                  echo '<option style="color:red" value="'. $CatRow["Category"] . '" selected>'. $CatRow["Category"] . '</option>';
                                }
                                else {
                                  echo '<option style="color:red" value="'. $CatRow["Category"] . '">'. $CatRow["Category"] . '</option>';
                                }
                            }
                            
                          }
                          ?>
                          </select>
                          <label for="RecurId" class="col-sm-4 col-form-label">RecurID:</label>
                            <div class="col-sm-8">
                          <input type="text" class="form-control" name="RecurId" id="RecurId" value="RecurId">
                            </div>
                            </div>
                          </div>
                      <div class="modal-footer">
                        <button type="submit" class="float-left btn btn-primary" name="update" id="btnupdate" value="update" onclick="form.submit(name="update")">Save changes</button>
                        <button type="button" class="float-left btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="float-right btn btn-danger" name="delete" value="delete" onclick="form.submit(name=delete)">Delete</button>

                        </div>
                          </form>
                    </div>
                  </div>
                  </div>
                  </div>
                  <!--end modal Edit-->