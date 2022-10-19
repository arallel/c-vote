<div>
  <canvas id="myChart3" width="100" height="100"></canvas>
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
var totalvote = @JSON($vote);
var golput = @JSON($data);
const chart3 = document.getElementById('myChart3');
const myChart3 = new Chart(chart3, {
    type: 'pie',
    data: {
        labels: ['Tidak Memilih ('+ Math.abs(golput) +')','Memilih ('+ totalvote +')'],
        datasets: [{
            label: 'Pemilihan Ketua Osis',
            
            data: [Math.abs(golput), totalvote],
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