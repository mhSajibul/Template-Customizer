<footer class="bg-light mt-5 py-4">
        <div class="container text-center text-muted">
            <p>&copy; <?= date('Y') ?> Template Customizer. All rights reserved.</p>
        </div>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Show filename when file is selected
        const fileInputs = document.querySelectorAll('input[type="file"]');
        fileInputs.forEach(input => {
            input.addEventListener('change', function(e) {
                const fileName = e.target.files[0]?.name;
                const fileUploadLabel = this.previousElementSibling;
                
                if (fileName) {
                    fileUploadLabel.querySelector('span').textContent = fileName;
                    fileUploadLabel.querySelector('small').textContent = 'File selected';
                } else {
                    fileUploadLabel.querySelector('span').textContent = 'Choose a file';
                    fileUploadLabel.querySelector('small').textContent = 'or drag and drop here';
                }
            });
        });
    });
    </script>
</body>
</html>