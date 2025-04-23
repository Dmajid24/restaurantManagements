<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdn.lineicons.com/5.0/lineicons.css" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/DashboardOptimize.css') }}">
</head>
<body>
    <nav class="sidebar">
        <img src="images.jpg" alt="Logo">
        <div class="upper-links">
            <ul class="nav flex-column">
                <li class="nav-item"> 
                    <a href="#" class="nav-link active"><i class="lni lni-home-2"></i>    Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link"><i class="lni lni-hat-chef-3"></i>   Staff</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link"><i class="lni lni-book-1"></i>   Menu</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link"><i class="lni lni-refresh-circle-1-clockwise"></i>   Order History</a>
                </li>
            </ul>
        </div>
        <div class="bottom-links">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="#" class="nav-link"><i class="lni lni-layout-26"></i>  Settings</a>
                </li>
                <li class="nav flex-column">
                    <a href="#" class="nav-link"><i class="lni lni-credit-card-multiple"></i>   Others</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="content">
        <h1>Dashboard</h1>
        <h5 id="date"> date today </h5>
        <small><div class="date"></div></small>

        <div class="container mt-4">
            <div class="row">
                <div class="col-md-4">
                    <div class="card shadow p-3">
                        <div class="icon text-primary"></div>
                            <h6>Total Revenue</h6>
                            <h4 id="Total-Revenue">Rp 2000000</h4>
                            <div class=""> ▲ 20% than last month</div>
                    </div>
                </div>
    
                <div class="col-md-4">
                    <div class="card shadow p-3">
                        <div class="icon text-warning"></div>
                            <h6>Total Profit</h6>
                            <h4 id="Total-Profit">Rp45,000,000</h4>
                            <div class="text-green">▲ +20% than last month</div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card shadow p-3">
                        <div class="icon text-danger"></div>
                            <h6>Total Order</h6>
                            <h4 id="Total-Order">20</h4>
                            <div class="">▲ 40% than last month</div>
                    </div>
                </div>
            </div> 
        </div>

        <div class="container mt-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="fw-bold">Weekly Sales <span class="text-muted float-end">19 February 2025 ~ 26 February 2025</span></h5>
                    <div class="chart-container">
                        <canvas id="weeklySalesChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-4">
            <h5>Staff Presence</h5>
            <div class="card shadow">
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="weeklySalesChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

        
        <nav class="right-content">
            <div class="wrapper">
                <ul class="nav flex-column">
                    <li class="nav-items">
                        <a href="#" class="nav-link shadow" id="Profile">
                            <div class="profile">
                                <img src="images.jpg" alt="profilepicture">
                                <div class="profile-info">
                                    <div class="Profile-Name">NAMA</div>
                                    <div class="Profile-Job">Job</div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-items shadow" id="Top-Product-Sold">
                        <h5>Top Product Sold</h5>
                        <div class="container">
                            <div class="product-list">
                                <div class="product-item">
                                    <div><strong>1</strong> #AA808</div>
                                    <div>Tiramisu Roll</div>
                                </div>
                                <div class="product-item">
                                    <div><strong>2</strong> #AA402</div>
                                    <div>Burnt Cheesecake</div>
                                </div>
                                <div class="product-item">
                                    <div><strong>3</strong> #AA402</div>
                                    <div>Telor Gulung</div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-items shadow" id="Order-Summary">
                        <h5>Order Summary</h5>
                        <div class="container">
                            <div class="order-item on-kitchen">
                            <div class="icon">🍽️</div>
                            <div>
                                On Kitchen
                                10
                            </div>
                        </div>
                        <div class="order-item delivered">
                            <div class="icon">⚡</div>
                            <div>
                                Delivered
                                10
                            </div>
                        </div>
                        <div class="order-item completed">
                            <div class="icon">✔️</div>
                            <div>
                                Completed
                                10
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <script>
        const ctx = document.getElementById('weeklySalesChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thur', 'Fri', 'Sat', 'Sun'],
                datasets: [
                    {
                        label: 'Product A',
                        data: [50, 50, 50, 50, 50, 50, 50],
                        backgroundColor: 'rgba(173, 216, 230, 0.8)', // Light Blue
                        borderRadius: 5
                    },
                    {
                        label: 'Product B',
                        data: [25, 25, 25, 25, 25, 25, 25],
                        backgroundColor: 'rgba(255, 215, 0, 0.8)', // Gold
                        borderRadius: 5
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 10,
                            color: '#d3d3d3' // Light gray
                        },
                        grid: {
                            color: '#f0f0f0',
                            drawBorder: false
                        }
                    },
                    x: {
                        ticks: { color: '#999' },
                        grid: { display: false }
                    }
                },
                plugins: {
                    legend: { display: false }
                }
            }
        });
    </script>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </body>
</html>