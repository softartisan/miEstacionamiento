const cantidadEl = document.querySelector('#cantidad');
const precio = parseInt(document.querySelector('#precio').textContent);
const totalEl = document.querySelector('#total');
cantidadEl.addEventListener('input',(e) => {
  if(isNaN(cantidadEl.value)) cantidadEl.value = 0;
  totalEl.textContent = `Total a pagar: $${parseInt(cantidadEl.value) * precio} CLP`;
  if (e.target.value==='') document.querySelector('#total').textContent = '';
});
