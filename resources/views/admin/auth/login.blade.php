<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Login | Naksh Elevator</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-box {
            width: 100%;
            max-width: 420px;
            background: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 35px rgba(0,0,0,.1);
        }

        h1 {
            margin-bottom: 8px;
            color: #172b4d;
        }

        .subtitle {
            color: #777;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: 600;
        }

        input {
            width: 100%;
            padding: 13px;
            border: 1px solid #ddd;
            border-radius: 7px;
        }

        button {
            width: 100%;
            padding: 14px;
            border: 0;
            border-radius: 7px;
            background: #172b4d;
            color: white;
            font-weight: 700;
            cursor: pointer;
        }

        .error {
            background: #ffe8e8;
            color: #b42318;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

<div class="login-box">

    <h1>Naksh Elevator</h1>

    <p class="subtitle">
        Admin Panel Login
    </p>

    @if ($errors->any())
        <div class="error">
            {{ $errors->first() }}
        </div>
    @endif

    <form
        method="POST"
        action="{{ route('admin.login.submit') }}"
    >

        @csrf

        <div class="form-group">

            <label>Email Address</label>

            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autofocus
            >

        </div>

        <div class="form-group">

            <label>Password</label>

            <input
                type="password"
                name="password"
                required
            >

        </div>

        <button type="submit">
            LOGIN TO ADMIN PANEL
        </button>

    </form>

</div>

</body>
</html>