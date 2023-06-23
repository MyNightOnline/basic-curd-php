<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าแรก</title>
    <link rel="stylesheet" href="../css/main.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <?php include './components/layouts/navbar.php'; ?>

    <div class="max-w-7xl mx-auto mt-20">
        <nav>
            <ul class="space-y-6">
                <li>
                    <a href="/views/product" class="bg-gray-800 text-gray-300 hover:bg-gray-700 hover:text-white px-4 py-2 rounded-md text-sm font-medium">
                        สินค้า
                    </a>
                </li>
                <li>
                    <a href="/views/state-welfare" class="bg-gray-800 text-gray-300 hover:bg-gray-700 hover:text-white px-4 py-2 rounded-md text-sm font-medium">
                        สิทธิสวัสดิการแห่งรัฐ
                    </a>
                </li>
            </ul>
        </nav>
    </div>

</body>

</html>