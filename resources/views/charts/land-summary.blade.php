@push('scripts')
<script>
  document.addEventListener('livewire:load', function () {
    let landSummaryChart = null;

    function renderChart() {
      const landSummaryCanvas = document.getElementById('land_summary');
      if (landSummaryChart) {
        landSummaryChart.destroy(); // Destroy the existing chart
      }

      landSummaryChart = new Chart(landSummaryCanvas, {
        type: 'bar',
        data: {
          labels: [
            'Leased',
            'Growers',
            'Unplanted',
            'Compromise Agreement',
            'Deleted',
            'Others',
          ],
          datasets: [{
            label: 'Land Summary',
            data: [{{ $leased }}, {{ $growers }}, {{ $unplanted }}, {{ $compromise }}, {{ $deleted }}, {{ $others }}],
            backgroundColor: [
              '#FF6384',
              '#36A2EB',
              '#FFCE56',
              '#E7E9ED',
              '#8C9EFF',
              '#FF7F50'
            ]
          }]
        },
        options: {
          responsive: true,
          onClick: (event, elements) => {
            if (elements.length > 0) {
              const clickedDatasetIndex = elements[0].datasetIndex;
              const clickedIndex = elements[0].index;
              const clickedValue = landSummaryChart.data.datasets[clickedDatasetIndex].data[clickedIndex];
              const clickedLabel = landSummaryChart.data.labels[clickedIndex];
              Livewire.emit('showReport', clickedLabel, clickedValue);
            }
          }
        }
      });
    }

    Livewire.on('modalClosed', () => {
      renderChart(); // Re-render the chart when the modal is closed
    });

    renderChart(); // Initial rendering of the chart
  });
</script>
@endpush
