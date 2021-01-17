<?php
	include './view/head.html';
	include './view/sidebar.html';
?>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Attack Logs</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href=".">Dashboard</a></li>
                            <li class="active">Attack Logs</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div id="errorBox" class="alert alert-danger alert-dismissible" role="alert" hidden>
                <strong>ERROR:</strong> <div id="message"></div>
                </div>
                <!-- /row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Suspicious Requests Logs</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Attack Type</th>
                                            <th>IP Address</th>
                                            <th>Payload</th>
                                            <th>Path</th>
                                            <th>Date Recorded</th>
                                            <th>Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>SQL Injection (SQLi)</td>
                                            <td>210.239.87.19</td>
                                            <td>' or 1=1#</td>
                                            <td>index.php</td>
                                            <td>07/01/2021 11:47</td>
                                            <td>See Details</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>SQL Injection (SQLi)</td>
                                            <td>210.239.87.19</td>
                                            <td>' or 1=1#</td>
                                            <td>index.php</td>
                                            <td>07/01/2021 11:47</td>
                                            <td>See Details</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>SQL Injection (SQLi)</td>
                                            <td>210.239.87.19</td>
                                            <td>' or 1=1#</td>
                                            <td>index.php</td>
                                            <td>07/01/2021 11:47</td>
                                            <td>See Details</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>SQL Injection (SQLi)</td>
                                            <td>210.239.87.19</td>
                                            <td>' or 1=1#</td>
                                            <td>index.php</td>
                                            <td>07/01/2021 11:47</td>
                                            <td>See Details</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>SQL Injection (SQLi)</td>
                                            <td>210.239.87.19</td>
                                            <td>' or 1=1#</td>
                                            <td>index.php</td>
                                            <td>07/01/2021 11:47</td>
                                            <td>See Details</td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>SQL Injection (SQLi)</td>
                                            <td>210.239.87.19</td>
                                            <td>' or 1=1#</td>
                                            <td>index.php</td>
                                            <td>07/01/2021 11:47</td>
                                            <td>See Details</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <div class="modal fade" id="newModal" role="dialog">
            <div class="modal-dialog">
            
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">IP DETAIL</h4>
                </div>
                <div class="modal-body">
                  <div id ="IP"></div>
                  <div id ="CITY"></div>
                  <div id ="REGION"></div>
                  <div id ="COUNTRY"></div>
                  <div id ="TIMEZONE"></div>
                </div>
              </div>
              
            </div>
          </div>
            </div>
        
<?php
	include './view/footer.html';
?>