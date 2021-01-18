<?= $this->extend('dashboard/template'); ?>
<?= $this->section('content'); ?>
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
                                    <tbody id ="listblacklist">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <?= $this->endSection();?>

            <?= $this->section('javascript'); ?>
            <script type="text/javascript">
                function loaddata()
                {
                    $("tbody#listblacklist").empty().append("<tr><td colspan='5' align='center'><i class='fas fa-spinner fa-spin'></i>Loading Data...</td></tr>");
                    $.ajax({
                        url:'<?= base_url('/fetch/blacklist')?>',
                        type:"GET",
                        dataType:'json',
                        success:function(data){

                            console.log(data.status);
                            if(data.status)
                            {
                                let list = data.data;
                                let a =1;
                                $.each(list,function(i,data){
                        
                                    $("tbody#listblacklist").append('<tr><td>'+a+'</td><td>'+data.ip+'</td><td>'+data.c_time+'</td><td>'+data.location+'</td><td><button type="button" id="btn-'+data.id+'" class="btn btn-danger">Remove</button></td></tr>');
                                    document.getElementById("btn-"+data.id).addEventListener("click", function() {
                                        $.ajax({
                                            url:'<?= base_url('/delete')?>',
                                            type:'POST',
                                            data:{'id':data.id},
                                            dataType:'json',
                                            success:function(ret)
                                            {
                                                if(ret.status)
                                                {
                                                    loaddata();
                                                }
                                            }
                                        });
                                    });
                                    a++;

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
