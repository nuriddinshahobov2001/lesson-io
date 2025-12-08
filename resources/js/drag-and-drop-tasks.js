$(function () {

    const $columns = $('.task-list');
    if ($columns.length === 0) return;

    const csrf = $('#kanban').data('csrf');
    const $loading = $('#loading');

    const notify = new Notyf({
        position: { x: 'right', y: 'top' },
        duration: 3000,
        ripple: true,
        dismissible: true
    });

    $columns.each(function () {


        new Sortable(this, {
            group: { name: 'tasks', pull: true, put: true },
            animation: 150,
            draggable: '.task-item',
            ghostClass: 'drag-ghost',

            emptyInsertThreshold: 50,
            swapThreshold: 0.5,
            fallbackOnBody: true,
            forceFallback: false,

            onEnd(evt) {
                if (evt.oldIndex === evt.newIndex && evt.from === evt.to) {
                    return;
                }

                const boardId = $(evt.to).closest('[id^=column-]').attr('id').replace('column-', '');

                const taskOrder = $(evt.to).find('.task-item').map(function (index) {
                    return {
                        id: $(this).data('id'),
                        position: index + 1
                    };
                }).get();

                $loading.removeClass('hidden');

                $.ajax({
                    url: '/admin/tasks/change-status',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrf
                    },
                    contentType: 'application/json',
                    data: JSON.stringify({
                        board_id: boardId,
                        taskOrder: taskOrder
                    }),

                    success: function (data) {
                        $loading.addClass('hidden');

                        if (data.success) {
                            notify.success('Task updated successfully!');
                            setTimeout(function () {
                                location.reload(); // перезагрузка страницы
                            }, 100);
                        } else {
                            notify.error('Failed to update task!');
                        }
                    },

                    error: function (xhr) {
                        $loading.addClass('hidden');
                        console.error(xhr);
                        notify.error('Something went wrong!');
                    }
                });

            }
        });

    });

});
