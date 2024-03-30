<div class="container">
    <h1>User List</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Account Type</th>
                <th>Verified</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    {{-- <td>{{ $user->verified ? 'Yes' : 'No' }}</td> --}}
                    <form action="{{ route('updateVerification', ['userId' => $user->id]) }}" method="POST">
                        @csrf
                        <td class="align-middle">
                            <input class="form-check-input" type="radio" name="verified"
                                id="verified_yes_{{ $user->id }}" value="1"
                                {{ $user->verified ? 'checked' : '' }}>
                            <label class="form-check-label" for="verified_yes_{{ $user->id }}">Yes</label>


                            <input class="form-check-input" type="radio" name="verified"
                                id="verified_no_{{ $user->id }}" value="0"
                                {{ !$user->verified ? 'checked' : '' }}>
                            <label class="form-check-label" for="verified_no_{{ $user->id }}">No</label>
                        </td>
                        <td><button type="submit" class="btn btn-primary">Update</button></td>
                    </form>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
