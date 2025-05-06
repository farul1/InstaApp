document.querySelectorAll('.comment-button').forEach(button => {
    button.addEventListener('click', async function () {
        const postId = this.getAttribute('data-post-id');
        const form = document.getElementById(`comment-form-${postId}`);
        const formData = new FormData(form);

        try {
            const response = await fetch(form.action, {
                method: 'POST',
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
    button.addEventListener('click', async function () {
        const postId = this.getAttribute('data-post-id');
        const form = document.getElementById(`like-form-${postId}`);
        const formData = new FormData(form);

        try {
            const response = await fetch(form.action, {
                method: 'POST',
                body: formData,
            });

            if (response.ok) {
                const data = await response.json();

                const likeCount = document.getElementById(`like-count-${postId}`);
                likeCount.textContent = data.like_count;

                alert(data.message);
            } else {
                alert('Gagal menyukai postingan.');
            }
        } catch (error) {
            console.error('Error:', error);
            alert('Terjadi kesalahan.');
        }
    });
});
