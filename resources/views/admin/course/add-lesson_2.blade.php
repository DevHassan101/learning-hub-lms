<form action="{{ route('course.lesson.store', ['course' => $course]) }}" method="post" enctype="multipart/form-data">
    @csrf

    <!-- Video Upload -->
    <div id="video-drop-area" class="border border-[#4229E2] rounded mt-3 text-center">
        <input type="file" id="video-input-file" name="video" hidden accept=".mp4" />
        <div class="p-5 mt-5">
            <div class="flex justify-center mb-3">
                <svg width="45" height="45" viewBox="0 0 54 54" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.0235 54H37.3837V26.8531H53.8076L27.2036 0.249062L0.599609 26.8531H17.0235V54Z"
                        fill="#6D51E7" />
                </svg>
            </div>
            <button type="button" id="video-browse">Save A File To Upload</button>
        </div>
        <ul id="video-file-list" class="mt-4 text-sm text-left"></ul>
    </div>

    <!-- Thumbnail Upload -->
    <div id="thumbnail-drop-area" class="border-2 border-dashed border-[#DAD9D9] rounded-lg mt-3 text-center">
        <input type="file" id="thumbnail-input-file" name="thumbnail" hidden accept="image/*" />
        <div class="bg-transparent border border-dashed border-[#4229E2] text-center p-5 max-w-[200px]">
            <button type="button" id="thumbnail-browse">Upload Thumbnail</button>
        </div>
        <ul id="thumbnail-file-list" class="mt-4 text-sm text-left"></ul>
    </div>

    <!-- Attachments Upload -->
    <div id="attachment-drop-area" class="border-2 border-dashed border-[#DAD9D9] rounded-lg mt-3 text-center">
        <input type="file" id="attachment-input-file" name="attachment" hidden accept=".pdf" />
        <div class="bg-transparent border border-dashed border-[#4229E2] text-center p-5 w-[200px]">
            <button type="button" id="attachment-browse">Upload Attachment</button>
        </div>
        <ul id="attachment-file-list" class="mt-4 text-sm text-left"></ul>
    </div>

    <button class="py-2 px-10 text-center bg-gradient-to-r from-[#442AE2] to-[#6956E7] rounded-xl text-white text-[16px] font-semibold">
        Save
    </button>
</form>

<script>
    function setupFileUpload(areaId, inputId, listId, browseBtnId, allowedTypes) {
        const dropArea = document.getElementById(areaId);
        const inputFile = document.getElementById(inputId);
        const fileList = document.getElementById(listId);
        const browseBtn = document.getElementById(browseBtnId);

        dropArea.addEventListener("dragover", e => {
            e.preventDefault();
            e.dataTransfer.dropEffect = "copy";
        });

        dropArea.addEventListener("drop", e => {
            e.preventDefault();
            handleFiles(e.dataTransfer.files);
        });

        browseBtn.addEventListener("click", () => inputFile.click());

        inputFile.addEventListener("change", e => {
            if (e.target.files.length) handleFiles(e.target.files);
        });

        function handleFiles(files) {
            const dataTransfer = new DataTransfer();
            const filteredFiles = Array.from(files).filter(file =>
                allowedTypes.includes(file.name.split('.').pop().toLowerCase())
            );

            if (!filteredFiles.length) {
                document.getElementById('image-type-modal').classList.remove('hidden');
                document.getElementById('heading').innerText = "Invalid File Type";
                document.getElementById('text').innerHTML = `<b>Allowed Types:</b> ${allowedTypes.join(", ")}`;
                return;
            }

            filteredFiles.forEach(file => dataTransfer.items.add(file));
            inputFile.files = dataTransfer.files;

            fileList.innerHTML = filteredFiles.map(file => `<li>${file.name}</li>`).join('');
        }
    }

    setupFileUpload("video-drop-area", "video-input-file", "video-file-list", "video-browse", ["mp4"]);
    setupFileUpload("thumbnail-drop-area", "thumbnail-input-file", "thumbnail-file-list", "thumbnail-browse", ["jpg", "jpeg", "png"]);
    setupFileUpload("attachment-drop-area", "attachment-input-file", "attachment-file-list", "attachment-browse", ["pdf"]);

    function closeImageTypeModal() {
        document.getElementById('image-type-modal').classList.add('hidden');
    }
</script>
