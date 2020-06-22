<?php
    $b=$data->row_array();
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $b['judul_berita'];?></title>
</head>
<body>
    <div class="content">
        <div class="col-md-8 col-md-offset-2">
            <h2><?php echo $b['judul_berita'];?></h2><hr/>
            <img width="200" src="<?php echo base_url().'media1/images/'.$b['foto'];?>">
            <?php echo $b['isi_berita'];?>
        </div>
         
    </div>
</body>
</html>