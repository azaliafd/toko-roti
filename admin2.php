<!DOCTYPE html>
<html>
<head>
    <title>Login - Toko Roti</title>
</head>
<body>
    <h2>Login Admin</h2>
    <form method="POST" action="login.php">
        <input type="hidden" name="role" value="admin">
        <label for="adminUsername">Username:</label>
        <input type="text" id="adminUsername" name="username" required><br>
        <label for="adminPassword">Password:</label>
        <input type="password" id="adminPassword" name="password" required><br>
        <input type="submit" value="Login">
    </form>
