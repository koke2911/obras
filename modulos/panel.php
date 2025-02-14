<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Principal</title>
    <link rel="stylesheet" href="../static/bootstrap-4.6/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="../../css/style.css"> -->
    <script src="../static/js/fontawesome.all.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ecf0f1;
        }

        .dashboard-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
            padding: 2rem;
        }

        .dashboard-card {
            background-color: #0a4d91;
            color: #ecf0f1;
            padding: 1.5rem;
            text-align: center;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
            background-color: #3b7ec1;
            color: #0a4d91
        }

        .dashboard-card i {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: #1abc9c;
        }

        .dashboard-card a {
            text-decoration: none;
            color: inherit;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .dashboard-card a:hover {
            color: #0a4d91;
        }

        .graph-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            padding: 2rem;
        }

        .graph-card {
            background-color: #3b7ec1;
            color: #ecf0f1;
            text-align: center;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            width: 100%;
            /* Para que mantenga el ancho */
            aspect-ratio: 1;
            /* Relación de aspecto cuadrada */
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            max-height: 30%;
        }

        .graph-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
        }

        .graph-card h3 {
            margin-bottom: 1rem;
            font-size: 1.5rem;
            font-weight: bold;
        }

        @media (max-width: 768px) {
            .dashboard-container {
                grid-template-columns: repeat(2, 1fr);
            }

            .graph-container {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .dashboard-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <header>
        <h1 class="text-center p-3">Dashboard Principal</h1>
    </header>
    <main>
        <!-- Menú de Opciones -->
        <div class="dashboard-container">
            <!-- Mantenedores -->
            <div class="dashboard-card">
                <i class="fas fa-cogs"></i>
                <h3>Mantenedores</h3>
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-cogs me-2"></i> Mantenedores
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <button id="menu_usuarios" class="dropdown-item"><i class="fas fa-users me-2"></i>
                            <a href="usuarios/usuarios.php">Usuarios</a>
                        </button>
                        <a class="dropdown-item" href="mantenedores/materiales.php" id="menu_materiales"><i class="fas fa-calculator me-2"></i> Materiales</a>
                        <!-- <a class="dropdown-item" href="#" id="menu_actividades"><i class="fas fa-shopping-cart me-2"></i> Actividades</a> -->
                    </div>
                </div>
            </div>

            <!-- Proyectos -->
            <div class="dashboard-card">
                <i class="fas fa-building"></i>
                <h3><a href="proyectos/proyectos.php">Proyectos</a></h3>
            </div>

            <!-- Trabajadores -->
            <div class="dashboard-card">
                <i class="fas fa-user-injured"></i>
                <h3>Trabajadores</h3>
            </div>

            <!-- Actividades -->
            <div class="dashboard-card">
                <i class="fas fa-chart-bar"></i>
                <h3>Actividades</h3>
            </div>

            <!-- Cronograma -->
            <div class="dashboard-card">
                <i class="fas fa-chalkboard-teacher"></i>
                <h3>Cronograma</h3>
            </div>

            <!-- Ficha Proveedores -->
            <div class="dashboard-card">
                <i class="fas fa-dollar-sign"></i>
                <h3>Ficha Proveedores</h3>
            </div>

            <!-- Informe -->
            <div class="dashboard-card">
                <i class="fas fa-file-invoice-dollar"></i>
                <h3>Informe</h3>
            </div>

            <!-- Material -->
            <div class="dashboard-card">
                <i class="fas fa-cogs"></i>
                <h3>Material</h3>
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-cogs me-2"></i> Material
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                        <a class="dropdown-item" href="#" id="menu_pagos"><i class="fas fa-dollar-sign me-2"></i> Costo Material</a>
                        <a class="dropdown-item" href="#" id="menu_calculo"><i class="fas fa-calculator me-2"></i> Cálculo Material</a>
                        <a class="dropdown-item" href="#" id="menu_compra"><i class="fas fa-shopping-cart me-2"></i> Compra Material</a>
                        <a class="dropdown-item" href="#" id="menu_inventario"><i class="fas fa-warehouse me-2"></i> Inventario</a>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <script src="../static/bootstrap-4.6/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="../static/bootstrap-4.6/bootstrap.bundle.min.js"></script>
    <script src="../js/panel.js"></script>
</body>

</html>