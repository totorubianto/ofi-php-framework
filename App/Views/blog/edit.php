<div class="container-fluid">
    <div class="container col-md-8">
        <div class="mt-5">
            <h4>Edit Data</h4>

            <form action="/update" class="mt-3" method="post">
                <input type="hidden" value="<?php echo $b['id'] ?>" name="id">

                <small>Judul</small>
                <input class="form-control mb-3" name="judul" required value="<?php echo $b['judul'] ?>" type="text">

                <small>Isi</small>
                <textarea name="isi" class="form-control mb-2" rows="12">
                    <?php echo $b['isi'] ?>
                </textarea>

                <br>

                <button class="btn btn-success" type="submit">Update</button>
                <a class="p-3" onclick="window.history.back()" href="#kembali">Batal</a>
            </form>


        </div>
    </div>
</div>