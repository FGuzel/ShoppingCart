<?php include "lib/header.php"; ?>


<section class="container urun-alani mt-5">
    <h4>Kadın Aksesurları</h4>
    <div class="row">
        <?php
            $urun_sql = $db->query("SELECT * FROM urunler", PDO::FETCH_OBJ)->fetchAll();
            foreach ($urun_sql as $urun){
        ?>
        <div class="col-md-3 col-6">
            <div class="card">
                <img src="assets/img/<?php echo $urun->img_url; ?>" class="card-img-top" alt="<?php echo $urun->img_alt; ?>">
                <div class="card-body">
                    <h6 class="card-title"><?php echo $urun->urun_adi; ?></h6>
                    <div class="row">
                        <div href="#" class="btn btn-outline-link incele col-md-12 mx-auto text-center">
                            <s class="text-danger"><?php echo $urun->urun_fiyat * 2; ?>TL </s>
                            &nbsp;&nbsp;&nbsp;
                            <big class="text-success font-weight-bold"><?php echo $urun->urun_fiyat; ?>TL</big>
                            &nbsp;&nbsp;&nbsp;
                            <span>%50 indirim!</span>
                        </div>
                        <button urun_id="<?php echo $urun->urun_id; ?>" class="btn btn-danger sepete-ekle col-md-12 mx-auto sepetEkleBtn" role="button">Sepete Ekle</button>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</section>

<?php include "lib/footer.php"; ?>

