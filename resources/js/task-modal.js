$(function () {
    const $modal = $('#createTaskModal');
    const $modalContent = $('#modalContent');
    const $form = $('#createTaskForm');
    const $boardIdInput = $('#modalBoardId');
    const $createBtn = $('#createTaskBtn');

    // Open modal with animation
    $(document).on('click', '.add-task-btn', function () {
        const boardId = $(this).data('board-id');
        $boardIdInput.val(boardId);

        // Show modal
        $modal.removeClass('hidden');

        // Trigger animation
        setTimeout(() => {
            $modalContent.removeClass('scale-95 opacity-0').addClass('scale-100 opacity-100');
        }, 10);

        // Focus on name input
        setTimeout(() => {
            $('#taskName').focus();
        }, 300);
    });

    // Close modal with animation
    function closeModal() {
        $modalContent.removeClass('scale-100 opacity-100').addClass('scale-95 opacity-0');

        setTimeout(() => {
            $modal.addClass('hidden');
            $form[0].reset();
            $createBtn.prop('disabled', false).find('span').html(`
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Create task
            `);
        }, 200);
    }

    // Close modal events
    $(document).on('click', '.close-modal', function () {
        closeModal();
    });

    // Close modal on outside click
    $modal.on('click', function (e) {
        if (e.target === this) {
            closeModal();
        }
    });

    // Handle Escape key
    $(document).on('keydown', function (e) {
        if (e.key === 'Escape' && !$modal.hasClass('hidden')) {
            closeModal();
        }
    });

});
