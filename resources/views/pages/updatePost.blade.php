<x-layout-base>
    <div class="container mx-auto py-10 h-64 md:w-4/5 w-11/12 px-6">
        <div class="w-full h-full px-2">
            <input id="idFormPost" type="hidden" value="{{$id}}">
            <form id="form-update" class="savePost">
                @csrf
                <div class="grid grid-cols-3 gap-4">
                    <label for="username" class="block text-lg text-gray-700">Title</label>
                    <input type="text" placeholder="Title" id="title" name="titles" class="block col-span-2  mt-2 w-full placeholder-gray-400/70 dark:placeholder-gray-500 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-blue-300" />
                
                    <label for="Description" class="block text-lg text-gray-700">Description</label>
                    <textarea placeholder="text body" id="body" name="bodys" class="block col-span-2 mt-2 w-full  placeholder-gray-400/70 dark:placeholder-gray-500 rounded-lg border border-gray-200 bg-white px-4 h-[400px] py-2.5 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-blue-300"></textarea>
                </div>
    
                <input value="Save changes" type="submit" class="px-6 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80" />
            </form>
        </div>  
    </div>
</x-layout-base>