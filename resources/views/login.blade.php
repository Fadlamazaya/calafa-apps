<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #000080;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Arial', sans-serif;
        }

        .login-container {
            display: flex;
            width: 60%;
            max-width: 900px;
            height: 500px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .image-container {
            width: 350px;
            height: 350px;
            /* padding: 50px; */
            background-image: url('{{ asset("assets-admin/img/brand/logocalafa.png") }}');
            background-size: cover;
            background-position: center;
            margin-top: 80px;
            margin-right: 30px;
            margin-left: 30px;
        }

        .login-card {
            width: 50%;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .card-header {
            text-align: center;
        }

        .card-header img {
            width: 60px;
            height: auto;
            margin-bottom: 15px;
        }

        .form-control {
            border-radius: 8px;
            border: 1px solid #ced4da;
        }

        .btn-primary {
            border-radius: 8px;
            background-color: #ff7f00;
            border: none;
        }

        .btn-primary:hover {
            background-color: #000080;
        }

        .card-footer {
            text-align: center;
            margin-top: 1rem;
        }

        .small-text {
            color: #6c757d;
        }

        a {
            color: #ff7f00;
            text-decoration: none;
        }

        a:hover {
            color: #000080;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <!-- Side image -->
        <div class="image-container"></div>

        <!-- Login form -->
        <div class="login-card">
            <div class="card-header">
                <img src="{{ asset('assets-admin/img/brand/logocalafa.png') }}" alt="Calafa Logo">
                <h3>Welcome Back To Calafa Food</h3>
                <p>Please login to your account</p>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                @if(session('result') == 'success')
                    <div class="alert alert-success text-center">Login Berhasil!</div>
                @elseif(session('result') == 'error')
                    <div class="alert alert-danger text-center">Login Gagal!</div>
                @endif

                <form action="{{ route('auth.login') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required
                            value="{{ old('email') }}" placeholder="Enter your email">
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required
                            placeholder="Enter your password">
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                        
                    </div>
                </form>
            </div>
            {{-- <div class="card-footer">
                <p class="small-text">Don't have an account? <a href="#">Sign up</a></p>
            </div> --}}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
