<!-- Button to Open Modal -->
<button onclick="course_modal.showModal()"
    class="px-6 py-3 text-white bg-blue-600 rounded-lg shadow-lg hover:bg-blue-700 transition">
    Create Course
</button>

<!-- Modal -->
<dialog id="course_modal" class="p-6 bg-white rounded-lg shadow-lg w-[400px] ">
    <div class="flex flex-col justify-between mb-4 gap-y-2">
        <div class="flex justify-between items-center ">

            <h2 class="text-xl font-bold">Add Course</h2>
            <button onclick="course_modal.close()" class="text-gray-600 hover:text-gray-900 text-2xl">&times;</button>
        </div>

        <form enctype="multipart/form-data" action="/course/store" method="post" class="flex flex-col gap-y-2">
            @csrf
            <div class="flex flex-col gap-y-2">
                <label for="" class="font-bold">Module</label>
                <select name="module" >
                    <option value="" selected>select a module</option>
                    <option value="coding">Coding</option>
                    <option value="media">Media</option>
                </select>
            </div>
            <div class="flex flex-col gap-y-2">
                <label for="" class="font-bold">Title</label>
                <input class="border" type="text" name="title" placeholder="eneter course title">
            </div>
            <div class="flex flex-col gap-y-2">
                <label for="" class="font-bold">Description</label>
                <input class="border" type="text" name="description" placeholder="eneter course description">
            </div>
            
            <div class="flex flex-col gap-y-2">
                <label for="" class="font-bold">Course Image</label>
                <input class="border" type="file" name="image"  accept='image/*'>
            </div>
            <button class="mt-4 bg-green-300 px-4 py-2 rounded-md">Submit</button>
        </form>
    </div>
</dialog>