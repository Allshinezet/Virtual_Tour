<?php
    $tampil = queryAll("SELECT * FROM tabel_objek");
?>
    <!-- TOUR -->
    <section id='tour' class='halaman py-5 text-dark'>
        <div class='container'>
            <div class='row row-cols-1 row-cols-sm-2 row-cols-md-3 g-5'>
                <?php
                    foreach($tampil as $data) :
                ?>
                <div class='col'>
                    <div class='card shadow-sm mt-5'>
                    <img src="admin/assets/img/uploads/<?php echo $data['gambar_tour']; ?>">
                        <div class='card-body'>
                            <p class='card-text'><?php echo $data['nama_object']; ?></p>
                            <div class='d-flex justify-content-center align-items-center'>
                                <a href="view.php?id_object=<?= $data['id_object']; ?>" class='btn btn-sm btn-primary'>View 360</a>
                                <a href="details.php?id_object=<?= $data['id_object']; ?>" class='btn btn-sm btn-primary ms-4'>Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- End TOUR -->