function drag(event) {
    event.dataTransfer.setData("text/plain", 'dummy');
}

let draggedElement = null;

let draggableElements = document.querySelectorAll('.col-sm-6');

draggableElements.forEach(function(element) {
    element.draggable = true;
    element.addEventListener("dragstart", dragStart);
});

function dragStart(event) {
    draggedElement = event.target;
    event.dataTransfer.setData("text/plain", 'dummy');
}

document.addEventListener("dragover", function(event) {
    event.preventDefault();
});

document.addEventListener("drop", function(event) {
    event.preventDefault();
    if (draggedElement) {
        let dropZone = event.target.closest('.col-sm-6');

        if (dropZone && dropZone !== draggedElement) {
            let rect = dropZone.getBoundingClientRect();
            let afterDropY = event.clientY > rect.top + rect.height / 2;
            let afterDropX = event.clientX > rect.left + rect.width / 2;

            if (afterDropY) {
                dropZone.parentNode.insertBefore(draggedElement, dropZone.nextElementSibling);
            } else {
                dropZone.parentNode.insertBefore(draggedElement, dropZone);
            }

            if (!afterDropX) {
                let previousSibling = draggedElement.previousElementSibling;
                if (previousSibling && previousSibling.classList.contains('col-sm-6')) {
                    dropZone.parentNode.insertBefore(draggedElement, previousSibling);
                }
            }
        }
        draggedElement = null;
    }
});