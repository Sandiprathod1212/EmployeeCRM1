
<!DOCTYPE html>
<html>
<head>
    <title>403 - Access Denied</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <style>
        body{
            background: linear-gradient(135deg,#0f172a,#1e3a8a);
            min-height:100vh;
            display:flex;
            align-items:center;
            justify-content:center;
            font-family: sans-serif;
        }

        .error-card{
            background:#fff;
            max-width:550px;
            width:100%;
            padding:50px;
            border-radius:30px;
            text-align:center;
            box-shadow:0 20px 50px rgba(0,0,0,.2);
        }

        .error-icon{
            width:100px;
            height:100px;
            margin:auto;
            background:#fee2e2;
            color:#dc2626;
            border-radius:50%;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:50px;
        }

        .error-code{
            font-size:70px;
            font-weight:800;
            color:#111827;
        }

        .error-message{
            color:#64748b;
            font-size:17px;
        }
    </style>

</head>
<body>

<div class="error-card">

    <div class="error-icon">
        <i class="bi bi-shield-lock-fill"></i>
    </div>

    <div class="error-code mt-4">
        403
    </div>

    <h3 class="fw-bold mb-3">
        Access Denied
    </h3>

    <p class="error-message mb-4">
        You do not have permission to access this page.
        Please contact the administrator if you believe this is an error.
    </p>

    <a href="{{ url()->previous() }}"
       class="btn btn-primary rounded-pill px-4">
        <i class="bi bi-arrow-left"></i>
        Go Back
    </a>

</div>

</body>
</html>
```
