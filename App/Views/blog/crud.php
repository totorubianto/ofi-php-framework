<div class="container-fluid">
    <div class="container col-md-8">
        <div class="mt-5 table-responsive">
            <h4 class="mb-4 float-left">Semua Artikel</h4>

            <button class="btn float-right btn-success btn-sm">
                +
            </button>

            <table class="table">
                <tr>
                    <td>No</td>
                    <td>Judul</td>
                    <td>
                        Sekilas
                    </td>
                </tr>
                
                <?php $no = 1 ?>
                <?php foreach($data as $d) { ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td>
                            <a href="/show/?slug=<?php echo $d['slug'] ?>">
                                <?php echo $d['judul']; ?>
                            </a>
                        </td>
                        <td>
                            <?php echo substr($d['isi'], 0, 80) ?>...
                        </td>
                    </tr>

                    <?php $no++; ?>
                <?php } ?>
            </table>
        </div>
    </div>
</div>