@push('scripts')
<script>
  document.addEventListener('livewire:load', function () {
    let landSummaryChart = null;

    function renderChart() {
      const landSummaryCanvas = document.getElementById('title_status');
      if (landSummaryChart) {
        landSummaryChart.destroy(); // Destroy the existing chart
      }

      landSummaryChart = new Chart(landSummaryCanvas, {
        type: 'bar',
        data: {
          labels: [
            'Titled with CLOA',
            'Titled without CLOA',
            'Untitled with CLOA',
            'Untitled without CLOA'
          ],
          datasets: [
            {
            label: 'Polomolok',
            data: [
                {{ $polomolok_total_twc }},
                 {{ $polomolok_total_twoc }},
                 {{ $polomolok_total_uwc }},
                 {{ $polomolok_total_uwoc }}
            ],
            backgroundColor: [
              '#36A2EB',
            //    '#36A2EB',
            //    '#FFCE56',
            //    '#E7E9ED',
            //   '#8C9EFF',
            //   '#FF7F50'
            ]
          },
          {
            label: 'Tupi',
            data: [
                {{ $tupi_total_twc }},
                 {{ $tupi_total_twoc }},
                 {{ $tupi_total_uwc }},
                 {{ $tupi_total_uwoc }}
            ],
            backgroundColor: [
              '#FF7F50',
            //    '#36A2EB',
            //    '#FFCE56',
            //    '#E7E9ED',
            //   '#8C9EFF',
            //   '#FF7F50'
            ]
          },
          {
            label: 'Gensan',
            data: [
                {{ $gensan_total_twc }},
                 {{ $gensan_total_twoc }},
                 {{ $gensan_total_uwc }},
                 {{ $gensan_total_uwoc }}
            ],
            backgroundColor: [
              '#FF6384',
            //    '#36A2EB',
            //    '#FFCE56',
            //    '#E7E9ED',
            //   '#8C9EFF',
            //   '#FF7F50'
            ]
          },
        ]
        },
        options: {
          responsive: true,
          onClick: (event, elements) => {
            if (elements.length > 0) {
              const clickedDatasetIndex = elements[0].datasetIndex;
              const clickedIndex = elements[0].index;
              const clickedValue = landSummaryChart.data.datasets[clickedDatasetIndex].data[clickedIndex];
              const clickedLabel = landSummaryChart.data.labels[clickedIndex];
              console.log(clickedDatasetIndex);
              Livewire.emit('showTitleStatusReport', clickedDatasetIndex, clickedLabel, clickedValue);
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
