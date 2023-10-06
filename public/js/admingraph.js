          // Data for the pie chart (assuming you've passed this data from your controller)
          var ticketData = {
            labels: ["Approved", "Solved", "Unsolved"],
            datasets: [{
                data: [{{$adminStats2['pie_chart']['approvedCount']}}, {{$adminStats2['pie_chart']['solvedCount']}}, {{$adminStats2['pie_chart']['unsolvedCount']}}],
                backgroundColor: ["#36A2EB", "#FFCE56", "#FF6384"]
            }]
        };

        // Get the canvas element
        var ctx = document.getElementById('ticketPieChart').getContext('2d');

        // Create the pie chart
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: ticketData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
            }
        });