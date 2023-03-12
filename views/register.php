<h1> Create an account</h1>
<form action="" method="post">
    <div class="row">
        <div class="col">
            <div class="mb-3 form-group">
                <label>Firstname</label>
                <input type="text" class="form-control" name="firstname" ">
            </div>
        </div>
        <div class="col">
            <div class="mb-3 form-group">
                <label>Lastname</label>
                <input type="text" class="form-control" name="lastname" ">
            </div>
        </div>
    </div>
    <div class="mb-3 form-group">
        <label>Email</label>
        <input type="text" class="form-control" name="email" ">
    </div>
    <div class="mb-3  form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="password">
    </div>
    <div class="mb-3  form-group">
        <label>Confirm Password</label>
        <input type="password" class="form-control" name="confirmPassword">
    </div>
    <button type="submit" class="btn btn-primary float-end">Submit</button>
    <a href="/login" class="btn btn-success">Have account? Login</a>
</form>
