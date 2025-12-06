document.addEventListener('DOMContentLoaded', () => {

    const kanban = document.getElementById('kanban');
    if (!kanban) return;
    const csrf = kanban.dataset.csrf;
    const loading = document.getElementById('loading');
    const notify = new Notyf({
        position: {x: 'right', y: 'top'},
        duration: 3000,
        ripple: true,
        dismissible: true
    });

    new Sortable(kanban, {
        animation: 150,
        handle: '.kanban-column', // если хочешь перетаскивать только по колонке
        draggable: '.kanban-column', // правильный класс
        ghostClass: 'drag-ghost',
        onEnd: function () {
            const boardOrder = Array.from(document.querySelectorAll('.kanban-column'))
                .map((el, index) => ({
                    id: el.id.replace('column-', ''),
                    position: index + 1
                }));

            loading.classList.remove('hidden');

            fetch('/admin/board/change-status', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrf
                },
                body: JSON.stringify({order: boardOrder})
            })
                .then(res => res.json())
                .then(data => {
                    loading.classList.add('hidden');
                    if (data.success) notify.success('Board positions saved!');
                    else notify.error('Failed to save board order!');
                })
                .catch(err => {
                    loading.classList.add('hidden');
                    console.error(err);
                    notify.error('Error occurred!');
                });
        }
    });

});

