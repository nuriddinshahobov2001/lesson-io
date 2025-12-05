document.addEventListener('DOMContentLoaded', () => {
    const columns = document.querySelectorAll('.task-list');
    const csrf = document.getElementById('kanban').dataset.csrf;
    const loading = document.getElementById('loading');

    const notify = new Notyf({
        position: { x: 'right', y: 'top' },
        duration: 3000,
        ripple: true,
        dismissible: true
    });

    columns.forEach(column => {
        new Sortable(column, {
            group: 'tasks',
            animation: 150,
            draggable: '.task-item',
            ghostClass: 'drag-ghost',
            onEnd: function (evt) {
                const newStatus = evt.to.closest('[id^=column-]').id.replace('column-', '');
                const taskOrder = Array.from(evt.to.querySelectorAll('.task-item'))
                    .map((el, index) => ({
                        id: el.dataset.id,
                        position: index + 1
                    }));

                // Показываем спиннер
                loading.classList.remove('hidden');

                fetch('/admin/tasks/change-status', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrf,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        status: newStatus,
                        taskOrder: taskOrder
                    })
                })
                    .then(res => res.json())
                    .then(data => {
                        loading.classList.add('hidden'); // скрываем спиннер
                        if (data.success) {
                            notify.success('Task updated successfully!');
                        } else {
                            notify.error('Failed to update task!');
                        }
                    })
                    .catch(err => {
                        loading.classList.add('hidden');
                        console.error(err);
                        notify.error('Something went wrong!');
                    });
            }
        });
    });
});
