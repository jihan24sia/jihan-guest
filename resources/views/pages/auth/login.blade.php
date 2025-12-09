<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
        .auth-container {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 60px 20px;
            min-height: 100vh;
            background: linear-gradient(135deg, #FFB6C1, #FFD966);
        }

        .login-card {
            background: #fff;
            width: 420px;
            padding: 35px;
            border-radius: 18px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
            animation: fadeIn 0.8s ease;
        }

        .login-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .login-header h2 {
            margin: 0;
            font-weight: 700;
            color: #d63384;
        }

        label {
            font-weight: 600;
            margin-bottom: 5px;
            display: block;
        }

        input {
            width: 100%;
            padding: 12px;
            border-radius: 12px;
            border: 2px solid #f7c4d4;
            outline: none;
            font-size: 14px;
            margin-bottom: 15px;
        }

        input:focus {
            border-color: #ff6699;
            box-shadow: 0 0 0 3px rgba(255,105,180,.25);
        }

        .btn-login {
            width: 100%;
            padding: 12px;
            font-size: 15px;
            font-weight: bold;
            border: none;
            border-radius: 12px;
            background: linear-gradient(135deg, #ff6699, #ffd23f);
            color: white;
            cursor: pointer;
            transition: .2s;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(255,105,180,.3);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>

<body>

<div class="auth-container">

    <div class="login-card">

        <div class="login-header">
            <h2>Login</h2>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger rounded-3 p-3">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login.post') }}" method="POST">
            @csrf

            <label>Email</label>
            <input type="email" name="email" placeholder="Masukkan email" required>

            <label>Password</label>
            <input type="password" name="password" placeholder="Masukkan password" required>

            <button class="btn-login">Masuk</button>
        </form>

    </div>

</div>

</body>
</html>
