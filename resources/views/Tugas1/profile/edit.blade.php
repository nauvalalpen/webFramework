<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
</head>
<body>
    <h1>Edit Your Profile</h1>
    <form method="POST" action="/profile/update">
        @csrf
        @method('PUT')
        <div>
            <input type="text" name="name" placeholder="Full Name">
        </div>
        <div>
            <input type="email" name="email" placeholder="Email">
        </div>
        <div>
            <textarea name="bio" placeholder="Bio"></textarea>
        </div>
        <button type="submit">Update Profile</button>
    </form>
</body>
</html>
