<x-layout-base>
    <div class="hidden" id="alertDelete">
        <div class="bg-slate-800 bg-opacity-50 flex justify-center items-center absolute top-0 right-0 bottom-0 left-0">
            <div class="bg-white px-16 py-14 rounded-md text-center">
            <h1 class="text-xl mb-4 font-bold text-slate-500">Do you Want Delete</h1>
            <button class="btnAlert bg-red-500 px-4 py-2 rounded-md text-md text-white">Cancel</button>
            <button id="btnDelete" type="button" class="bg-indigo-500 px-7 py-2 ml-2 rounded-md text-md text-white font-semibold">Ok</button>
            </div>
        </div>
    </div>

    <div class="container mx-auto py-10 h-64 md:w-4/5 w-11/12 px-6">
        <div class="flex justify-center space-x-2 mb-5">
            <a href="update/{{$id}}"
                class="inline-block rounded bg-green-400 px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:bg-success-600 hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:bg-success-600 focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:bg-success-700 active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)]">
                Edit
            </a>
            <button
                type="button"
                class="btnAlert inline-block rounded bg-red-600 px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#dc4c64] transition duration-150 ease-in-out hover:bg-danger-600 hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:bg-danger-600 focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:outline-none focus:ring-0 active:bg-danger-700 active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)]">
                Delete
            </button>
        </div>

        <input id="idFormPost" type="hidden" value="{{$id}}">
        <div class="w-full h-[500px] overflow-y-scroll px-2 border-dashed border-2 border-gray-300 rounded-md p-8">
            <div id="content" class="text-justify"></div>
        </div>  
    </div>

</x-layout-base>