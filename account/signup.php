<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Page</title>
  <link rel="stylesheet" href="/assets/css/signup.css">
</head>
<body>
  <div class="container">
    <h2>Registration</h2>
    <form>
      <input type="text" placeholder="Full Name" pattern="[a-zA-Z ]+" required>
      <input type="email" placeholder="Email" required>
      <input type="text" placeholder="Username" pattern="^[a-z_]+[a-z0-9_]$" required>
      <input type="password" placeholder="Password" required>
      <input type="submit" value="Sign Up">
    </form>
  </div>
</body>
</html>
