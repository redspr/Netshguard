<?= $this->extend('dashboard/template'); ?>
<?= $this->section('content'); ?>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Dashboard</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title"><i class="fa fa-rocket fa-fw"
                                aria-hidden="true"></i> Total Suspicious Request</h3>
                            <ul class="list-inline two-part">
                                <li class="text-right"><i class="ti-arrow-up text-success"></i> <span class="counter text-success">12</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title"><i class="fa fa-ban fa-fw"
                                aria-hidden="true"></i> Total Address Blacklist</h3>
                            <ul class="list-inline two-part">
                                <li class="text-right"><i class="ti-arrow-up text-purple"></i> <span class="counter text-purple">8</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title"><i class="fa fa-users fa-fw"
                                aria-hidden="true"></i> Total Chatbot Users</h3>
                            <ul class="list-inline two-part">
                                <li class="text-right"><i class="ti-arrow-up text-info"></i> <span class="counter text-info">4</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title"><i class="fa fa-list fa-fw"
                                aria-hidden="true"></i> Last 5 Attack Catched</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Attack Type</th>
                                            <th>Payload</th>
                                            <th>Date Recorded</th>
                                            <th>Presume Location</th>
                                            <th>Attacker IP Address</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>SQL Injection (SQLi)</td>
                                            <td>' or 1=1#</td>
                                            <td>02/01/2021 00:30</td>
                                            <td>Jakarta</td>
                                            <td>181.23.16.22</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Cross-site Scripting (XSS)</td>
                                            <td>alert('document.cookies')</td>
                                            <td>02/01/2021 15:23</td>
                                            <td>Singapore</td>
                                            <td>201.45.32.100</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Remote Code Execution (RCE)</td>
                                            <td>cat /etc/passwd</td>
                                            <td>05/01/2021 09:54</td>
                                            <td>Jakarta</td>
                                            <td>181.150.74.11</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>SQL Injection (SQLi)</td>
                                            <td>'UNION SELECT * FROM Users --</td>
                                            <td>07/01/2021 05:32</td>
                                            <td>United States</td>
                                            <td>149.83.110.147</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>SQL Injection (SQLi)</td>
                                            <td>XX'SELECT username, password FROM Users #</td>
                                            <td>10/01/2021 21:00</td>
                                            <td>Russia</td>
                                            <td>233.222.4.1</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="panel">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                    <i class="fa fa-pie-chart fa-fw"
                                aria-hidden="true"></i> Attack Type
                                    </div>
                                    <div class="panel-body">
                                        <div id="attack-type"></div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="panel">
                            <div class="sk-chat-widgets">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                    <i class="fa fa-users fa-fw"
                                aria-hidden="true"></i> Registered User Chatbot
                                    </div>
                                    <div class="panel-body">
                                        <ul class="chatonline">
                                            <li>
                                                <a href="javascript:void(0)"><span>Varun Dhavan <small class="text-danger">Admin</small></span></a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)"><span>Genelia Deshmukh <small class="text-success">Member</small></span></a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)"><span>Ritesh Deshmukh <small class="text-success">Member</small></span></a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)"><span>Arijit Sinh <small class="text-success">Member</small></span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="col-lg-12 col-sm-6 col-xs-12">
                        <div class="panel">
                            <div class="sk-chat-widgets">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                    <i class="fa fa-shield fa-fw"
                                aria-hidden="true"></i> Website Lockdown Status
                                    </div>
                                    <div class="panel-body">
                                        <center><h1>Inactive</h1></center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-6 col-xs-12">
                    <div class="panel">
                            <div class="sk-chat-widgets">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                    <i class="fa fa-tasks fa-fw"
                                aria-hidden="true"></i> Attack Attempt Limit (per IP Address)
                                    </div>
                                    <div class="panel-body">
                                        <center><h1>5</h1></center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <?= $this->endSection();?>