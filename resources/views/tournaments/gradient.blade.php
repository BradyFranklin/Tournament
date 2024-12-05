<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gradient Background</title>
    <style>
        :root {
            /* Define color variables */
            --orange1: #F76D1F;
            --orange2: #F6471C;
            --black1: #000000;
            --dark-green: #0E1F14;
            --overlay-grid: rgba(255, 255, 255, 0.05);
        }

        body {
            margin: 0;
            background: linear-gradient(120deg, var(--orange1) 30%, var(--orange2) 70%),
            radial-gradient(circle at 50% 50%, var(--black1) 30%, var(--dark-green) 100%);
            background-blend-mode: overlay, normal;
            background-color: var(--black1);
            color: white;
            min-height: 100vh;
            font-family: Arial, sans-serif;
            position: relative;
            overflow: hidden;
        }

        /* Adding a grid pattern overlay */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: linear-gradient(var(--overlay-grid) 2px, transparent 2px),
            linear-gradient(90deg, var(--overlay-grid) 2px, transparent 2px);
            background-size: 100px 100px; /* Increased tile size */
            pointer-events: none; /* Allows interaction through this layer */
        }

        .bg-image {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: auto;
            z-index: 1;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center; padding-top: 20%;">Gradient Background Example</h1>

    <img src="{{ asset('images/bg-2.png') }}" alt="Background Image" class="bg-image">
</body>
</html>
