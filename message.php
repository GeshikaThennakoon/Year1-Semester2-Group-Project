<?php
    if(isset($_SESSION['message'])) :
?>
    <script>
        function showAlert(message, duration) {
            var alertBox = document.createElement("div");
            alertBox.className = "alert";
            alertBox.textContent = message;
            document.body.appendChild(alertBox);
            setTimeout(function() {
                alertBox.parentNode.removeChild(alertBox);
            }, duration);
        }
        
        showAlert("<?php echo $_SESSION['message']; ?>", 3000);
    </script>
<?php 
    unset($_SESSION['message']);
    endif;
?>

<style>
 .alert {
    position: fixed;
    top: 10px;
    left: 50%;
    transform: translateX(-50%);
    background-color: #f8d7da;
    color: #721c24;
    padding: 10px 20px;
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
}

.alert strong {
    font-weight: bold;
}

</style>