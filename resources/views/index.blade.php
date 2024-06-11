<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">

<header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
	<div class="flex lg:justify-center lg:col-start-2">
	</div>
	@if (Route::has('login'))
		<nav class="-mx-3 flex flex-1 justify-end">
			@auth
				<a
					href="{{ url('/dashboard') }}"
					class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
					>
					Dashboard
				</a>
			@else
				<a
					href="{{ route('login') }}"
					class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
					>
					Log in
				</a>

				@if (Route::has('register'))
					<a
						href="{{ route('register') }}"
						class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
						>
						Register
					</a>
				@endif
			@endauth
		</nav>
	@endif
</header>

<main class="mt-6">
<ul>
	<li><a href="./book">Book</a></li>
	<li><a href="./member">Member</a></li>
	<li><a href="./hello">Hello</a></li>
</ul>
</main>

<footer class="py-16 text-center text-sm text-black dark:text-white/70">
Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
</footer>


</body>
</html>
