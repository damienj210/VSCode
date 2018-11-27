<!--modal Add--> 

                  <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Transaction</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <form action="updatephp1.php" method="post" >
                          <div class="form-group row">
                         <!-- /*  //<label for="recordID" class="col-sm-4 col-form-label">RecordID:</label>
                            //<div class="col-sm-8">
                          //<input type="text" class="form-control-plaintext" name="Id" id="recordID' . $row["Id"] . '" readonly value="' . $row["Id"] . '">
                            //</div> */ -->
                          <label for="Account" class="col-sm-4 col-form-label">Account:</label>
                            <div class="col-sm-8">
                          <!-- Damien\'s Checking * 7128 -->
                          <!-- //<input type="text" class="form-control-plaintext" name="Account" id="Account' . $row["Id"] . '" readonly value="' . $row["Account"] . '"> -->
                            </div>
                          </div>
                          <div class="form-group row">
                          <label for="tDate" class="col-sm-4 col-form-label">Transaction Date:</label>
                            <div class="col-sm-8">
                          <input type="text" class="form-control" name="TDate" id="addtDate" value="">
                            </div>
                          <label for="pDate" class="col-sm-4 col-form-label">Posted Date:</label>
                            <div class="col-sm-8">
                          <input type="text" class="form-control" name="PDate" id="addpDate" value="">
                            </div>
                          <label for="CkNo" class="col-sm-4 col-form-label">Check #:</label>
                            <div class="col-sm-8">
                          <input type="text" class="form-control" name="CkNo" id="addCkNo" value="">
                            </div>
                          <label for="Desc" class="col-sm-4 col-form-label">Description:</label>
                            <div class="col-sm-8">
                          <input type="text" class="form-control" name="Description" id="addDesc" value="">
                            </div>
                          <label for="Debit" class="col-sm-4 col-form-label">Debit:</label>
                            <div class="col-sm-8">
                          <input type="text" class="text-danger form-control" name="Debit" id="addDebit" value="">
                            </div>
                          <label for="Credit" class="col-sm-4 col-form-label">Deposit:</label>
                            <div class="col-sm-8">
                          <input type="text" class="form-control" name="Credit" id="addCredit" value="">
                            </div>
                          <label for="Category" class="col-sm-4 col-form-label">Category:</label>
                            <div class="col-sm-8">
                          <select class="form-control" name="Category" id="addCategory" value="Category">
                          <?php
                          $Catquery = "SELECT * FROM Categories";
                          $CatResult = mysqli_query($db, $Catquery) or die('Error querying database.');
                          while ($CatRow = mysqli_fetch_array($CatResult)) {
                            if ($CatRow["Category"] == $row["Category"]){
                              echo '<option value="'. $CatRow["Category"] . '" selected>'. $CatRow["Category"] . '</option>';
                            }
                            else {
                              echo '<option value="'. $CatRow["Category"] . '">'. $CatRow["Category"] . '</option>';
                            }
                          } ?>
                          </select></br>
                            </div>
                            <!-- //<label for="Recurrence" class="col-sm-4 col-form-label">Recurrence:</label>
                            //<div class="checkbox-inline col-sm-4"> -->
                          <label class="checkbox-inline col-sm-12"><input type="checkbox" name="addRecurrence" id="addRecurrence" value="0"> Recurrence</label>
                          <div name="demo" id="demo" style="display:none">
                          <div class="form-group row col-sm-12">
                             <label for="interval" class="col-sm-5 col-form-label">Repeat Every:</label>
                             <div class="col-sm-3">
                             <input type="number" class="form-control" name="RecInterval" id="RecInterval" value="1">
                             </div>
                             <div class="col-sm-4">
                             <select class="form-control" name="intSelect" id="intSelect" onChange="changeIntSelect(this.value);">
                                <option value="day" selected>day</option>
                                <option value="week">week</option>
                                <option value="month">month</option>
                                <option value="year">year</option></select>
                             </div></div>
                             <div id="RecurWeek" style="display:none">
                             
                             <label class="col-sm-5">Repeat on </label></br>
                             <label class="col-sm-2"></label>
                             <label class="checkbox-inline col-sm-1"><input type="checkbox" name="RecurWeekSu" id="RecurWeekSu" value="1"> S</label>
                             <label class="checkbox-inline col-sm-1"><input type="checkbox" name="RecurWeekMo" id="RecurWeekMo" value="2"> M</label>
                             <label class="checkbox-inline col-sm-1"><input type="checkbox" name="RecurWeekTu" id="RecurWeekTu" value="4"> T</label>
                             <label class="checkbox-inline col-sm-1"><input type="checkbox" name="RecurWeekWe" id="RecurWeekWe" value="8"> W</label>
                             <label class="checkbox-inline col-sm-1"><input type="checkbox" name="RecurWeekTh" id="RecurWeekTh" value="16"> T</label>
                             <label class="checkbox-inline col-sm-1"><input type="checkbox" name="RecurWeekFr" id="RecurWeekFr" value="32"> F</label>
                             <label class="checkbox-inline col-sm-1"><input type="checkbox" name="RecurWeekSa" id="RecurWeekSa" value="64"> S</label>
                             </div>
                             
                             <div id="RecurMonth" style="display:none" class="form-group row col-sm-12">
                                    
                                    <label for="intMonthSelect" class="col-sm-4"></label>
                                    <label class="col-sm-7">
                                      <select class="form-control" name="intMonthSelect" id="intMonthSelect">
                                        <option value="dayNumber" selected>day number</option>
                                        <option value="dayName">day name</option>
                                      </select>
                                    </label>
                                     <input type="text" class="form-control" style="display:none" name="dOw" id="dOw" value="">
                                   </div>
                          <div class="form-group row col-sm-12">
                             <label class="col-sm-5">Ends:</label></div>

                             <div class="form-group row col-sm-12">
                                   <label class="col-sm-4"><input type="radio" name="optradio" value="never" checked onclick="RecurEndDate.disabled = this.checked; RecurOccurences.disabled = this.checked">Never</label>
                                   </div>
                                   <div class="form-group row col-sm-12">
                                   <label class="col-sm-4"><input type="radio" name="optradio" value="on" onclick="RecurEndDate.disabled = false; RecurOccurences.disabled = this.checked">On</label>
                                   <label for="RecurEndDate" class="col-form-label"></label>
                                   <div class="col-sm-8">
                                   <input type="text" class="form-control" name="RecurEndDate" id="RecurEndDate" disabled value="">
                                   </div>
                                  </div>
                                  <div class="form-group row col-sm-12">
                                   <label  class="col-sm-4"><input type="radio" name="optradio" value="after" onclick="RecurEndDate.disabled = this.checked; RecurOccurences.disabled = false">After</label>
                                   <div class="col-sm-8">
                                   <input type="number" class="form-control" name="RecurOccurences" id="RecurOccurences" disabled value="1">
                                   </div></br></br></br></br></br></br>
                                  </div>
                             <!-- //Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                  //sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                  //quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. -->
                            
                          </div>
                          </div>
                          </div>
                      <div class="modal-footer">
                       <!--  //<button type="submit" class="btn btn-danger mr-auto" name="delete" value="delete">Delete</button> -->
                        <button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" name="add_future" value="add_future">Add Transaction</button>
                      </div>
                          </form>
                    </div>
                  </div>
                  </div>
                  </div>
                  <!--end modal Add-->
                  
