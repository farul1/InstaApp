<div id="uploadModal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50" role="dialog" aria-labelledby="modalTitle">
    <div class="bg-white rounded-lg shadow-md w-1/3">
        <!-- Modal Header -->
        <div class="p-4 border-b flex justify-between">
            <h2 id="modalTitle" class="text-xl font-semibold">Buat Postingan Baru</h2>
            <button type="button" onclick="closeModal()" class="text-gray-400 hover:text-gray-600 focus:outline-none">&times;</button>
        </div>
        <!-- Modal Body -->
        <div class="p-4">
            <!-- File Upload -->
            <div class="mb-4">
                <label for="media-upload" class="block text-gray-700 font-semibold mb-2">Pilih Gambar atau Video</label>
                <input id="media-upload" type="file" name="media" accept="image/*, video/*" class="block w-full text-gray-700 border-2 border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:border-blue-500" onchange="previewImage(event)" />
            </div>
            <!-- Image Preview -->
            <div id="image-preview-container" class="mb-4 hidden">
                <img id="image-preview" src="" alt="Pratinjau Gambar" class="w-full max-w-xs max-h-60 object-contain rounded-lg mb-2" />
                <button type="button" class="text-red-500 hover:underline" onclick="removeImage()">Hapus Gambar</button>
            </div>
            <!-- Caption -->
            <div class="mb-4">
                <label for="caption" class="block text-gray-700 font-semibold mb-2">Caption</label>
                <textarea id="caption" name="caption" rows="3" class="block w-full text-gray-700 border-2 border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:border-blue-500" placeholder="Tambahkan caption untuk postingan Anda..."></textarea>
            </div>
        </div>
        <!-- Modal Footer -->
        <div class="p-4 flex justify-end">
            <button type="button" onclick="uploadPost()" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-600">Posting</button>
            <button type="button" onclick="closeModal()" class="bg-gray-500 text-white font-semibold py-2 px-4 rounded-lg hover:bg-gray-600 ml-2">Batal</button>
        </div>
    </div>
</div>
