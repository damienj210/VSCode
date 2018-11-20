//<!--modal Add-->
<?php 
                  echo '<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">';
                  echo '<div class="modal-dialog" role="document">';
                    echo '<div class="modal-content">';
                      echo '<div class="modal-header">';
                        echo '<h5 class="modal-title" id="exampleModalLabel">Add Transaction</h5>';
                        echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
                          echo '<span aria-hidden="true">&times;</span>';
                        echo '</button>';
                      echo '</div>';
                      echo '<div class="modal-body">';
                          echo '<form action="updatephp.php" method="post" >';
                          echo '<div class="form-group row">';
                          //echo '<label for="recordID" class="col-sm-4 col-form-label">RecordID:</label>';
                            //echo '<div class="col-sm-8">';
                          //echo '<input type="text" class="form-control-plaintext" name="Id" id="recordID' . $row["Id"] . '" readonly value="' . $row["Id"] . '">';
                            //echo '</div>';
                          echo '<label for="Account" class="col-sm-4 col-form-label">Account:</label>';
                            echo '<div class="col-sm-8">';
                          echo 'Damien\'s Checking * 7128';
                          //echo '<input type="text" class="form-control-plaintext" name="Account" id="Account' . $row["Id"] . '" readonly value="' . $row["Account"] . '">';
                            echo '</div>';
                          echo '</div>';
                          echo '<div class="form-group row">';
                          echo '<label for="tDate" class="col-sm-4 col-form-label">Transaction Date:</label>';
                            echo '<div class="col-sm-8">';
                          echo '<input type="text" class="form-control" name="TDate" id="addtDate" value="">';
                            echo '</div>';
                          echo '<label for="pDate" class="col-sm-4 col-form-label">Posted Date:</label>';
                            echo '<div class="col-sm-8">';
                          echo '<input type="text" class="form-control" name="PDate" id="addpDate" value="">';
                            echo '</div>';
                          echo '<label for="CkNo" class="col-sm-4 col-form-label">Check #:</label>';
                            echo '<div class="col-sm-8">';
                          echo '<input type="text" class="form-control" name="CkNo" id="addCkNo" value="">';
                            echo '</div>';
                          echo '<label for="Desc" class="col-sm-4 col-form-label">Description:</label>';
                            echo '<div class="col-sm-8">';
                          echo '<input type="text" class="form-control" name="Description" id="addDesc" value="">';
                            echo '</div>';
                          echo '<label for="Debit" class="col-sm-4 col-form-label">Debit:</label>';
                            echo '<div class="col-sm-8">';
                          echo '<input type="text" class="text-danger form-control" name="Debit" id="addDebit" value="">';
                            echo '</div>';
                          echo '<label for="Credit" class="col-sm-4 col-form-label">Deposit:</label>';
                            echo '<div class="col-sm-8">';
                          echo '<input type="text" class="form-control" name="Credit" id="addCredit" value="">';
                            echo '</div>';
                          echo '<label for="Category" class="col-sm-4 col-form-label">Category:</label>';
                            echo '<div class="col-sm-8">';
                          echo '<select class="form-control" name="Category" id="addCategory" value="Category">';
                          $Catquery = "SELECT * FROM Categories";
                          $CatResult = mysqli_query($db, $Catquery) or die('Error querying database.');
                          while ($CatRow = mysqli_fetch_array($CatResult)) {
                            if ($CatRow["Category"] == $row["Category"]){
                              echo '<option value="'. $CatRow["Category"] . '" selected>'. $CatRow["Category"] . '</option>';
                            }
                            else {
                              echo '<option value="'. $CatRow["Category"] . '">'. $CatRow["Category"] . '</option>';
                            }
                          }
                          echo '</select></br>';
                            echo '</div>';
                            //echo '<label for="Recurrence" class="col-sm-4 col-form-label">Recurrence:</label>';
                            //echo '<div class="checkbox-inline col-sm-4">';
                          echo '<label class="checkbox-inline col-sm-12"><input type="checkbox" name="Recurrence" id="addRecurrence" value="" data-toggle="collapse" data-target="#demo"> Recurrence</label>';
                          echo '<div id="demo" class="collapse">';
                          echo '<div class="form-group row col-sm-12">';
                             echo '<label for="interval" class="col-sm-5 col-form-label">Repeat Every:</label>';
                             echo '<div class="col-sm-3">';
                             echo '<input type="number" class="form-control name="interval" id="RecInterval" value="1">';
                             echo '</div>';
                             echo '<div class="col-sm-4">';
                             echo '<select class="form-control" name="intSelect" id="intSelect" onChange="changeIntSelect(this.value);">';
                                echo '<option value="day" selected>day</option>';
                                echo '<option value="week">week</option>';
                                echo '<option value="month">month</option>';
                                echo '<option value="year">year</option></select>';
                             echo '</div></div>';
                             echo '<div id="RecurWeek" style="display:none">
                             
                             <label class="col-sm-5">Repeat on </label></br>
                             <label class="col-sm-2"></label>
                             <label class="checkbox-inline col-sm-1"><input type="checkbox" name="RecurWeekSu" id="RecurWeekSu" value="1"> S</label>
                             <label class="checkbox-inline col-sm-1"><input type="checkbox" name="RecurWeekMo" id="RecurWeekMo" value="2"> M</label>
                             <label class="checkbox-inline col-sm-1"><input type="checkbox" name="RecurWeekTu" id="RecurWeekTu" value="3"> T</label>
                             <label class="checkbox-inline col-sm-1"><input type="checkbox" name="RecurWeekWe" id="RecurWeekWe" value="4"> W</label>
                             <label class="checkbox-inline col-sm-1"><input type="checkbox" name="RecurWeekTh" id="RecurWeekTh" value="5"> T</label>
                             <label class="checkbox-inline col-sm-1"><input type="checkbox" name="RecurWeekFr" id="RecurWeekFr" value="6"> F</label>
                             <label class="checkbox-inline col-sm-1"><input type="checkbox" name="RecurWeekSa" id="RecurWeekSa" value="7"> S</label>
                             </div>';
                             
                             echo '<div id="RecurMonth" style="display:none" class="form-group row col-sm-12">
                                    
                                    <label for="intMonthSelect" class="col-sm-4"></label>
                                    <label class="col-sm-7">
                                      <select class="form-control" name="intMonthSelect" id="intMonthSelect" onChange="changeIntMonthSelect(this.value);">
                                        <option value="dayNumber" selected>day number</option>
                                        <option value="dayName">day name</option>
                                      </select>
                                    </label>
                                     <input type="text" class="form-control" style="display:none" name="dOw" id="dOw" value="">
                                   </div>';
                          echo '<div class="form-group row col-sm-12">';
                             echo '<label class="col-sm-5">Ends:</label></div>';

                             echo '<div class="form-group row col-sm-12">
                                   <label class="col-sm-4"><input type="radio" name="optradio" checked onclick="RecurEndDate.disabled = this.checked; RecurOccurences.disabled = this.checked">Never</label>
                                   </div>
                                   <div class="form-group row col-sm-12">
                                   <label class="col-sm-4"><input type="radio" name="optradio" onclick="RecurEndDate.disabled = false; RecurOccurences.disabled = this.checked">On</label>
                                   <label for="RecurEndDate" class="col-form-label"></label>
                                   <div class="col-sm-8">
                                   <input type="text" class="form-control" name="RecurEndDate" id="RecurEndDate" disabled value="">
                                   </div>
                                  </div>
                                  <div class="form-group row col-sm-12">
                                   <label  class="col-sm-4"><input type="radio" name="optradio" onclick="RecurEndDate.disabled = this.checked; RecurOccurences.disabled = false">After</label>
                                   <div class="col-sm-8">
                                   <input type="number" class="form-control" name="RecurOccurences" id="RecurOccurences" disabled value="1">
                                   </div></br></br></br></br></br></br>
                                  </div>';
                             //echo 'Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                  //sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                  //quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.';
                            
                          echo '</div>';
                          echo '</div>';
                          echo '</div>';
                      echo '<div class="modal-footer">';
                        //echo '<button type="submit" class="btn btn-danger mr-auto" name="delete" value="delete">Delete</button>';
                        echo '<button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">Cancel</button>';
                        echo '<button type="submit" class="btn btn-primary" name="add" value="add">Add Transaction</button>';
                      echo '</div>';
                          echo '</form>';
                    echo '</div>';
                  echo '</div>';
                  echo '</div>';
                  echo '</div>';
                  //<!--end modal Add-->
                  ?>
