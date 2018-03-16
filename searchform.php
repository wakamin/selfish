<form class="search-form form-inline my-2 my-lg-0" role="search" method="get" action="<?php echo get_home_url() ?>">
    <div class="input-group mb-3">
        <input name="s" class="form-control" type="search" placeholder="Search" aria-label="Search" value="<?php echo $_GET['s'] ?>">
        <div class="input-group-append">
            <button type="submit" class="btn btn-outline-primary" type="button"><i class="fas fa-search"></i></button>
        </div>
    </div>
</form>
