function cloneSection(containerId) {
    const container = document.getElementById(containerId);
    const firstGroup = container.querySelector('.group-item');
    const clone = firstGroup.cloneNode(true);
    // Clear all input, textarea, and select values
    clone.querySelectorAll('input, textarea, select').forEach(input => input.value = '');
    container.appendChild(clone);
}

function deleteSection(button) {
    // Find the closest group-item
    const groupItem = button.closest('.group-item');
    // Find the parent container dynamically (the direct parent of all group-items)
    const container = groupItem.parentElement;
    // Get all group-items inside this container
    const allGroups = container.querySelectorAll('.group-item');
    // Allow delete only if more than 1 group-item is present
    if (allGroups.length > 1) {
        groupItem.remove();
    } else {
        alert("At least one entry is required.");
    }
}