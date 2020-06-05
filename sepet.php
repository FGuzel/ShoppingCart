<?php
include "lib/header.php"; ?>
<div class="container mt-5">
    <?php if($toplam_count > 0) { ?>
            <h3 class="text-center">Sepetinizde <strong class="text-success"><?php echo $toplam_count; ?></strong> adet ürün bulunmaktadır.</h3>

<section class="container sepet mt-5">
    <div class="row">
        <div class="col-md-8 mx-auto table-responsive table-responsive-sm">
            <table class="table table-hover table-bordered table-striped text-center table-responsive">
                <thead>
                    <tr>
                        <th>Ürün Resmi</th>
                        <th>Ürün Adı</th>
                        <th>Ürün Fiyatı</th>
                        <th>Ürün Adeti</th>
                        <th>Toplam Fiyat</th>
                        <th>Sepetten Çıkar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sepet_urunler as $urun){ ?>
                            <tr>
                                <td><img src="assets/img/<?php echo $urun->img_url; ?>" width="30px" alt="<?php echo $urun->img_alt; ?>"></td>
                                <td><?php echo $urun->urun_adi; ?></td>
                                <td><?php echo $urun->urun_fiyat; ?> TL</td>
                                <td>
                                    <div class="row mx-auto">
                                        <a href="lib/sepet_db.php?p=sayiArtir&id=<?php echo $urun->urun_id; ?>" class="my-auto text-success">
                                            <svg class="bi bi-arrow-up-square-fill sepet-yukarı-ok" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 8.354a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 6.207V11a.5.5 0 0 1-1 0V6.207L5.354 8.354z"/>
                                            </svg>
                                        </a>

                                        <input type="text" class="form-control urun-adeti" value="<?php echo $urun->count; ?>">

                                        <a href="lib/sepet_db.php?p=sayiAzalt&id=<?php echo $urun->urun_id; ?>" class="my-auto text-danger">
                                            <svg class="bi bi-arrow-down-square-fill sepet-yukarı-ok" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 5a.5.5 0 0 0-1 0v4.793L5.354 7.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 9.793V5z"/>
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                                <td><?php echo $urun->toplam_ucret; ?> TL</td>
                                <td>
                                    <button urun_id="<?php echo $urun->urun_id; ?>" class="text-danger sepettenCikar">
                                        <svg class="bi bi-x-square-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm9.854 4.854a.5.5 0 0 0-.708-.708L8 7.293 4.854 4.146a.5.5 0 1 0-.708.708L7.293 8l-3.147 3.146a.5.5 0 0 0 .708.708L8 8.707l3.146 3.147a.5.5 0 0 0 .708-.708L8.707 8l3.147-3.146z"/>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
                    ?>
                </tbody>
                <tfoot>
                    <th colspan="2" class="text-right">
                        Toplam Ürün: <span class="text-danger"><?php echo $toplam_count; ?> Adet</span>
                    </th>
                    <th colspan="4" class="text-right">
                        Toplam Tutar: <span class="text-danger"><?php echo $toplam_ucret; ?> TL</span>
                    </th>
                </tfoot>
            </table>
        </div>
    </div>
</section>

        <?php } else {?>
            <div class="alert alert-info">
                <strong>Sepetinizde henüz bir ürün bulunmamaktadır. Eklemek için <a href="index.php">tıklayınız.</a></strong>
            </div>
        <?php } ?>
</div>
<?php include "lib/footer.php"; ?>
