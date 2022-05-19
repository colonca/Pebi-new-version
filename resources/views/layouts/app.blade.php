<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

	<!-- Styles -->
	<link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

	@livewireStyles

	<!-- Scripts -->
	<script src="{{ mix('js/app.js') }}" defer></script>
    <script src="/js/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</head>

<!-- overflow-y-auto w-96 h-96 hover:bg-blue-200-->

<body class="font-sans antialiased">
	<div class="flex flex-col h-screen">
		<div class="flex flex-1 overflow-y-hidden ">
			<x-sidebar.main />
			<div class="panel flex-grow flex flex-col px-6 mt-8 overflow-x-hidden">
				<x-navbar />
				<div class="flex-grow w-full overflow-y-auto overflow-x-hidden">
					@yield('content')
				</div>
			</div>
		</div>
	</div>
	<livewire:components.modal />
	<livewire:components.delete-modal />
	@livewireScripts
	@stack('scripts')
</body>
</html>
