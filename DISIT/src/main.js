import './style.css'

const products = [
  { name: 'Kaos Oversize "Lokal Pride"', cat: 'kaos', price: 129000, colors: ['#111', '#f2efe6', '#c8ff2e'], stock: 24, sold: 76 },
  { name: 'Kaos Oversize "Noise"', cat: 'kaos', price: 119000, colors: ['#f2efe6', '#3a3a3a'], stock: 12, sold: 58 },
  { name: 'Hoodie Heavyweight "Basement"', cat: 'hoodie', price: 289000, colors: ['#111', '#5b6b4a'], stock: 9, sold: 41 },
  { name: 'Hoodie Zip "Night Shift"', cat: 'hoodie', price: 319000, colors: ['#3a3a3a', '#ff5a1f'], stock: 15, sold: 27 },
  { name: 'Tote Bag Kanvas "Pasar"', cat: 'tas', price: 89000, colors: ['#f2efe6', '#111'], stock: 30, sold: 64 },
  { name: 'Sling Bag "Ojol Ready"', cat: 'tas', price: 159000, colors: ['#111', '#c8ff2e'], stock: 6, sold: 33 },
]

const rupiah = (n) => 'Rp' + n.toLocaleString('id-ID')
const label = { kaos: 'Kaos', hoodie: 'Hoodie', tas: 'Tas' }

function render(filter = 'semua') {
  const list = filter === 'semua' ? products : products.filter((p) => p.cat === filter)
  document.getElementById('products').innerHTML = list
    .map(
      (p) => `
      <article class="card">
        <div class="thumb" style="--c:${p.colors[0]}">
          <span class="thumb-cat">${label[p.cat]}</span>
          <span class="thumb-mark">D</span>
        </div>
        <div class="card-body">
          <h3>${p.name}</h3>
          <p class="price">${rupiah(p.price)}</p>
          <div class="swatches">${p.colors.map((c) => `<i style="background:${c}"></i>`).join('')}</div>
          <p class="meta">Sisa stok ${p.stock} · Terjual ${p.sold}</p>
        </div>
      </article>`
    )
    .join('')
}

document.querySelectorAll('.chip').forEach((btn) =>
  btn.addEventListener('click', () => {
    document.querySelectorAll('.chip').forEach((b) => b.classList.remove('active'))
    btn.classList.add('active')
    render(btn.dataset.filter)
  })
)

document.getElementById('year').textContent = new Date().getFullYear()
render()
