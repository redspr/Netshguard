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
                                <li class="text-right"><i class="ti-arrow-up text-success"></i> <span class="counter text-success" id="tsr">0</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title"><i class="fa fa-ban fa-fw"
                                aria-hidden="true"></i> Total Address Blacklist</h3>
                            <ul class="list-inline two-part">
                                <li class="text-right"><i class="ti-arrow-up text-purple"></i> <span class="counter text-purple" id="tab">0</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title"><i class="fa fa-users fa-fw"
                                aria-hidden="true"></i> Total Chatbot Users</h3>
                            <ul class="list-inline two-part">
                                <li class="text-right"><i class="ti-arrow-up text-info"></i> <span class="counter text-info" id="tcu">0</span></li>
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
                                            <th>Attacker IP Address</th>
                                        </tr>
                                    </thead>
                                    <tbody id="last5">

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
                                    <i class="fa fa-chart-pie fa-fw"
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
                                        <ul class="chatonline" id ="chatonline">
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
                                    <i class="fa fa-shield-alt fa-fw"
                                aria-hidden="true"></i> Website Lockdown Status
                                    </div>
                                    <div class="panel-body">
                                        <center><h1 id="lockdown">Inactive</h1></center>
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
                                        <center><h1 id="attempt">5</h1></center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <?= $this->endSection();?>

            <?= $this->section('javascript'); ?>
            <script type="text/javascript">
                function loaddata()
                {
                    $("#tsr").empty().append('<i class="fas fa-spinner fa-spin"></i>');
                    $("#tab").empty().append('<i class="fas fa-spinner fa-spin"></i>');
                    $("#tcu").empty().append('<i class="fas fa-spinner fa-spin"></i>');
                    $("#lockdown").empty().append('<i class="fas fa-spinner fa-spin"></i>');
                    $("#attempt").empty().append('<i class="fas fa-spinner fa-spin"></i>');
                    $("#chatonline").empty().append('<i class="fas fa-spinner fa-spin"></i> Fetch Data');
                    $("#attack-type").empty().append('<i class="fas fa-spinner fa-spin"></i> Fetch Data');
                    $("#last5").empty().append("<tr><td colspan='5' align='center'><i class='fas fa-spinner fa-spin'></i>Loading Data...</td></tr>");
                    $.ajax({
                        url:'<?= base_url('/fetch/dashboard')?>',
                        type:"GET",
                        dataType:'json',
                        success:function(data){
                            if(data.status)
                            {
                                let list = data.header;
                                $("#tsr").empty().append(list.tsr);
                                $("#tab").empty().append(list.tab);
                                $("#tcu").empty().append(list.tcu);
                                let lockdown = data.lockdown;
                                let attempt = data.attempt;
                                $("#lockdown").empty().append(lockdown);
                                $("#attempt").empty().append(attempt);
                                let last5 = data.last5;
                                if (last5 == 0)
                                {
                                    $("#last5").empty().append("<tr><td colspan='5' align='center'>No Data Found</td></tr>");
                                }
                                else
                                {
                                    $("#last5").empty();
                                    let a = 1;
                                    $.each(last5,function(i,data){
                        
                                        $("#last5").append('<tr><td>'+a+'</td><td>'+data.type+'</td><td>'+data.payload+'</td><td>'+data.time+'</td><td>'+data.ip+'</td></tr>');
                                        a++;
                                    });
                                }
                                let chatbot = data.chatbot;
                                if (chatbot == 0)
                                {
                                    $("#chatonline").empty().append('No Users Found');
                                }
                                else
                                {
                                    $("#chatonline").empty();
                                    $.each(chatbot,function(i,data){
                                        if(data.admin == 1)
                                        {
                                            $("#chatonline").append('<li><a href="javascript:void(0)"><span>'+data.name+'<small class="text-danger">Admin</small></span></a></li>');
                                        }
                                        else
                                        {
                                            $("#chatonline").append('<li><a href="javascript:void(0)"><span>'+data.name+'<small class="text-success">Member</small></span></a></li>');
                                        }
                                        

                                    });
                                }
                                new Chartist.Pie('#attack-type', {
                                    labels: ['SQL', 'RCE', 'XSS'],
                                    series: [20, 30, 40]
                                }, {
                                    donut: true,
                                    height: '350px',
                                    donutSolid: true,
                                    startAngle: 270,
                                    showLabel: true
                                });
                            }
                            else
                            {
                                $("tbody#listblacklist").empty().append('<tr><td colspan="5" align="center">'+data.msg+'</td></tr>');
                            }
                            
                        }
                        
                    });
                }


                $(document).ready(function() {
                    loaddata();
                    
                });
                </script>
            <?= $this->endSection();?>