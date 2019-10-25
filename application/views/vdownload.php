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
                        <a href="<?php echo base_url('/index.php/paramapi/download')?>">Download File</a>
                        </table>
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
    $(document).ready(function(){
        $('#btn_simpan').on('click',function(){
            var apikeys=$('#apikeys').val();
            var secretkey=$('#secretkey').val();
            var ip=$('#ip').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('/index.php/paramapi/create_action')?>",
                dataType : "JSON",
                data : {apikeys:apikeys , secretkey:secretkey, ip:ip},
                success: function(data){
                    alert("data telah disimpan");
                }
            });
            return false;
        });
    });
</script>