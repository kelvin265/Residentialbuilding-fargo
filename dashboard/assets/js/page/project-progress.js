'use strict';

$(function () {
    // // Extract project_id from URL parameters
    // var urlParams = new URLSearchParams(window.location.search);
    // var projectId = urlParams.get('project_id');
    var projectId = 1;

    if (projectId) {
        // Make an AJAX request to fetch data from PHP script, passing project_id
        $.ajax({
            url: 'controllers/project-controller.php?project_progress=' + projectId,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                // Once data is received, populate Morris bar chart
                renderMorrisBarChart(data);
            },
            error: function(xhr, status, error) {
                console.error("Error fetching data: " + error);
            }
        });
    } else {
        console.error("Project ID not found in URL parameters.");
    }
});

function renderMorrisBarChart(data) {
    // Create an array of labels and data points for Morris chart
    var labels = [];
    var estimatedCounts = [];
    var actualCounts = [];

    // Extract data from JSON response
    for (var i = 0; i < data.length; i++) {
        labels.push(data[i].project_name);
        estimatedCounts.push(data[i].estimated_activities);
        actualCounts.push(data[i].actual_activities);
    }

    // Render Morris bar chart
    Morris.Bar({
        element: 'project_progress_chart',
        data: data,
        xkey: 'project_name',
        ykeys: ['estimated_activities', 'actual_activities'],
        labels: ['Estimated Activities', 'Actual Activities'],
        barColors: ['#65b2ee', '#ee6666'],
        hideHover: 'auto',
        resize: true
    });
}
