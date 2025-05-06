let selectedFile = null;

function openModal() {
    const modal = document.getElementById('uploadModal');
    if (modal) modal.classList.remove('hidden');
}

function closeModal() {
    const modal = document.getElementById('uploadModal');
    if (modal) modal.classList.add('hidden');
    resetForm();
}

function previewImage(event) {
    const file = event.target.files[0];
    if (file) {
        selectedFile = file;
        const reader = new FileReader();
        reader.onload = function (e) {
            const preview = document.getElementById('image-preview');
            preview.src = e.target.result;
            document.getElementById('image-preview-container').classList.remove('hidden');
        };
        reader.readAsDataURL(file);
    }
}

function removeImage() {
    selectedFile = null;
    const fileInput = document.getElementById('media-upload');
    fileInput.value = ''; // Reset file input
    document.getElementById('image-preview-container').classList.add('hidden');
}

function resetForm() {
    selectedFile = null;
    document.getElementById('media-upload').value = '';
    document.getElementById('image-preview-container').classList.add('hidden');
    document.getElementById('caption').value = '';
}

async function uploadPost() {
    const caption = document.getElementById('caption').value;

    if (!selectedFile) {
        Swal.fire({
            icon: 'warning',
            title: 'Peringatan',
            text: 'Harap pilih gambar atau video untuk diunggah!',
        });
        return;
    }

    const formData = new FormData();
    formData.append('image', selectedFile); // Sesuai dengan controller yang meminta field 'image'
    formData.append('caption', caption);

    try {
        const response = await fetch('/posts', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
        });

        if (response.ok) {
            const responseData = await response.json();
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: responseData.message || 'Postingan berhasil diunggah!',
            });
            closeModal();
        } else {
            const errorData = await response.json();
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: errorData.message || 'Terjadi kesalahan saat mengunggah postingan.',
            });
        }
    } catch (error) {
        console.error('Error uploading post:', error);
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Tidak dapat mengunggah postingan.',
        });
    }
}
