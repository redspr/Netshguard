<?php
	include './view/head.html';
	include './view/sidebar.html';
?>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Protection Settings</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href=".">Dashboard</a></li>
                            <li class="active">Protection Settings</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div id="errorBox" class="alert alert-danger alert-dismissible" role="alert" hidden>
                <strong>ERROR:</strong> <div id="message"></div>
                </div>
                <!-- /row -->
                <div class="row">
                <div class="col-md-12 col-xs-12">
                        <div class="white-box">
                            <form class="form-horizontal form-material">
                                <div class="form-group">
                                    <label class="col-md-12">Attack Attempt Limit (per IP Address)</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="5"
                                            class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12">Website Lockdown Status</label>
                                    <div class="col-sm-12">
                                        <select class="form-control form-control-line">
                                            <option>Active</option>
                                            <option checked>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success">Save Settings</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>

<?php
	include './view/footer.html';
?>