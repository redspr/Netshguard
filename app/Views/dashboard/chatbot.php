<?= $this->extend('dashboard/template'); ?>
<?= $this->section('content'); ?>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Chatbot Notification</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href=".">Dashboard</a></li>
                            <li class="active">Chatbot Notification</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div id="errormessage">
                
                </div>
                
                <div class="white-box">
                    <div class="row">
                        <div class="col-sm-10"><h3 class="box-title">User List</h3></div>
                        <div class="col-sm-2"><button type="button" id= "gtoken" onclick="generateToken();" class="btn btn-success">Generate Token</button></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>UID</th>
                                            <th>Name</th>
                                            <th>Token</th>
                                            <th>Admin Control</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="listbot">
                                        <tr>
                                            <td>afs6923edf2053348cc8dd278476124eb</td>
                                            <td>Pamoor Spavlski</td>
                                            <td>NG-A34IJKS</td>
                                            <td><input type="radio" id="admin"></td>
                                            <td><i class="fa fa-times fa-fw" aria-hidden="true"></i> Remove</td>
                                        </tr>
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
                    $("#errormessage").empty();
                    $("#gtoken").attr("disabled", true);
                    $("tbody#listbot").empty().append("<tr><td colspan='5' align='center'><i class='fas fa-spinner fa-spin'></i>Loading Data...</td></tr>");
                    $.ajax({
                        url:'<?= base_url('/fetch/chatbot')?>',
                        type:"GET",
                        dataType:'json',
                        success:function(data){
                            $("tbody#listbot").empty();

                            if(data.status)
                            {
                                let list = data.data;
                                $.each(list,function(i,data){
                                    var adminbtn = "";

                                    if (data.admin == 1)
                                    {
                                        adminbtn = '<td><i class="fas fa-circle fa-fw" aria-hidden="true"></i> Admin</td>';
                                    }
                                    else
                                    {
                                        adminbtn = '<td><i class="far fa-circle fa-fw" aria-hidden="true"></i> Not Admin</td>'; 
                                    }
                                    $("tbody#listbot").append('<tr><td>'+data.uid+'</td><td>'+data.name+'</td><td>'+data.token+'</td>'+adminbtn+'<td><button type="button" class="btn btn-danger" id="remove-'+data.id+'">Remove</button> <button type="button" class="btn btn-success" id="admin-'+data.id+'">Admin</button></td></tr>');
                                    document.getElementById("remove-"+data.id).addEventListener("click", function() {
                                        $.ajax({
                                            url:'<?= base_url('/delete/chatbot')?>',
                                            type:'POST',
                                            data:{'id':data.id},
                                            dataType:'json',
                                            success:function(ret)
                                            {
                                                if(ret.status)
                                                {
                                                    loaddata();
                                                }
                                                else
                                                {
                                                    $("#errormessage").empty().append('<div class="alert alert-danger" role="alert">You can\'t remove admin!</div>');
                                                    
                                                }
                                            }
                                        });
                                    });
                                    document.getElementById("admin-"+data.id).addEventListener("click", function() {
                                        $.ajax({
                                            url:'<?= base_url('/chatbot/setadmin')?>',
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

                                });
                                
                            }
                            else
                            {
                                $("tbody#listbot").empty().append('<tr><td colspan="5" align="center">'+data.msg+'</td></tr>');
                            }
                            $("#gtoken").attr("disabled", false);
                        }
                        
                        });
                }
                function generateToken(){
                    $("#gtoken").attr("disabled", true);
                    $.ajax({
                        url:'<?= base_url('/generatetoken')?>',
                        type:"GET",
                        dataType:'json',
                        success:function(data){
                            if(data.status)
                            {
                                
                                loaddata();
                            }

                            
                        }
                        
                    });
                }

                $(document).ready(function() {
                    loaddata();
                    
                });
                            </script>
            <?= $this->endSection();?>