document.addEventListener('DOMContentLoaded', function() {
    const goalPreviewList = document.getElementById('goalPreviewList');
    const addGoalButton = document.getElementById('addGoalButton');
    const newGoalInput = document.getElementById('newGoal');

    addGoalButton.addEventListener('click', function() {
        const newGoal = newGoalInput.value.trim();

        if (newGoal !== '') {
            // Create a new list item
            const listItem = document.createElement('li');
            listItem.textContent = newGoal;
            goalPreviewList.appendChild(listItem);
            newGoalInput.value = '';
        }
    });
});
