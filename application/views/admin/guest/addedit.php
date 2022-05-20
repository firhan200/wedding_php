<div class="row justify-content-center">
    <div class="col-sm-12 col-md-10 col-lg-6">
        <div class="border p-5">
            <form action="<?php echo site_url('/admin/guest/addedit_process/'.$id) ?>" method="post">
                <div>
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" required maxlength="150" value="<?php echo htmlspecialchars($name) ?>"/>
                </div>
                <div class="mt-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" maxlength="150" value="<?php echo htmlspecialchars($email) ?>"/>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-danger">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>