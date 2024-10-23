<?php 

	include 'functions.php';

	session_start();
	$tokens = list_tokens();
?>
<?php include 'templates/header.php'; ?>
<div class="min-h-full">
	<nav class="bg-gray-800">
		<div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
			<div class="relative flex h-16 items-center justify-between">
				<div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
					<!-- Mobile menu button-->
					<button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
						<span class="absolute -inset-0.5"></span>
						<span class="sr-only">Open main menu</span>
						<!--
							Icon when menu is closed.

							Menu open: "hidden", Menu closed: "block"
						-->
						<svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
							<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
						</svg>
						<!--
							Icon when menu is open.

							Menu open: "block", Menu closed: "hidden"
						-->
						<svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
							<path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
						</svg>
					</button>
				</div>
				<div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
					<div class="flex flex-shrink-0 items-center">
						<img class="h-8 w-auto" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
					</div>
					<div class="hidden sm:ml-6 sm:block">
						<div class="flex space-x-4">
							<!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
							<a href="/dashboard" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white" aria-current="page">Dashboard</a>
						</div>
					</div>
				</div>
				<div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
					<div class="relative ml-3">
						<div>
							<button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" type="button" class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
								<span class="absolute -inset-1.5"></span>
								<span class="sr-only">Open user menu</span>
								<img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
							</button>
						</div>
						<div id="dropdown"  class="hidden absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
							<!-- Active: "bg-gray-100", Not Active: "" -->
							<a href="/logout" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Logout</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Mobile menu, show/hide based on menu state. -->
		<div class="sm:hidden" id="mobile-menu">
			<div class="space-y-1 px-2 pb-3 pt-2">
				<!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
				<a href="/dashboard" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white" aria-current="page">Dashboard</a>
			</div>
		</div>
	</nav>
	<header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">Dashboard</h1>
    </div>
  </header>
	<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
			<div class="relative flex flex-col w-full h-full text-slate-700 bg-white shadow-md rounded-xl bg-clip-border">
				<div class="relative mx-4 mt-4 overflow-hidden text-slate-700 bg-white rounded-none bg-clip-border">
					<div class="flex items-center justify-between ">
							<div>
									<h3 class="text-lg font-semibold text-slate-800">Lista de tokens</h3>
							</div>
					<div class="flex flex-col gap-2 shrink-0 sm:flex-row">
							<button
							class="flex select-none items-center gap-2 rounded bg-slate-800 py-2.5 px-4 text-xs font-semibold text-white shadow-md shadow-slate-900/10 transition-all hover:shadow-lg hover:shadow-slate-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
							data-modal-target="create-token-modal" data-modal-toggle="create-token-modal"
							type="button">
							Create Token
						</button>
					</div>
				</div>
			</div>
			<div class="p-0 overflow-scroll">
				<table class="w-full mt-4 text-left table-auto min-w-max">
					<thead>
						<tr>
							<th
									class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100">
									<p
									class="flex items-center justify-between gap-2 font-sans text-sm font-normal leading-none text-slate-500">
										Simbolo
									</p>
							</th>
							<th
									class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100">
									<p
									class="flex items-center justify-between gap-2 font-sans text-sm font-normal leading-none text-slate-500">
										Nombre
									</p>
							</th>
							<th
									class="p-4 transition-colors cursor-pointer border-y border-slate-200 bg-slate-50 hover:bg-slate-100">
									<p
									class="flex items-center justify-between gap-2 font-sans text-sm  font-normal leading-none text-slate-500">
									Suministro Inicial
									</p>
							</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($tokens  as $token): ?>
						<tr>
							<td class="p-4 border-b border-slate-200">
								<div class="flex items-center gap-3">
									<div class="flex flex-col">
										<p class="text-sm font-semibold text-slate-700">
											<?= $token->symbol ?>
										</p>
									</div>
								</div>
							</td>
							<td class="p-4 border-b border-slate-200">
								<div class="flex flex-col">
									<p class="text-sm font-semibold text-slate-700">
										<?= $token->name ?>
									</p>
								</div>
							</td>
							<td class="p-4 border-b border-slate-200">
								<div class="flex flex-col">
									<p class="text-sm font-semibold text-slate-700">
											<?= $token->initialSupply ?>
									</p>
								</div>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
		<div id="create-token-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
				<div class="relative p-4 w-full max-w-2xl max-h-full">
						<div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
								<div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
										<h3 class="text-xl font-semibold text-gray-900 dark:text-white">
												Crear Token
										</h3>
										<button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="create-token-modal">
												<svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
														<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
												</svg>
												<span class="sr-only">Close modal</span>
										</button>
								</div>
								<div class="p-4 md:p-5 space-y-4">
									<form class="space-y-6" action="/create-token" method="POST">
										<div>
											<label for="symbol" class="block text-sm font-medium leading-6 text-gray-900">Simbolo</label>
											<div class="mt-2">
												<input id="symbol" name="symbol" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
											</div>
										</div>
										<div>
											<label for="name" class="block text-sm font-medium leading-6 text-gray-900">Nombre</label>
											<div class="mt-2">
												<input id="name" name="name" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
											</div>
										</div>
										<div>
											<label for="initialSupply" class="block text-sm font-medium leading-6 text-gray-900">Suministro Inicial</label>
											<div class="mt-2">
												<input id="initialSupply" name="initialSupply" type="number" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
											</div>
										</div>
										<div class="flex items-center justify-end pt-2 border-t border-gray-200 rounded-b dark:border-gray-600">
											<button data-modal-hide="create-token-modal" type="button" class="py-2.5 px-5 mr-2 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cancelar</button>
											<button data-modal-hide="create-token-modal" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar</button>
										</div>
									</form>
								</div>
						</div>
				</div>
		</div>
  </main>
</div>
<?php include 'templates/footer.php'; ?>
