<?php
	include './view/head.html';
	include './view/sidebar.html';
?>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Blacklist</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href=".">Dashboard</a></li>
                            <li class="active">Blacklist</li>
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
                            <h3 class="box-title">Blocked IP Address</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>IP</th>
                                            <th>Date Added</th>
                                            <th>Location</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>181.122.10.119</td>
                                            <td>08/01/2021 11:00</td>
                                            <td>Jakarta</td>
                                            <td>Remove</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>210.131.45.55</td>
                                            <td>08/01/2021 11:00</td>
                                            <td>Singapore</td>
                                            <td>Remove</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>174.188.32.103</td>
                                            <td>08/01/2021 11:00</td>
                                            <td>Russia</td>
                                            <td>Remove</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>181.172.111.21</td>
                                            <td>08/01/2021 11:00</td>
                                            <td>Jakarta</td>
                                            <td>Remove</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>

<?php
	include './view/footer.html';
?>