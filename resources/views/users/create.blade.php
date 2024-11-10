<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" required>
    </div>
    
    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
    </div>

    <div>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
    </div>

    <div>
        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" name="password_confirmation" required>
    </div>

    <div>
        <label for="status">Status:</label>
        <select name="status" required>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select>
    </div>

    <div>
        <button type="submit">Submit</button>
    </div>
</form>
