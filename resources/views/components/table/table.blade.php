<div class='overflow-x-auto rounded-lg border'>
    <table class='mx-auto w-full whitespace-nowrap bg-white divide-y divide-gray-300 overflow-hidden'>
        <thead class="bg-gray-100">
            <tr class="text-gray-600 text-left">
                @foreach ($header as $item)
                  <th class="font-semibold text-sm px-2 py-2"> 
                     {{__($item)}} 
                  </th>  
                @endforeach
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 ">
            {{$slot}}
        </tbody>
    </table>
</div>