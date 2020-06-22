    <h3><strong>
            <center>DAFTAR BERITA</center>
        </strong></h3>
    <div class="content">
        <div class="panel panel-flat">
            <div class="panel-body">
                <?php
                function limit_words($string, $word_limit)
                {
                    $words = explode(" ", $string);
                    return implode(" ", array_splice($words, 0, $word_limit));
                }
                foreach ($berita as $i) :
                    $id = $i['id_berita'];
                    $judul = $i['judul_berita'];
                    $image = $i['foto'];
                    $isi = $i['isi_berita'];
                ?>

                    <div class="col-md-8 col-md-offset-2">
                        <h2><?php echo $judul; ?></h2>
                        <hr />
                        <div class="text-right">
                            <a href="<?= site_url('admin/update_berita/' . md5($i['id_berita'])) ?>"><i class="icon-pencil3"></i>update</a>
                            <a href="<?= site_url('admin/delete_berita/' . md5($i['id_berita'])) ?>"><i class="icon-trash-alt"></i>delete</a>
                        </div>
                        <br />
                        <img width="150" src="<?php echo base_url() . 'media1/images/' . $image; ?>">
                        <?php echo limit_words($isi, 30); ?><a href="<?php echo base_url() . 'index.php/admin/view/' . $id; ?>"> Selengkapnya ></a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="text-center">
            <?php echo $this->pagination->create_links(); ?>
        </div>
    </div>

    <script src="<?php echo base_url() . 'assets/jquery/jquery-2.2.3.min.js' ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'assets/js/bootstrap.js' ?>"></script>