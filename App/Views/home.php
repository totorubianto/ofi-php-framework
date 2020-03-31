<div class="container-fluid">
    <div class="container col-md-7">
        <div class="card mt-5">
            <div class='card-header'>
                <strong>Welcome <?php echo $helper::auth('fullname') ?> </strong>
            </div>
            <div class="card-body">
                Welcome <?php echo $helper::auth('fullname') ?> in <?php echo PROJECTNAME ?> admin dashboard

                <br><br>
                <form action="/logout" method="post">
                    <button class="btn btn-danger" type="submit">Logout Here</button>
                </form>
            </div>
        </div>
    </div>
</div>