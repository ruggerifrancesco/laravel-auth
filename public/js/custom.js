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
});
