<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'InstaAPP')</title>
    <link rel="icon" href="{{ asset('image/logo.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<body class="bg-gray-100">


    <main>
        @yield('content')
    </main>

    <x-create-post.modal-upload />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/home.js') }}" defer></script>
    <script src="{{ asset('js/create-post.js') }}" defer></script>

    <script>
        // SweetAlert2 Notifications
        @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: "{{ session('success') }}",
            timer: 3000,
            showConfirmButton: false
        });
        @endif

        document.addEventListener('DOMContentLoaded', () => {
            const menuButton = document.getElementById('toggle-menu');
            const dropdownMenu = document.getElementById('dropdown-menu');

            if (menuButton && dropdownMenu) {
                menuButton.addEventListener('click', (event) => {
                    event.stopPropagation();
                    dropdownMenu.classList.toggle('hidden');
                });

                document.addEventListener('click', () => {
                    dropdownMenu.classList.add('hidden');
                });
            }
        });

        function openModal() {
            const modal = document.getElementById('uploadModal');
            if (modal) modal.classList.remove('hidden');
            else console.error("Modal dengan ID 'uploadModal' tidak ditemukan");
        }

        function closeModal() {
            const modal = document.getElementById('uploadModal');
            if (modal) modal.classList.add('hidden');
            else console.error('Modal with ID "uploadModal" not found!');
        }

        function handleFileInput() {
            const fileInput = document.getElementById('media-upload');
            if (fileInput) fileInput.click();
            else console.error('File input with ID "media-upload" not found!');
        }

        // Komentar
        document.querySelectorAll('.comment-button').forEach(button => {
            button.addEventListener('click', async function () {
                const postId = this.getAttribute('data-post-id');
                const form = document.getElementById(`comment-form-${postId}`);
                const formData = new FormData(form);

                try {
                    const response = await fetch(form.action, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        },
                        body: formData,
                    });

                    if (response.ok) {
                        const data = await response.json();
                        const commentSection = form.previousElementSibling;
                        const newComment = document.createElement('div');
                        newComment.classList.add('mb-2');
                        newComment.innerHTML = `<span class="font-semibold">Anda:</span> <span class="text-gray-700">${formData.get('comment')}</span>`;
                        commentSection.appendChild(newComment);
                        form.reset();
                    } else {
                        alert('Gagal menambahkan komentar.');
                    }
                } catch (error) {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan.');
                }
            });
        });

        document.querySelectorAll('.like-button').forEach(button => {
        button.addEventListener('click', async function (event) {
            event.preventDefault(); // Cegah submit default
            const postId = this.getAttribute('data-post-id');
            const form = document.getElementById(`like-form-${postId}`);
            const formData = new FormData(form);

            try {
                const response = await fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest', // Header untuk AJAX
                    },
                    body: formData,
                });

                if (response.ok) {
                    const data = await response.json();

                    // Update jumlah like di UI
                    const likeCount = document.getElementById(`like-count-${postId}`);
                    likeCount.textContent = data.like_count;

                    alert(data.message); // Opsional: Tampilkan pesan sukses
                } else {
                    const error = await response.json();
                    alert(error.message || 'Gagal menyukai postingan.');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Terjadi kesalahan.');
            }
        });
    });
    document.querySelectorAll('.comment-toggle').forEach((button) => {
    button.addEventListener('click', () => {
        const postId = button.getAttribute('data-post-id');
        const commentSection = document.getElementById(`comments-${postId}`);

        commentSection.classList.toggle('hidden');
    });
});
    </script>

</body>
</html>
