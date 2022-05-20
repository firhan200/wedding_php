<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-8 col-lg-6 col-xl-4">
            <div class="border mt-5 mb-5 p-5">
                <h2>Login</h2>
                <form action="<?php echo site_url('/admin/auth/login_process') ?>" method="POST">
                    <div class="mt-3">
                        <label>username</label>
                        <input type="text" name="username" class="form-control" required maxlength="150"/>
                    </div>
                    <div class="mt-3">
                        <label>password</label>
                        <input type="password" name="password" class="form-control" required maxlength="50"/>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-danger">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>