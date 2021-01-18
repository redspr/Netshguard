<?= $this->extend('dashboard/template'); ?>
<?= $this->section('content'); ?>
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
                                    <tbody id ="listlogs">
                                        <tr>
                                            <td>1</td>
                                            <td>SQL Injection (SQLi)</td>
                                            <td>210.239.87.19</td>
                                            <td>' or 1=1#</td>
                                            <td>index.php</td>
                                            <td>07/01/2021 11:47</td>
                                            <td><i class="fa fa-info-circle fa-fw"
                                aria-hidden="true"></i> See Details</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>SQL Injection (SQLi)</td>
                                            <td>210.239.87.19</td>
                                            <td>' or 1=1#</td>
                                            <td>index.php</td>
                                            <td>07/01/2021 11:47</td>
                                            <td><i class="fa fa-info-circle fa-fw"
                                aria-hidden="true"></i> See Details</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>SQL Injection (SQLi)</td>
                                            <td>210.239.87.19</td>
                                            <td>' or 1=1#</td>
                                            <td>index.php</td>
                                            <td>07/01/2021 11:47</td>
                                            <td><i class="fa fa-info-circle fa-fw"
                                aria-hidden="true"></i> See Details</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>SQL Injection (SQLi)</td>
                                            <td>210.239.87.19</td>
                                            <td>' or 1=1#</td>
                                            <td>index.php</td>
                                            <td>07/01/2021 11:47</td>
                                            <td><i class="fa fa-info-circle fa-fw"
                                aria-hidden="true"></i> See Details</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>SQL Injection (SQLi)</td>
                                            <td>210.239.87.19</td>
                                            <td>' or 1=1#</td>
                                            <td>index.php</td>
                                            <td>07/01/2021 11:47</td>
                                            <td><i class="fa fa-info-circle fa-fw"
                                aria-hidden="true"></i> See Details</td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>SQL Injection (SQLi)</td>
                                            <td>210.239.87.19</td>
                                            <td>' or 1=1#</td>
                                            <td>index.php</td>
                                            <td>07/01/2021 11:47</td>
                                            <td><i class="fa fa-info-circle fa-fw"
                                aria-hidden="true"></i> See Details</td>
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
            <?= $this->endSection();?>
            <?= $this->section('javascript'); ?>
            <script type="text/javascript">
                function loaddata()
                {
                    $("tbody#listlogs").empty().append("<tr><td colspan='7' align='center'><i class='fas fa-spinner fa-spin'></i>Loading Data...</td></tr>");
                    $.ajax({
                        url:'<?= base_url('/fetch/attacklogs')?>',
                        type:"GET",
                        dataType:'json',
                        success:function(data){
                            $("tbody#listlogs").empty();
  
                            if(data.status)
                            {
                                let list = data.data;
                                let a =1;
                                $.each(list,function(i,data){
                        
                                    $("tbody#listlogs").append('<tr><td>'+a+'</td><td>'+data.attack_type+'</td><td>'+data.ip+'</td><td>'+data.payload+'</td><td>'+data.path+'</td><td>'+data.created_at+'</td><td><button type="button" id="btn-'+data.ip+'" class="btn btn-secondary">See Details</button></td></tr>');
                                    document.getElementById("btn-"+data.ip).addEventListener("click", function() {
                                        checkIP(data.ip);
                                    });
                                    a++;

                                });
                            }
                            else
                            {
                                $("tbody#listlogs").empty().append('<tr><td colspan="7" align="center">'+data.msg+'</td></tr>');
                            }
                            
                        }
                        
                        });
                }
                function checkIP(x)
                {
                        $.ajax({
                        url:'<?= base_url('/fetchip')?>',
                        type:"POST",
                        dataType:'json',
                        data:{"ip":x},
                        success:function(data){
                            if(data.status)
                            {
                                let x = data.data;
                                $("div#IP").empty().append('ISP:'+x.ISP);
                                $("div#CITY").empty().append('City:'+x.city);
                                $("div#REGION").empty().append('Region:'+x.region);
                                $("div#COUNTRY").empty().append('Country:'+x.country);
                                $("div#TIMEZONE").empty().append('Timezone:'+x.timezone);
                                $('#newModal').modal('show'); 
                            }
                            else
                            {
                                $("div#IP").empty().append('ERROR: '+data.error);
                                $("div#CITY").empty();
                                $("div#REGION").empty();
                                $("div#COUNTRY").empty();
                                $("div#TIMEZONE").empty();
                                $("#newModal").modal("show");
                            }
                            
                        }
                        
                        });
                }

                $(document).ready(function() {
                    loaddata();
                    
                });
                            </script>
            <?= $this->endSection();?>