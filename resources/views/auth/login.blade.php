<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - SPK TOPSIS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #e9ecef; display: flex; align-items: center; justify-content: center; height: 100vh; }
        .login-card { width: 400px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        .header-top { background-color: #28a745; color: white; padding: 15px; text-align: center; font-weight: bold; }
    </style>
</head>
<body>

    <div class="card login-card">
        <div class="header-top">
            SPK TOPSIS Login
        </div>
        <div class="card-body p-4">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error) <li>{{ $error }}</li> @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('login.post') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Masukkan username..." required autofocus>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Masukkan password..." required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-success">Login</button>
                </div>
            </form>
        </div>
        <div class="card-footer text-center text-muted">
            <small>Universitas Riau &copy; {{ date('Y') }}</small>
        </div>
    </div>

</body>
</html>
