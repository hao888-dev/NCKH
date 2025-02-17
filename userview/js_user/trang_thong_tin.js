
function triggerFileInput() {
    document.getElementById('avatarUpload').click();
}


function previewAvatar() {
    const fileInput = document.getElementById('avatarUpload');
    const previewImage = document.getElementById('avatarPreview');
    const file = fileInput.files[0];

    if (file) {
        const reader = new FileReader();

        reader.onload = function(e) {
            previewImage.src = e.target.result;
        };

        reader.readAsDataURL(file);
    }
}