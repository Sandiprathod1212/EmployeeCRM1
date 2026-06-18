<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Error')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <style>
        body{
            min-height:100vh;
            margin:0;
            background:linear-gradient(135deg,#020617,#1e3a8a,#2563eb);
            display:flex;
            align-items:center;
            justify-content:center;
            font-family:Segoe UI,sans-serif;
            padding:20px;
        }
        .error-card{
            width:100%;
            max-width:620px;
            background:#fff;
            border-radius:32px;
            padding:48px;
            text-align:center;
            box-shadow:0 30px 80px rgba(0,0,0,.25);
        }
        .error-icon{
            width:96px;
            height:96px;
            border-radius:28px;
            margin:0 auto 24px;
            background:#eff6ff;
            color:#2563eb;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:48px;
        }
        .error-code{
            font-size:76px;
            line-height:1;
            font-weight:900;
            color:#111827;
        }
        .error-title{
            font-weight:800;
            color:#111827;
            margin-top:18px;
        }
        .error-message{
            color:#64748b;
            font-size:16px;
            margin:14px auto 28px;
            max-width:460px;
        }
        .btn-back{
            border-radius:999px;
            padding:12px 28px;
            font-weight:700;
        }
    </style>
</head>
<body>

<div class="error-card">
    <div class="error-icon">
        <i class="bi @yield('icon', 'bi-exclamation-triangle-fill')"></i>
    </div>

    <div class="error-code">@yield('code')</div>

    <h3 class="error-title">@yield('title')</h3>

    <p class="error-message">@yield('message')</p>

    <a href="{{ url()->previous() }}" class="btn btn-primary btn-back">
        <i class="bi bi-arrow-left me-1"></i>
        Go Back
    </a>

    <a href="{{ url('/') }}" class="btn btn-outline-secondary btn-back ms-2">
        Home
    </a>
</div>

</body>
</html>
