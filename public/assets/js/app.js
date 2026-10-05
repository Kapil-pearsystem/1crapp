(function () {
  
  const sb = document.getElementById('sidebar'), bd = document.getElementById('backdrop');
  const toggle = open => { sb.classList.toggle('open', open); bd.classList.toggle('show', open); };
  document.getElementById('menuBtn').addEventListener('click', () => toggle(true));
  bd.addEventListener('click', () => toggle(false));

  // Charts (Chart.js)
  if (window.Chart) {
    const white = 'rgba(255,255,255,.9)', grid = 'rgba(255,255,255,.2)';
    const base = {
      responsive: true, maintainAspectRatio: false,
      plugins: { legend: { display: false } },
      scales: {
        x: { ticks: { color: white }, grid: { color: grid, borderDash: [4, 4] } },
        y: { ticks: { color: white }, grid: { color: grid, borderDash: [4, 4] } }
      }
    };
    const line = (id, labels, data) => {
      const el = document.getElementById(id); if (!el) return;
      new Chart(el, { type: 'line', data: { labels, datasets: [{ data, borderColor: white, backgroundColor: white,
        pointRadius: 4, borderWidth: 3, tension: 0 }] }, options: base });
    };
    const bar = document.getElementById('chartViews');
    if (bar) new Chart(bar, { type: 'bar', data: { labels: ['M','T','W','T','F','S','S'],
      datasets: [{ data: [50,20,10,22,50,10,40], backgroundColor: 'rgba(255,255,255,.8)', borderRadius: 6, barThickness: 8 }] }, options: base });
    const m = ['Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
    line('chartSales', m, [10,5,150,160,260,170,60,70,330]);
    line('chartTasks', m, [30,30,200,150,400,200,300,170,350]);
  }

  // Table search + row filter
  const q = document.getElementById('tableSearch');
  if (q) q.addEventListener('input', () => {
    const v = q.value.toLowerCase();
    document.querySelectorAll('#usersTable tbody tr').forEach(r => r.style.display = r.textContent.toLowerCase().includes(v) ? '' : 'none');
  });

  // Bootstrap validation
  document.querySelectorAll('.needs-validation').forEach(f => f.addEventListener('submit', e => {
    if (!f.checkValidity()) { e.preventDefault(); e.stopPropagation(); }
    else { e.preventDefault(); alert('Saved'); }
    f.classList.add('was-validated');
  }));
})();
