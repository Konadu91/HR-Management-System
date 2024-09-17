<form action="{{ route('users.update', $user) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required value="{{ $user->name }}">
    <br>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required value="{{ $user->email }}">
    <br>
    <button type="submit">Update User</button>
</form>