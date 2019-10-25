<div class="content-wrapper">
    <section class="content">
        <?php echo alert('alert-info', 'Selamat', 'Data Berhasil Diperbaharui')?>
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">

                    <div class="box-header">
                        <h3 class="box-title">Setting API</h3>
                    </div>

                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr><td>Set API-Keys</td><td><input type="text" name="apikeys" id="apikeys"></td></tr>
                            <tr><td>Set SecretKey</td><td><input type="text" name="secretkey" id="secretkey"></td></tr>
                            <tr><td>Set IP</td><td><input type="text" name="ip" id="ip"></td></tr>
                            <button id="btn_api" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo "Generate API jar" ?></button>
                            <button id="btn_lib" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo "Generate LIB jar" ?></button>
                            <button id="btn_secret" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo "Generate SecretKey" ?></button>
                        </table>
                        <a href="<?php echo base_url('/index.php/paramapi/downloadapi')?>">Download API Jar</a>
                        <a href="<?php echo base_url('/index.php/paramapi/downloadlib')?>">Download Lib Jar</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>

<script type="text/javascript">
    $(function() {
        //autocomplete
        $("#name_user").autocomplete({
            source: "<?php echo base_url()?>/index.php/welcome/autocomplate",
            minLength: 1
        });				
    });

    $(document).ready(function(){
        $('#btn_api').on('click',function(){
            var apikeys=$('#apikeys').val();
            var secretkey=$('#secretkey').val();
            var ip=$('#ip').val();
            if(apikeys != "" || secretkey != "" || ip!== ""){
                $.ajax({
                type : "POST",
                url  : "<?php echo base_url('/index.php/paramapi/create_action_api')?>",
                dataType : "JSON",
                data : {apikeys:apikeys , secretkey:secretkey, ip:ip},
                success: function(data){
                    alert("data telah disimpan");
                    }
                });
            } else {
                alert("tidak boleh kosong");
            }
           
            return false;
        });
        
        $('#btn_secret').on('click',function(){
            var apikeys=$('#apikeys').val();
            var secretkey=$('#secretkey').val();
            var ip=$('#ip').val();
            if(apikeys != "" || secretkey != "" || ip!== ""){
                $.ajax({
                type : "POST",
                url  : "<?php echo base_url('/index.php/paramapi/create_action_txt')?>",
                dataType : "JSON",
                data : {apikeys:apikeys , secretkey:secretkey, ip:ip},
                success: function(data){
                    alert("data telah disimpan");
                    }
                });
            } else {
                alert("tidak boleh kosong");
            }
           
            return false;
        });

        $('#btn_lib').on('click',function(){
            var apikeys=$('#apikeys').val();
            var secretkey=$('#secretkey').val();
            var ip=$('#ip').val();
            if(apikeys != "" || secretkey != "" || ip!== ""){
                $.ajax({
                type : "POST",
                url  : "<?php echo base_url('/index.php/paramapi/create_action_lib')?>",
                dataType : "JSON",
                data : {apikeys:apikeys , secretkey:secretkey, ip:ip},
                success: function(data){
                    alert("data telah disimpan");
                    }
                });
            } else {
                alert("tidak boleh kosong");
            }
           
            return false;
        });
    });
</script>