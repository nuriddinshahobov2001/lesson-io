$(function () {

    const $kanban = $('#kanban');
    if ($kanban.length === 0) return;

    const csrf = $kanban.data('csrf');
    const $loading = $('#loading');

    const notify = new Notyf({
        position: {x: 'right', y: 'top'},
        duration: 3000,
        ripple: true,
        dismissible: true
    });

    new Sortable($kanban[0], {
        animation: 150,
        handle: '.kanban-column',
        draggable: '.kanban-column',
        ghostClass: 'drag-ghost',

        onEnd: function (evt) {

            if (evt.oldIndex === evt.newIndex) {
                return;
            }

            const boardOrder = $('.kanban-column').map(function (index) {
                return {
                    id: $(this).attr('id').replace('column-', ''),
                    position: index + 1
                };
            }).get();

            $loading.removeClass('hidden');

            $.ajax({
                url: '/board/change-status',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrf
                },
                contentType: 'application/json',
                data: JSON.stringify({order: boardOrder}),

                success: function (data) {
                    $loading.addClass('hidden');
                    if (data.success)
                        notify.success('Board positions saved!');
                    else
                        notify.error('Failed to save board order!');
                },

                error: function (xhr) {
                    $loading.addClass('hidden');
                    notify.error('Error occurred!');
                }
            });

        }
    });

});

