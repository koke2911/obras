// Cargar Chart.js desde CDN si no está en tu proyecto
const script = document.createElement('script');
script.src = 'https://cdn.jsdelivr.net/npm/chart.js';
document.head.appendChild(script);

// Esperar a que Chart.js esté disponible
script.onload = function () {
    // Función para obtener datos de la tabla 'seguimiento'
    async function fetchSeguimientoData() {
        try {
            const response = await fetch('data_panel.php'); // Ruta del servidor para obtener los datos
            const data = await response.json();
            return data; // data = { pendiente: 10, noSolucionado: 5, solucionado: 15 }
        } catch (error) {
            console.error('Error al obtener los datos del seguimiento:', error);
            return { pendiente: 0, noSolucionado: 0, solucionado: 0 };
        }
    }

    // Crear el gráfico
    async function createSeguimientoChart() {
        const seguimientoData = await fetchSeguimientoData();

        // Configuración del gráfico
        const ctx = document.getElementById('seguimientoChart').getContext('2d');
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Pendiente', 'No solucionado', 'Solucionado'],
                datasets: [{
                    data: [
                        seguimientoData.pendiente,
                        seguimientoData.noSolucionado,
                        seguimientoData.solucionado
                    ],
                    backgroundColor: ['#F7F769', '#FB6666', '#96D796'],
                    borderColor: ['#E5D95C', '#E35D5D', '#85C685'],
                    borderWidth: 1,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'right',
                        labels: {
                            color: '#FFFFFF',
                            boxWidth: 10, // Ancho del cuadro de color junto al texto
                            boxHeight: 10, // Altura del cuadro de color (Chart.js 4.x+)
                            padding: 10, // Espaciado entre etiquetas
                            font: {
                                family: 'Arial', // Fuente de las etiquetas
                                size: 12, // Tamaño de la fuente
                                style: 'italic', // Estilo de la fuente ('normal', 'italic', 'oblique')
                                weight: 'bold', // Grosor de la fuente ('normal', 'bold', 'bolder', 'lighter')
                            }
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function (tooltipItem) {
                                const label = tooltipItem.label || '';
                                const value = tooltipItem.raw;
                                return `${label}: ${value}`;
                            }
                        }
                    }
                }
            }
        });
    }


    async function fetchIngresosData() {
        try {
            const response = await fetch('data_pagos.php'); // Ruta del servidor para obtener los datos
            const data = await response.json();
            return data; // data = [{mes: '2024-01', total: 500}, {mes: '2024-02', total: 800}]
        } catch (error) {
            console.error('Error al obtener los datos de ingresos:', error);
            return [];
        }
    }
    

    async function createIngresosChart() {
        const ingresosData = await fetchIngresosData();

        // Preparar datos para el gráfico
        const labels = ingresosData.map(item => item.mes);
        const data = ingresosData.map(item => item.total);

        // Configuración del gráfico
        const ctx = document.getElementById('pagosChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Ingresos Mensuales',
                    data: data,
                    backgroundColor: '#76A9FA',
                    borderColor: '#4A90E2',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        labels: {
                            color: '#FFFFFF', // Color de las etiquetas de la leyenda
                            font: {
                                family: 'Arial',
                                size: 12,
                                weight: 'bold'
                            }
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function (tooltipItem) {
                                return `Ingresos: $${tooltipItem.raw.toLocaleString()}`;
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        // title: {
                        //     display: true,
                        //     // text: 'Mes',
                        //     color: '#FFFFFF', // Color del título del eje X
                        //     font: {
                        //         family: 'Arial',
                        //         size: 14
                        //     }
                        // },
                        ticks: {
                            color: '#FFFFFF', // Color de las etiquetas (meses) del eje X
                            font: {
                                size: 12,
                                family: 'Arial'
                            }
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Ingresos ($)',
                            color: '#FFFFFF', // Color del título del eje Y
                            font: {
                                family: 'Arial',
                                size: 14
                            }
                        },
                        ticks: {
                            color: '#FFFFFF', // Color de las etiquetas (valores) del eje Y
                            font: {
                                size: 12,
                                family: 'Arial'
                            }
                        },
                        beginAtZero: true
                    }
                }
            }
        });
    }
    // Llamar a la función para renderizar el gráfico
    createSeguimientoChart();
    createIngresosChart();
};




$(document).ready(function () {

});

