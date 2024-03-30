<div class="p-5 m-5">
    <h1 class="text-center">Login</h1> 
    <form method="POST" action="{{ route('login') }}">
        @csrf <!-- CSRF protection -->
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="example@abc.ca" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="******" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
