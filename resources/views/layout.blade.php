<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <script src="//unpkg.com/alpinejs" defer></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            laravel: "#ef3b2d",
                        },
                    },
                },
            };
        </script>
        <title>Bedev2022 | CMS project</title>
    </head>
    <body class="mb-48">
        <nav class="flex justify-between items-center mb-4">
            <a href="/bedev2022/public/"
                ><img class="w-24" src="{{asset('images/no-image.png')}}" alt="" class="logo"
            /></a>
            <ul class="flex space-x-6 mr-6 text-lg">
                @auth
                <li>
                    <span class="font.bold uppercase">Welcome {{auth()->user()->name}}</span>
                </li>
                <li>
                    <a href="/bedev2022/public/posts/manage" class="hover:text-laravel"
                        ><i class="fa-solid fa-gear"></i>
                        Manage Posts</a
                    >
                </li>
                <li>
                    <a href="/bedev2022/public/users" class="hover:text-laravel"
                        ><i class="fa-solid fa-gear"></i>
                        User settings</a
                    >
                </li>
                <li>
                    <form class="inline" action="/bedev2022/public/logout" method="post">
                        @csrf
                        <button type="submit">
                            <i class="fa-solid fa-door-closed"> Logout</i>
                        </button>
                    </form>
                </li>

                @else
                <li>
                    <a href="/bedev2022/public/register" class="hover:text-laravel"
                        ><i class="fa-solid fa-user-plus"></i> Register</a
                    >
                </li>
                <li>
                    <a href="/bedev2022/public/login" class="hover:text-laravel"
                        ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                        Login</a
                    >
                </li>
                @endauth
            </ul>
        </nav>
        <main>
            @yield('content')  {{-- layout se moze postaviti i kao komponenta tako da se u ovoj liniji napise {{$slot}} umjesto @yield i cijeli fajl premjesti u components folder --}}
        </main>
        <footer
            class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center"
        >
            <a
                href="/bedev2022/public/posts/create"
                class="absolute top-1/3 center-10 bg-black text-white py-2 px-5"
                >Create Post</a
            >
        </footer>

        <x-flash-message />
    </body>
</html>