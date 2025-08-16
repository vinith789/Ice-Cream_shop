<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="./css/login.css">
</head>
<body>
  <div class="background"></div>
  <div class="card-container">
    <div class="glass-card text-white">
      <h2>Login</h2>
      <form action="./API/login.php" method="post">
        <div class="mb-3">
          <label class="form-label">Email address</label>
          <input type="email" class="form-control" name="email" placeholder="Enter email" required />
        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" class="form-control" name="password" placeholder="Password" required />
        </div>
        <div class="d-grid mb-2">
          <button type="submit" class="btn btn-primary">Login</button>
        </div>
        <p class="text-center">Don't have an account? <a href="./pages/register.html">Register here</a></p>
      </form>
    </div>
  </div>
</body>
</html>
