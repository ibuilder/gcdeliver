<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div style="display: flex; flex-direction: column; min-height: 100vh;">
        <header style="background-color: #f0f0f0; padding: 10px; display: flex; justify-content: flex-end; align-items: center;">
            <div style="position: relative;">
                <i class="fa-solid fa-bell" style="cursor: pointer;"></i>
                <div style="position: absolute; top: 100%; right: 0; background-color: white; border: 1px solid #ccc; display: none;" id="notificationsDropdown">
                    @include('layouts.notifications')
                </div>
            </div>
        </header>
        <main style="flex-grow: 1; padding: 20px;">
            @yield('content')
        </main>
    </div>
    <script>
        document.querySelector('.fa-bell').addEventListener('click', () => document.getElementById('notificationsDropdown').style.display = document.getElementById('notificationsDropdown').style.display === 'none' ? 'block' : 'none');
    </script>
</body>
</html>