// menu //
document.addEventListener('DOMContentLoaded', () => {
    const tabs = document.querySelectorAll('.tab-button');
    const sections = document.querySelectorAll('.tab-content');

    const activeTabId = localStorage.getItem('activeTab') || 'userStatsTab';
    const activeTab = document.getElementById(activeTabId);
    const activeSection = document.getElementById(activeTabId.replace('Tab', 'Section'));

    sections.forEach(section => section.classList.add('hidden'));
    activeSection.classList.remove('hidden');

    tabs.forEach(tab => {
        if (tab.id === activeTabId) {
            tab.classList.add('active');
        } else {
            tab.classList.remove('active');
        }
    });

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            sections.forEach(section => section.classList.add('hidden'));

            tabs.forEach(t => t.classList.remove('active'));

            tab.classList.add('active');

            const activeSectionId = tab.id.replace('Tab', 'Section');
            document.getElementById(activeSectionId).classList.remove('hidden');

            localStorage.setItem('activeTab', tab.id);
        });
    });
});

// explore //
document.addEventListener('DOMContentLoaded', () => {
    function filterNotes() {
        const searchTerm = document.getElementById('search').value.toLowerCase();
        const notes = document.querySelectorAll('.note');

        notes.forEach(note => {
            const title = note.querySelector('h3').textContent.toLowerCase();
            const content = note.querySelector('p').textContent.toLowerCase();

            if (title.includes(searchTerm) || content.includes(searchTerm)) {
                note.style.display = 'block';
            } else {
                note.style.display = 'none';
            }
        });
    }

    const searchInput = document.getElementById('search');
    if (searchInput) {
        searchInput.addEventListener('input', filterNotes);
    }
});
