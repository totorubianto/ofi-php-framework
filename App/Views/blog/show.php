<style>
    a {color: black; text-decoration: none !important}
</style>

<div class="container-fluid">
    <div class="container col-md-8">
        <div class="mt-5">
            <h4><?php echo $d['judul'] ?></h4>
            <small>
                <a onclick="window.history.back()" href="#back">Semua Artikel</a> / Baca /
                <a href=""><?php echo $d['judul'] ?></a>
            </small>

            <br><br>
            <?php echo $d['isi'] ?>
        </div>

        <br><br><br>

        <div>
            <form action="/delete" method="post">
                <input type="hidden" value="<?php echo $d['id'] ?>" name="id">
                <a href="#">
                    <button class="btn btn-info">Edit</button>
                </a>
                <button class="btn btn-danger" type="submit">Hapus</button>
            </form>
        </div>
    </div>
</div>