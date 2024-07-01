<button class="btn" onclick="create_post_modal.showModal()">open modal</button>
<dialog id="create_post_modal" class="modal">
  <div class="modal-box bg-white rounded px-7 relative">
    <h3 class="text-lg font-bold">Create post form</h3>

    <div class="modal-action justify-center w-full">
        <form action="{{ route('posts.store') }}" method="post" enctype='multipart/form-data' class="w-full">
            @csrf
            <div class="w-full mb-4">
               <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload file</label>
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file" name="file_image">
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
            </div>
         <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="caption">Caption</label>   
        <textarea id="caption" rows="3" name="caption" class="input input-bordered w-full mb-4" ></textarea>
        <button type="submit" class="btn btn-primary btn-block">submit</button>
        </form>
    </div>
      <form method="dialog" class="absolute top-0 right-0"style="top:0;right:0;">
        <!-- if there is a button in form, it will close the modal -->
        <button class="btn">×</button>
      </form>
  </div>
</dialog>