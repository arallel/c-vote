<div>
  <canvas id="myChart2" width="200" height="190"></canvas>
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
var paslon1count = {{ $paslon1count }};
var paslon2count = {{ $paslon2count }};
var paslon3count = {{ $paslon3count }};

var paslon1name = @JSON($paslon1name);
var paslon2name = @JSON($paslon2name);
var paslon3name = @JSON($paslon3name);
const chart2 = document.getElementById('myChart2');
const myChart2 = new Chart(chart2, {
    type: 'pie',
    data: {
        labels: [paslon1name, paslon2name, paslon3name],
        datasets: [{
            label: 'Pemilihan Ketua Osis',
            
            data: [paslon1count, paslon2count, paslon3count],
            backgroundColor: [
               'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)'
             ],
            borderWidth: 1
        }]
    },
    
});
</script>
@endpush
</div>