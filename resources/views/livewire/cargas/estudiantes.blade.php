<div>
	<form class="flex items-center justify-center" wire:submit.prevent="upload">
		<div wire:loading.remove class="upload">
			<div class="flex flex-col items-center font-semibold">
				<h2 class="text-lg">Carga el excel con los estudiantes</h2>
				<span class="text-sm text-gray-500">XLSX, XLS y CSV son los archivo permitidos</span>
			</div>
			<input type="file" style="display:none" id="import" wire:model="excel" />
			<button type="button" class="upload-document flex justify-center items-center flex-col cursor-pointer" onclick="document.getElementById('import').click();">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
				</svg>
				<span class="font-semibold text-sm text-gray-500">{{$excel !== '' ? $excel->getClientOriginalName() : 'Subir Archivo'}}</span>
			</button>
			@error('excel') <span class="text-red-500">{{ $message }}</span> @enderror
			<div class="flex justify-end mt-4">
				<button class="px-2 py-1 bg-gray-900 rounded-lg text-white font-bold">Subir</button>
			</div>
		</div>
		<div wire:loading class="flex items-center justify-center">
			<div>
				<img src="https://tradinglatam.com/wp-content/uploads/2019/04/loading-gif-png-4.gif" />
			</div>
		</div>
	</form>
</div>
