<?php 

	include 'functions.php';

	session_start();
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		register($_POST['name'], $_POST['email'], $_POST['password']);
	}
?>
<?php include 'templates/header.php'; ?>
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
	<div class="sm:mx-auto sm:w-full sm:max-w-sm">
		<img class="mx-auto h-10 w-auto" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
		<h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Registrarte</h2>
	</div>
	<div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
		<form class="space-y-6" action="/register" method="POST">
			<div>
				<label for="name" class="block text-sm font-medium leading-6 text-gray-900">Nombre</label>
				<div class="mt-2">
					<input id="name" name="name" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
				</div>
			</div>
			<div>
				<label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
				<div class="mt-2">
					<input id="email" name="email" type="email" autocomplete="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
				</div>
			</div>
			<div>
				<div class="flex items-center justify-between">
					<label for="password" class="block text-sm font-medium leading-6 text-gray-900">Contraseña</label>
				</div>
				<div class="mt-2">
					<input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
				</div>
			</div>
			<div>
				<button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Registrarte</button>
			</div>
		</form>
		<p class="mt-10 text-center text-sm text-gray-500">
				Ya tienes una cuenta?
			<a href="/login" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Iniciar sesión</a>
    </p>
	</div>
</div>
<?php include 'templates/footer.php'; ?>
