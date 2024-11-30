<html>
<head>
    <meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/css.css">
</head>

<header>
    <img src="RSC/Trinity Logotipo blanco.svg">
</header>

<body>
    <div class="registration-form">
        <h1 class="section-title">Proveer Servicios</h1>
        
        <form action="register.php" method="POST" enctype="multipart/form-data">
            <!-- toda la informacion personal -->
            <div class="form-section">
                <h2 class="section-title">Informacion Personal</h2>
                
                <div class="form-group">
                    <label for="name">Nombre Completo</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                    <div class="error-message">No valido</div>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                    <div class="error-message">Correo no valido</div>
                </div>

                <div class="form-group">
                    <label for="telephone">Numero de telefono</label>
                    <input type="tel" id="telephone" name="telephone" class="form-control" required>
                    <div class="error-message">Telefono no valido</div>
                </div>

                <div class="form-group">
                    <label for="adress">Direccion Completa</label>
                    <textarea id="adress" name="adress" class="form-control" required></textarea>
                    <div class="error-message">Direccion no valida</div>
                </div>
            </div>

         <button type="submit" class="btn btn-primary">Registrar</button>
            <!-- <button type="submit" class="btn-submit">Enviar</button> -->
        </form>
    </div>

    <script>
        // validacion de formulario
        const form = document.querySelector('form');
        
        form.addEventListener('submit', (e) => {
            let isValid = true;
            
            // Validacion de nombre
            const name = document.getElementById('name');
            if (name.value.length < 2) {
                isValid = false;
                name.classList.add('invalid-input');
                name.nextElementSibling.style.display = 'block';
            }

            // Validation de email
            const email = document.getElementById('email');
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email.value)) {
                isValid = false;
                email.classList.add('invalid-input');
                email.nextElementSibling.style.display = 'block';
            }

            // Validacion de telefono
            const telephone = document.getElementById('telephone');
            const phoneRegex = /^[0-9+]{8,15}$/;
            if (!phoneRegex.test(telephone.value)) {
                isValid = false;
                telephone.classList.add('invalid-input');
                telephone.nextElementSibling.style.display = 'block';
            }
            
        });

        // para validar el input
        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('input', () => {
                input.classList.remove('invalid-input');
                const errorMessage = input.nextElementSibling;
                if (errorMessage && errorMessage.classList.contains('error-message')) {
                    errorMessage.style.display = 'none';
                }
            });
        });
    </script>
</body>
<?php
include_once "get_data.php";
?>
</html>
