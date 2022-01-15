var base_url = window.location.origin;

$("#client").change(function() {
    var idClient = ($(this).find(':selected').val());
    var request = new XMLHttpRequest();
    request.open('GET', `${base_url}/ContasReceber/SomarTotaisCliente/${idClient}`);
    request.responseType = 'json';
    request.send();
    request.onload = function() {
        var receivable = request.response;
        $('#valueDue').val(receivable.due);
        $('#valueOpen').val(receivable.open);
        $('#date_lastsale').val(receivable.date_receivable.date_sale);
    }
});

$(function() {
    var request = new XMLHttpRequest();
    request.open('GET', `${base_url}/Caixa/Grafico`);
    request.responseType = 'json';
    request.send();
    request.onload = function() {

        const ctx = document.getElementById('barChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: Object.keys(request.response.credit),
                datasets: [{
                        label: 'Receita',
                        backgroundColor: 'rgba(31,163,53,1)',
                        borderColor: 'rgba(31,163,53,1)',
                        pointRadius: false,
                        pointColor: '#3b8bba',
                        pointStrokeColor: 'rgba(31,163,53,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(31,163,53,1)',
                        data: Object.values(request.response.credit)
                    },
                    {
                        label: 'Despesa',
                        backgroundColor: 'rgba(227, 41, 41, 1)',
                        borderColor: 'rgba(227, 41, 41, 1)',
                        pointRadius: false,
                        pointColor: 'rgba(227, 41, 41, 1)',
                        pointStrokeColor: '#c1c7d1',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(227, 41, 41, 1)',
                        data: Object.values(request.response.debit)
                    },
                ]
            },

            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }
});