document.addEventListener('DOMContentLoaded', function() {
    const goalPreviewList = document.getElementById('goalPreviewList');
    const addGoalButton = document.getElementById('addGoalButton');
    const newGoalInput = document.getElementById('newGoal');

    addGoalButton.addEventListener('click', function() {
        const newGoal = newGoalInput.value.trim();

        if (newGoal !== '') {
            // Create a new list item
            const listItem = document.createElement('li');
            listItem.classList.add('list-group-item');
            listItem.textContent = newGoal;

            const inputHidden = document.createElement('input');
            inputHidden.setAttribute("type", "hidden");
            inputHidden.setAttribute("name", "goals[]");
            inputHidden.setAttribute("value", newGoal);

            goalPreviewList.appendChild(listItem);
            listItem.appendChild(inputHidden);

            newGoalInput.value = '';
        }
    });

    const imageInput = document.getElementById('imageUploader');
    const imgPreview = document.querySelector('.img-preview-container img');

    imageInput.addEventListener('change', function() {
        const imageFile = imageInput.files[0];

        if (imageFile) {
            const reader = new FileReader();

            reader.addEventListener('load', function(event) {
                imgPreview.src = event.target.result;
                imgPreview.parentElement.classList.add('visible');
            });

            reader.readAsDataURL(imageFile);
        }
    });
});
