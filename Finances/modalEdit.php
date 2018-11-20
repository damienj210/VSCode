<?php
                  //<!--modal Edit-->
                  //event.Id, event.Account, event.TDate, event.PDate, event.CkNo, event.tD, event.Debit, event.Credit, event.Category
                  echo '<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">';
                  echo '<div class="modal-dialog" role="document">';
                    echo '<div class="modal-content">';
                      echo '<div class="modal-header">';
                        echo '<h5 class="modal-title" id="exampleModalLabel">Edit Transaction</h5>';
                        echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
                          echo '<span aria-hidden="true">&times;</span>';
                        echo '</button>';
                      echo '</div>';
                      echo '<div class="modal-body">';
                          echo '<form id="frmUpdate" action="updatephp.php" method="post">';
                          echo '<div class="form-group row">';
                          echo '<label for="recordID" class="col-sm-4 col-form-label">RecordID:</label>';
                            echo '<div class="col-sm-8">';
                          echo '<input type="hidden" class="form-control-plaintext" name="Referer" id="Referer" value="http://riveraclan.org/Finances/calendar.php">';
                          echo '<input type="text" class="form-control-plaintext" name="Id" id="recordID" readonly value="">';
                            echo '</div>';
                          echo '<label for="Account" class="col-sm-4 col-form-label">Account:</label>';
                            echo '<div class="col-sm-8">';
                          //echo $row["Account"];
                          echo '<input type="text" class="form-control-plaintext" name="Account" id="Account" readonly value="Account">';
                            echo '</div>';
                          echo '</div>';
                          echo '<div class="form-group row">';
                          echo '<label for="tDate" class="col-sm-4 col-form-label control-label">Transaction Date:</label>';
                            echo '<div class="col-sm-8">';
                          echo '<input type="text" class="form-control" name="TDate" id="tDate" value="TDate">';
                            echo '</div>';
                          echo '<label for="pDate" class="col-sm-4 col-form-label control-label">Posted Date:</label>';
                            echo '<div class="col-sm-8">';
                          echo '<input type="text" class="form-control" name="PDate" id="pDate" value="PDate">';
                            echo '</div>';
                          echo '<label for="CkNo" class="col-sm-4 col-form-label">Check #:</label>';
                            echo '<div class="col-sm-8">';
                          echo '<input type="text" class="form-control" name="CkNo" id="CkNo" value="CkNo">';
                            echo '</div>';
                          echo '<label for="Desc" class="col-sm-4 col-form-label">Description:</label>';
                            echo '<div class="col-sm-8">';
                          echo '<input type="text" class="form-control" name="Description" id="Desc" value="tD">';
                            echo '</div>';
                          echo '<label for="Debit" class="col-sm-4 col-form-label">Debit:</label>';
                            echo '<div class="col-sm-8">';
                          echo '<input type="text" class="text-danger form-control" name="Debit" id="Debit" value="Debit">';
                            echo '</div>';
                          echo '<label for="Credit" class="col-sm-4 col-form-label">Deposit:</label>';
                            echo '<div class="col-sm-8">';
                          echo '<input type="text" class="form-control" name="Credit" id="Credit" value="Credit">';
                            echo '</div>';
                          echo '<label for="Category" class="col-sm-4 col-form-label">Category:</label>';
                            echo '<div class="col-sm-8">';
                          echo '<select class="form-control" name="Category" id="Category" value="Category>';
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
                          echo '</select>';
                          echo '<label for="RecurId" class="col-sm-4 col-form-label">RecurID:</label>';
                            echo '<div class="col-sm-8">';
                          echo '<input type="text" class="form-control" name="RecurId" id="RecurId" value="RecurId">';
                            echo '</div>';
                            echo '</div>';
                          echo '</div>';
                      echo '<div class="modal-footer">';
                        echo '<button type="submit" class="float-left btn btn-primary" name="update" id="btnupdate" value="update" onclick="form.submit(name="update")">Save changes</button>';
                        echo '<button type="button" class="float-left btn btn-secondary" data-dismiss="modal">Cancel</button>';
                        echo '<button type="submit" class="float-right btn btn-danger" name="delete" value="delete" onclick="form.submit(name=delete)">Delete</button>';

                        echo '</div>';
                          echo '</form>';
                    echo '</div>';
                  echo '</div>';
                  echo '</div>';
                  echo '</div>';
                  //<!--end modal Edit-->