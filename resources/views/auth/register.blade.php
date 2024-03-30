<form method="POST" action="{{ url('/register') }}">
    @csrf <!-- CSRF protection -->
    <div class="p-5 m-5">
        <h1 class="text-center">Create a New Account</h1>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Ex. Jane Doe" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="jane@doe.ca" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="******" required>
        </div>
        <div class="mb-3">
            <label for="confirm_password" class="form-label">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" id="confirmed_password" placeholder="******" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
