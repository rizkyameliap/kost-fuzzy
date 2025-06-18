// Cari nilai tertinggi
const maxValue = Math.max(...data.map(item => item.nilai));
        
// Siapkan warna untuk setiap bar
const backgroundColors = data.map((item) => {
    return item.nilai === maxValue 
        ? 'rgba(220, 53, 69, 0.8)' // Bootstrap danger color
        : 'rgba(13, 202, 240, 0.8)'; // Bootstrap info color
});
        
const borderColors = data.map((item) => {
    return item.nilai === maxValue 
        ? 'rgba(220, 53, 69, 1)'
        : 'rgba(13, 202, 240, 1)';
});

// Konfigurasi Chart.js
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: data.map(item => item.name),
        datasets: [{
            label: 'Nilai',
            data: data.map(item => item.nilai),
            backgroundColor: backgroundColors,
            borderColor: borderColors,
            borderWidth: 2,
            borderRadius: 8,
            borderSkipped: false,
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false
            },
            tooltip: {
                enabled: true
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                grid: {
                    color: 'rgba(0,0,0,0.1)'
                },
                ticks: {
                    font: {
                        size: 12,
                        weight: 'bold'
                    },
                    color: '#333'
                }
            },
            x: {
                grid: {
                    display: false
                },
                ticks: {
                    font: {
                        size: 12,
                        weight: 'bold'
                    },
                    color: '#333'
                }
            }
        },
        animation: {
            duration: 2000,
            easing: 'easeInOutQuart'
        },
                onHover: (event, activeElements) => {
                    event.native.target.style.cursor = activeElements.length > 0 ? 'pointer' : 'default';
                },
                onClick: (event, activeElements) => {
                    if (activeElements.length > 0) {
                        const index = activeElements[0].index;
                        const item = data[index];
                        
                        if (item.nilai === maxValue) {
                            alert(`🏆 ${item.name} adalah produk terbaik dengan nilai ${item.nilai}!`);
                        } else {
                            alert(`📊 ${item.name}: ${item.nilai}`);
                        }
                    }
                }
            }
        });

        // Update info produk terbaik
        const bestProduct = data.find(item => item.nilai === maxValue);
        document.getElementById('bestProduct').textContent = 
            `${bestProduct.name} dengan nilai ${bestProduct.nilai}`;
