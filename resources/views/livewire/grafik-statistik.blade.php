<div class="bg-white rounded-2xl shadow-md border border-gray-200 p-6">
    {{-- Header --}}
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-6">
        <div class="flex items-center gap-3">
            <div class="bg-blue-100 text-blue-600 p-2 rounded-full">
                <i class="fa-solid fa-chart-column text-xl"></i>
            </div>
            <div>
                <h2 class="text-lg md:text-xl font-bold text-gray-800">Statistik Penjualan Mingguan</h2>
                <p class="text-sm text-gray-500">Lihat jumlah unit yang terjual setiap minggu</p>
            </div>
        </div>

        {{-- Chart Type Selector --}}
        <div>
            <select id="chartType" class="border border-gray-300 rounded-lg px-3 py-2 text-sm text-gray-700 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="bar">Bar Chart</option>
                <option value="line">Line Chart</option>
                <option value="doughnut">Doughnut</option>
            </select>
        </div>
    </div>

    {{-- Chart --}}
    <div class="relative" style="height: 400px;">
        <canvas id="weeklyChart" class="w-full h-full"></canvas>
    </div>
</div>

@once
    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('weeklyChart').getContext('2d');
            const labels = @json($labels);
            const data = @json($data);

            const gradient = ctx.createLinearGradient(0, 0, 0, 300);
            gradient.addColorStop(0, 'rgba(59, 130, 246, 0.9)');
            gradient.addColorStop(1, 'rgba(139, 92, 246, 0.8)');

            let chartType = 'bar';
            let chartInstance;

            const renderChart = (type) => {
                if (chartInstance) chartInstance.destroy();

                chartInstance = new Chart(ctx, {
                    type: type,
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Unit Terjual',
                            data: data,
                            backgroundColor: type === 'doughnut' ? [
                                '#3B82F6', '#6366F1', '#10B981', '#F59E0B', '#EF4444', '#8B5CF6', '#14B8A6'
                            ] : gradient,
                            borderColor: 'rgba(59,130,246,1)',
                            fill: type === 'line',
                            tension: 0.4,
                            borderRadius: 12,
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        animation: {
                            duration: 1000,
                            easing: 'easeOutQuart'
                        },
                        plugins: {
                            legend: {
                                display: type === 'doughnut',
                                position: 'bottom',
                            },
                            tooltip: {
                                backgroundColor: '#1E293B',
                                titleFont: { size: 14 },
                                bodyFont: { size: 13 },
                                padding: 10,
                                callbacks: {
                                    label: ctx => ` ${ctx.raw} unit terjual`
                                }
                            }
                        },
                        scales: type !== 'doughnut' ? {
                            x: {
                                grid: { display: false },
                                ticks: {
                                    color: '#6B7280',
                                    font: { weight: '500' }
                                }
                            },
                            y: {
                                beginAtZero: true,
                                grid: {
                                    color: '#E5E7EB',
                                    borderDash: [5, 5]
                                },
                                ticks: {
                                    color: '#6B7280',
                                    stepSize: 1,
                                    font: { weight: '500' }
                                }
                            }
                        } : {}
                    }
                });
            }

            renderChart(chartType);

            document.getElementById('chartType').addEventListener('change', function () {
                chartType = this.value;
                renderChart(chartType);
            });
        });
    </script>
    @endpush
@endonce