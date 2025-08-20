document.addEventListener('DOMContentLoaded', function() {
    // Create enrollee modal
    const modal = document.createElement('div');
    modal.id = 'enrolleeModal';
    modal.className = 'modal';
    modal.innerHTML = `
        <div class="modal-content">
            <span class="close">&times;</span>
            <div id="modal-body"></div>
        </div>
    `;
    document.body.appendChild(modal);

    // Create reason modal
    const reasonModal = document.createElement('div');
    reasonModal.id = 'reasonModal';
    reasonModal.className = 'modal';
    reasonModal.innerHTML = `
        <div class="modal-content">
            <span class="close">&times;</span>
            <div id="modalContent"></div>
        </div>
    `;
    document.body.appendChild(reasonModal);
     
    // Style status cells
    const rows = document.querySelectorAll('.denied-followup-row');
    rows.forEach(row => {
        const status = row.querySelector('td:nth-child(5)');
        if (status) {
            const statusValue = status.textContent.trim().toLowerCase();
            status.innerHTML = `<span class="status-cell status-${statusValue}"> ${statusValue.toUpperCase()} </span>`;
        }
    });

    // Function to close modals
    function closeModal(modalElement) {
        if (modalElement) {
            modalElement.style.display = 'none';
        }
    }

    // Function to reattach close button listeners
    function attachCloseButtonListeners() {
        document.querySelectorAll('.modal .close').forEach(closeBtn => {
            // Remove existing listeners
            closeBtn.replaceWith(closeBtn.cloneNode(true));
            // Add new listener
            closeBtn.onclick = function() {
                const parentModal = this.closest('.modal');
                if (parentModal) {
                    closeModal(parentModal);
                }
            };
        });
    }

    // Initial attachment of close button listeners
    attachCloseButtonListeners();

    // Handle view resubmission and view reason buttons
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('view-resubmission')) {
            const enrolleeId = e.target.getAttribute('data-id');
            const modalBody = document.getElementById('modal-body');
            
            modal.style.display = 'block';
            modalBody.innerHTML = '<p>Loading...</p>';

            fetch('../server_side/admin/adminEnrolleeStatusView.php?id=' + enrolleeId)
                .then(response => response.text())
                .then(data => {
                    const modalContent = document.querySelector('#enrolleeModal .modal-content');
                    modalContent.innerHTML = `
                        <span class="close">&times;</span>
                        <div id="modal-body">
                            ${data}
                            <div class="action-buttons">
                                <button class="accept-btn" data-id="${enrolleeId}">Accept</button>
                                <button class="deny-btn" data-id="${enrolleeId}">Deny</button>
                            </div>
                        </div>
                    `;
                    attachCloseButtonListeners();
                })
                .catch(error => {
                    console.error('Error:', error);
                    modalBody.innerHTML = '<p>Error loading data. Please try again.</p>';
                    attachCloseButtonListeners();
                });
        } 
        else if (e.target.classList.contains('view-reason')) {
            const enrolleeId = e.target.getAttribute('data-id');
            const content = document.getElementById('modalContent');
            
            // Show modal and loading message
            reasonModal.style.display = 'block';
            content.innerHTML = '<p>Loading reasons...</p>';

            fetch('../server_side/admin/fetchEnrolleeTransactions.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'id=' + enrolleeId
            })
            .then(response => response.json())
            .then(response => {
                console.log('Response:', response); // Debug log
                
                if (response.success && response.data && response.data.length > 0) {
                    console.log('Building content from data:', response.data); // Debug log
                    const modalContent = document.querySelector('#reasonModal .modal-content');
                    
                    modalContent.innerHTML = '<h3>Reasons:</h3><ul> <span class="close">&times;</span>';
                    response.data.forEach((item, index) => {

                        console.log(`Processing item ${index}:`, item); // Debug log
                        if (item.Reason) {
                            modalContent.innerHTML += `<li>${item.Reason}</li>`;
                        }
                    });
                    
                    if (response.data[0].Description) {
                        modalContent.innerHTML += `<li><strong>Description:</strong> ${response.data[0].Description}</li>`;
                    }
                    modalContent.innerHTML += '</ul>';
                    
                    console.log('Final content:', content); // Debug log
                } else {
                    modalContent.innerHTML = '<p>No reasons found for this entry.</p>';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                modalContent.innerHTML = '<p>Error fetching data. Please try again later.</p>';
            });
        }
    });

    // Handle accept/deny buttons
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('accept-btn') || e.target.classList.contains('deny-btn')) {
            const enrolleeId = e.target.getAttribute('data-id');
            const status = e.target.classList.contains('accept-btn') ? 1 : 2; // 1 for accept, 2 for deny

            fetch('../server_side/admin/updateFollowedUpEnrolleeStatus.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams({
                    id: enrolleeId,
                    status: status})
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    location.reload(); // Refresh the page to show updated status
                } else {
                    alert('Error: ' + (data.message || 'Failed to update status'));
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while updating the status');
            });
        }
    });

    // Close modals when clicking outside
    window.onclick = function(event) {
        if (event.target.classList.contains('modal')) {
            closeModal(event.target);
        }
    }
});