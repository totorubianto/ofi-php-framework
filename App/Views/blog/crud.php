<div class="container-fluid">
    <div class="container col-md-8">
        <div class="mt-5 table-responsive">
            <?php 
                $flash->display();
            ?>

            <h4 class="mb-4 float-left">Semua Artikel</h4>

            <button data-toggle="modal" data-target="#addData" class="btn float-right btn-success btn-sm">
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

<!-- The Modal -->
<div class="modal fade" id="addData">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/save" method="post">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Artikel</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <small>Judul</small>
                    <input required class="form-control mb-2" name="judul" type="text">

                    <small>Isi</small>
                    <textarea required name="isi" class="form-control" rows="5"></textarea>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button class="btn btn-success" type="submit">Save</button>
                    <button type="button" class="btn border btn-light" data-dismiss="modal">Close</button>
                </div>

            </form>
        </div>
    </div>
</div>